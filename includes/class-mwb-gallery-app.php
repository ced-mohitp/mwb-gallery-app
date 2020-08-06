<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Gallery_App
 * @subpackage Mwb_Gallery_App/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Mwb_Gallery_App
 * @subpackage Mwb_Gallery_App/includes
 * @author     MakeWebBetter <webmaster@makewebbetter.com>
 */
class Mwb_Gallery_App {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Mwb_Gallery_App_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'MWB_GALLERY_APP_VERSION' ) ) {
			$this->version = MWB_GALLERY_APP_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'mwb-gallery-app';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Mwb_Gallery_App_Loader. Orchestrates the hooks of the plugin.
	 * - Mwb_Gallery_App_i18n. Defines internationalization functionality.
	 * - Mwb_Gallery_App_Admin. Defines all hooks for the admin area.
	 * - Mwb_Gallery_App_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-mwb-gallery-app-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-mwb-gallery-app-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-mwb-gallery-app-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-mwb-gallery-app-public.php';


		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-rest-post-custom-controller.php';

		$this->loader = new Mwb_Gallery_App_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Mwb_Gallery_App_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Mwb_Gallery_App_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Mwb_Gallery_App_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		//create template post type
		$this->loader->add_action( 'init', $plugin_admin, 'mwb_create_template_post_type', 0  );

		//register key for subcats 
		$this->loader->add_action( 'rest_api_init', $plugin_admin, 'create_api_subcategory_field' );

		//add meta box for buttons 
		$this->loader->add_action('add_meta_boxes' , $plugin_admin, 'add_buttons_meta_box' , 10, 2) ;

		$this->loader->add_action( 'save_post', $plugin_admin, 'save_meta_box_data'  , 10, 2 );

		$this->loader->add_filter( 'gutenberg_can_edit_post_type', $plugin_admin, 'gutenberg_can_edit_post_type' , 10, 2 );

		$this->loader->add_filter( 'use_block_editor_for_post_type', $plugin_admin, 'gutenberg_can_edit_post_type' , 10, 2 );


		//add group fields

		$this->loader->add_action( 'template_cat_add_form_fields', $plugin_admin, 'add_group_field_add_form' , 10, 1 ); 

		$this->loader->add_action( 'template_cat_edit_form_fields', $plugin_admin, 'add_group_field_edit_form' , 10, 1 ); 

		$this->loader->add_action('edited_template_cat' , $plugin_admin , 'save_template_cat_group' , 10 , 2 );

		$this->loader->add_action('created_template_cat' , $plugin_admin , 'save_template_cat_group' , 10 , 2 );

			//settings 

		$this->loader->add_action( 'admin_menu', $plugin_admin , 'add_settings_submenu' );


		//setting api

		$this->loader->add_action('rest_api_init' , $plugin_admin, 'add_setting_route') ;

		$this->loader->add_filter( 'posts_where', $plugin_admin , 'add_title_only_posts_where', 10, 2 ); 


		$this->loader->add_action('wp_ajax_mwb_set_category_order' , $plugin_admin, 'mwb_set_category_order' );

		$this->loader->add_action('wp_ajax_mwb_set_group_order' , $plugin_admin, 'mwb_set_group_order' );

		$this->loader->add_action('wp_ajax_mwb_delete_group' , $plugin_admin, 'mwb_delete_group' );


		$this->loader->add_filter( "manage_edit-template_cat_columns", $plugin_admin, 'mwb_get_temp_cat_columns', 10 );

		$this->loader->add_filter('manage_template_cat_custom_column', $plugin_admin, 'manage_category_custom_fields', 10,3);

		$this->loader->add_action('template_redirect' , $plugin_admin , 'redirect_single_page_to_app');

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Mwb_Gallery_App_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );




	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Mwb_Gallery_App_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	public static function get_setting_value($settings, $key){

		$value = isset($settings[$key]) ? $settings[$key] : '' ; 
		return $value;
	}

	public static function get_settings($key){

		$settings = array();
		$settings['mwb_tgp_setting'] = '{"sidebar_bg_color": "#00ea3a",
		"text_separator_size": "12",
		"text_separator_color": "#1515d8",
		"separator_line_size": "12",
		"separator_line_color": "#097200",
		"placeholder_text": "dad",
		"placeholder_text_size": "12",
		"placeholder_text_color": "#35dd35",
		"category_text_size": "12",
		"category_text_color": "#9fb7ce",
		"sub_category_text_size": "12",
		"sub_category_text_color": "#00dd67"}' ; 

		$settings['mwb_tgp_template_setting'] = '{ "template_panel_bg_color": "#c1c1c1",
		"main_heading_text": "main heading",
		"search_result_text": "search heading",
		"no_result_text": "no result found :",
		"main_heading_text_size": "15",
		"main_heading_text_color": "#eeee22",
		"pagination_text_size": "12",
		"pagination_text_color": "#cccccc",
		"pagination_hover_color": "#c2d308"}' ; 


		$settings['mwb_tgp_card_setting'] = '{"title_text_size": "12",
		"title_text_color": "#efefef",
		"card_button_1_bg_color": "#000000",
		"card_button_1_hover_color": "#a8a8a8",
		"card_button_2_bg_color": "#878787",
		"card_button_2_hover_color": "#828282",
		"card_button_3_bg_color": "#1e73be",
		"card_button_3_hover_color": "#dd3333",
		"card_button_4_bg_color": "#d3d3d3",
		"card_button_4_hover_color": "#666666",
		"card_button_5_bg_color": "#aaaaaa",
		"card_button_5_hover_color": "#9b9b9b"}' ; 

		$settings['mwb_tgp_card_info_setting'] = '{"info_link_text_color": "#a8a8a8",
		"info_link_text_size": "12",
		"info_panel_bg_color": "#c9c9c9",
		"tagged_heading_text": "This template is tagged for :",
		"tagged_heading_text_size": "12",
		"tagged_heading_text_color": "#4c4c4c"}' ; 

		return json_decode($settings[$key] ,ARRAY_A) ; 
	}



}
