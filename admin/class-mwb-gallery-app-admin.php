<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Gallery_App
 * @subpackage Mwb_Gallery_App/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mwb_Gallery_App
 * @subpackage Mwb_Gallery_App/admin
 * @author     MakeWebBetter <webmaster@makewebbetter.com>
 */
class Mwb_Gallery_App_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mwb_Gallery_App_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mwb_Gallery_App_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mwb-gallery-app-admin.css', array(), time(), 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mwb_Gallery_App_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mwb_Gallery_App_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$js_data = array();
		$js_data['ajax_url'] = admin_url( 'admin-ajax.php' ) ;

		wp_enqueue_style( 'wp-color-picker' );

		wp_register_script('mwb-template-gallery-admin-script', plugin_dir_url( __FILE__ ) . 'js/mwb-gallery-app-admin.js', array( 'jquery' , 'jquery-ui-droppable' , 'jquery-ui-draggable', 'jquery-ui-sortable' , 'wp-color-picker'  ), time(), false );
		wp_localize_script('mwb-template-gallery-admin-script', 'js_data' , $js_data);
		wp_enqueue_script('mwb-template-gallery-admin-script');

	}
	/**
	 * Create template post type
	 */
	public function mwb_create_template_post_type(){

		$labels = $this->mwb_get_ui_labels();
		$args = $this->mwb_get_template_args($labels);
 		// Registering your Custom Post Type
		register_post_type( 'template', $args ) ; 
		$this->create_custom_taxonomy();
		$this->mwb_save_new_group_name();
		$this->save_backend_settings();

	}

	public function add_buttons_meta_box(){
		
		add_meta_box(
			'template-buttons-meta-box',
			__( 'Template buttons','mwb_aced' ),
			array($this, 'template_buttons_meta_box_data' ),
			'template',
			'normal',
			'default'
		);

		add_meta_box(
			'template-featured-meta-box',
			__( 'Featured','mwb_aced' ),
			array($this, 'template_featured_meta_box_data' ),
			'template',
			'side',
			'default'
		);

		add_meta_box(
			'template-price-meta-box',
			__( 'Featured','mwb_aced' ),
			array($this, 'template_price_meta_box_data' ),
			'template',
			'side',
			'default'
		);

		add_meta_box(
			'template-preview-button-box',
			__( 'Preview Page Buttons','mwb_aced' ),
			array($this, 'template_preview_page_button_box_data' ),
			'template',
			'normal',
			'default'
		);

		add_meta_box(
			'template-preview-close-button-box',
			__( 'Preview Bar Close Button','mwb_aced' ),
			array($this, 'template_preview_page_close_button_box_data' ),
			'template',
			'normal',
			'default'
		);

		add_meta_box(
			'template-preview-link-meta-box',
			__( 'Template Preview Link','mwb_aced' ),
			array($this, 'template_preview_link_box_data' ),
			'template',
			'normal',
			'default'
		);

	}

	public function template_preview_link_box_data(){
		global $post ; 
		$preview_link = get_post_meta($post->ID , 'preview_link' , true ) ; 
		$selected = get_post_meta($post->ID , 'selected_prev_btn' , true ) ;
		?>
		<div>
			<table>
				<tr>
					<th><label for="selected_prev_btn"><?php echo "Preview Button" ;?></label></th>
					<td><select name="selected_prev_btn">
						<option value="-1" <?php selected( -1 , $selected) ;?>><?php echo "---" ;?></option>
						<option value="0" <?php selected( 0 , $selected) ;?>><?php echo "Button - 1" ;?></option>
						<option value="1" <?php selected( 1, $selected) ;?>><?php echo "Button - 2" ;?></option>
						<option value="2" <?php selected( 2 , $selected) ;?>><?php echo "Button - 3" ;?></option>
						<option value="3" <?php selected( 3 , $selected) ;?>><?php echo "Button - 4" ;?></option>
						<option value="4" <?php selected( 4 , $selected) ;?>><?php echo "Button - 5" ;?></option>
					</select></td>
				</tr>
				<tr>
					<th><label for="preview_link"><?php echo "Preview Link" ;?></label></th>
					<td><input type="text" name="preview_link" value="<?php echo $preview_link ;?>"></td>
				</tr>
			</table>
		</div>
		<?php
	}

	public function template_preview_page_close_button_box_data(){

		global $post ;
		$prev_close_btn = get_post_meta($post->ID , 'prev_close_btn' , true ) ;
		
		?>

		<div>
			<input type="radio" name="prev_close_btn" value="close" <?php checked($prev_close_btn , 'close') ;?> >
			<label for="male">Close</label><br>
			<input type="radio"  name="prev_close_btn" value="collapse" <?php checked($prev_close_btn , 'collapse') ;?> >
			<label for="female">Collapse</label><br>
		</div>
		<?php
	}





	public function template_price_meta_box_data(){
		global $post ; 

		$price = get_post_meta($post->ID , '_price' , true ) ; 

		echo '<div>' ; 
		echo '<label for="_price"> Price </label>' ; 
		echo '<input type="text" name="_price" value="'.$price.'">';
		echo '</div>';

	}

	public function template_featured_meta_box_data(){
		
		global $post ; 

		$is_featured = get_post_meta($post->ID , '_is_featured' , true ) ; 

		$checked = "" ; 

		if( $is_featured == "no" ){
			$checked = "checked" ; 
		}

		echo '<div>' ; 
		echo '<label for="mark_featured"> Mark Featured </label>' ; 
		echo '<input type="checkbox" name="_is_featured" '.checked($is_featured , "yes" , false).'/>';
		echo '</div>';
	}

	public function gutenberg_can_edit_post_type( $can_edit, $post_type ){

		if($post_type == "template"){

			return false;
		}

		return $can_edit;
		
	}

	public function save_meta_box_data($post_id, $post){

		 // Check if user has permissions to save data.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
 
        // Check if not an autosave.
        if ( wp_is_post_autosave( $post_id ) ) {
            return;
        }
 
        // Check if not a revision.
        if ( wp_is_post_revision( $post_id ) ) {
            return;
        }

        if($post->post_type != "template"){
        	return ; 
        }

        if(isset($_POST['_price'])){
        	update_post_meta($post_id, '_price' , $_POST['_price'] ) ;
        }

        if(isset($_POST['btn_txt'])){
        	update_post_meta($post_id, 'btn_txt' , $_POST['btn_txt'] ) ;
        }

        if(isset($_POST['btn_url'])){
        	update_post_meta($post_id, 'btn_url' , $_POST['btn_url'] ) ;
        }

        if(isset($_POST['btn_prev'])){
        	update_post_meta($post_id, 'btn_prev' , $_POST['btn_prev'] ) ;
        }

         if(isset($_POST['prev_btn_txt'])){
        	update_post_meta($post_id, 'prev_btn_txt' , $_POST['prev_btn_txt'] ) ;
        }

        if(isset($_POST['prev_btn_url'])){
        	update_post_meta($post_id, 'prev_btn_url' , $_POST['prev_btn_url'] ) ;
        }

        if(isset($_POST['prev_close_btn'])){
        	update_post_meta($post_id, 'prev_close_btn' , $_POST['prev_close_btn'] ) ;
        }

        if(isset($_POST['preview_link'])){
        	update_post_meta($post_id, 'preview_link' , $_POST['preview_link'] ) ;
        }

         if(isset($_POST['preview_link'])){
        	update_post_meta($post_id, 'selected_prev_btn' , $_POST['selected_prev_btn'] ) ;
        }

        if(isset($_POST['_is_featured'])){
        	update_post_meta($post_id, '_is_featured' , 'yes' ) ;
        }else{
        	update_post_meta($post_id, '_is_featured' , 'no' ) ;
        }
	}

	public function template_buttons_meta_box_data(){

		global $post;

		$btn_txt = get_post_meta($post->ID , 'btn_txt' , true ) ; 
		$btn_url = get_post_meta($post->ID , 'btn_url' , true ) ;
		$btn_prev = get_post_meta($post->ID , 'btn_prev' , true ) ; 
		?>
		<div class="mwb-btn-meta-box-wrap" data-temp-slug="<?php echo $post->post_name ;?>" data-prev-btn="<?php echo $btn_prev ;?>">
			<table class="mwb-meta-box-table">
				<thead>
					<tr>
						<th><?php echo "Button" ?></th>
						<th><?php echo "Text" ?></th>
						<th><?php echo "Url" ?></th>
					</tr>
				</thead>
				<tbody>
					<?php for ($i=0; $i < 5; $i++) { 
							$txt = isset($btn_txt[$i]) ? $btn_txt[$i] : '' ; 
							$url = isset($btn_url[$i]) ? $btn_url[$i] : '' ;
							$checked = (($btn_prev == $i) && ($btn_prev != "")) ? "checked" : '' ;
						?>
						<tr>
							<td><?php echo "Button - ".($i+1) ;?></td>
							<td><input type="text"  name="btn_txt[]" value="<?php echo $txt ;?>" class="btn_text_<?php echo $i ;?>"></td>
							<td><input type="text" name="btn_url[]" value="<?php echo $url ;?>"class="btn_url_<?php echo $i ;?>"></td>
						</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</div>
		<?php
	}


	public function template_preview_page_button_box_data(){
		
		global $post;

		$prev_btn_txt = get_post_meta($post->ID , 'prev_btn_txt' , true ) ; 
		$prev_btn_url = get_post_meta($post->ID , 'prev_btn_url' , true ) ; 

		echo '<div class="button-wrap">' ; 
		for( $i=0 ; $i < 2 ; $i++ ){

			$txt = isset($prev_btn_txt[$i]) ? $prev_btn_txt[$i] : '' ; 
			$url = isset($prev_btn_url[$i]) ? $prev_btn_url[$i] : '' ;
			echo '<div class="button-row">';
			echo '<label for="button-'.$i.'">Button - '.( $i + 1 ).'</label>' ;
			echo '<input type="text" name="prev_btn_txt[]" value="'.$txt.'"/>' ; 
			echo '<input type="text" name="prev_btn_url[]" value="'.$url.'"/>' ; 
			echo '</div>';
		}
		echo '</div>';
	}


	public function create_api_subcategory_field(){

		register_rest_field( 'template_cat', 'subcats', array(
			'get_callback'    => array($this , 'get_template_subcategories'),
			'schema'          => null,
			)
		);

		register_rest_field( 'template_cat', 'parent_cat', array(
			'get_callback'    => array($this , 'get_template_cat_parent_cat'),
			'schema'          => null,
			)
		);

		register_rest_field( 'template_cat', 'cat_group', array(
			'get_callback'    => array($this , 'get_template_cat_group'),
			'schema'          => null,
			)
		);

		register_rest_field( 'template_cat', 'cat_url', array(
			'get_callback'    => array($this , 'get_template_cat_url'),
			'schema'          => null,
			)
		);

		register_rest_field( 'template_cat', 'cat_order', array(
			'get_callback'    => array($this , 'get_template_cat_order'),
			'schema'          => null,
			)
		);

		register_rest_field( 'template', 'image_url', array(
			'get_callback'    => array($this , 'get_template_image_url'),
			'schema'          => null,
			)
		);

		register_rest_field( 'template', 'btn_details', array(
			'get_callback'    => array($this , 'get_template_btn_details'),
			'schema'          => null,
			)
		);

		register_rest_field( 'template', 'is_featured', array(
			'get_callback'    => array($this , 'get_template_featured_status'),
			'schema'          => null,
			)
		);

		register_rest_field( 'template', 'description', array(
			'get_callback'    => array($this , 'get_template_description'),
			'schema'          => null,
			)
		);

		register_rest_field( 'template', 'template_cat', array(
			'get_callback'    => array($this , 'get_template_categories'),
			'schema'          => null,
			)
		);

		register_rest_field( 'template', 'price', array(
			'get_callback'    => array($this , 'get_template_pirce_txt'),
			'schema'          => null,
			)
		);

		register_rest_field( 'template', 'prev_btn_details', array(
			'get_callback'    => array($this , 'get_template_prev_btn_details'),
			'schema'          => null,
			)
		);

		register_rest_field( 'template', 'prev_bar_close_btn', array(
			'get_callback'    => array($this , 'get_template_prev_bar_close_btn'),
			'schema'          => null,
			)
		);

		register_rest_field( 'template', 'preview_link', array(
			'get_callback'    => array($this , 'get_template_preview_link'),
			'schema'          => null,
			)
		);

	}

	public function get_template_preview_link($object){
		$preview_link = get_post_meta($object['id'] , 'preview_link' , true ) ; 
		return $preview_link ; 
	}


	public function get_template_prev_bar_close_btn($object){
		$prev_close_btn = get_post_meta($object['id'] , 'prev_close_btn' , true ) ; 

		if($prev_close_btn == ""){

			$prev_close_btn = "collapse" ; 
		}

		return $prev_close_btn ; 
	}


	public function get_template_prev_btn_details($object){
		$prev_btn_txt = get_post_meta($object['id'] , 'prev_btn_txt' , true ) ; 
		$prev_btn_url = get_post_meta($object['id'] , 'prev_btn_url' , true ) ; 
		$btn_details = array( 'prev_btn_txt' => $prev_btn_txt , 'prev_btn_url' => $prev_btn_url);
		return $btn_details;
	}


	public function get_template_cat_parent_cat($object){
		
		$parent_cat = array(
			'id' => '',
			'name' =>'',
			'slug' => '',
			'url' => ''
		);


		if(isset($object['parent']) && $object['parent'] != 0 ){
			
			$t_id = $object['parent'];
			$term = get_term($t_id, 'template_cat');
			$parent_cat['id'] = $t_id;
			$parent_cat['name'] = $term->name;
			$parent_cat['slug'] = $term->slug;

			if(count($object['subcats']) == 0 ){
				if($term->parent != 0){
					$t_id = $term->parent ; 
					$term2 = get_term($t_id, 'template_cat');
					$parent_cat['url'] = $this->get_cat_url($term2);
				}
			}
			else{
				$parent_cat['url'] = $this->get_cat_url($term);
			}
		}

		return $parent_cat;
	}


	public function get_cat_url($template_cat){
		$url = '';
		if($template_cat->parent == 0 ){

			$url = '/'.$template_cat->slug ; 
		}
		else{

			$t_id = $template_cat->parent ; 
			$url = '/'.$template_cat->slug ; 

			while ( $t_id != 0) {
				$term = get_term($t_id, 'template_cat');
				$url = '/'.$term->slug.$url;
				$t_id = $term->parent ; 
			} ; 
		}
		return $url ; 
	}

	public function get_template_pirce_txt($object){

		$price = get_post_meta($object['id'] , '_price' , true ) ; 
		return $price ; 
	}

	public function get_template_cat_order($object){
		
		global $wpdb ; 
		$order = 0 ;
		$term_id =  $object['id'] ; 
		$query = "SELECT `term_order` FROM $wpdb->terms WHERE `term_id` = $term_id" ;
		$result = $wpdb->get_results($query, ARRAY_A);

		//print_r($query);
		if(isset($result[0])){
			$order = $result[0]['term_order'];
		}
		return $order;
	}



	public function get_template_cat_group($object){
		
		$group_id = get_option('template_cat_'.$object['id'].'_group' , '') ;

		$group_list = get_option('template_cat_group_list' , array());

		$group = $this->get_cat_group_by_id($group_list,$group_id);

		return $group;
	}

	public function get_template_cat_url($object){

		if($object['parent'] == 0 ){
			return '/'.$object['slug'] ; 
		}
		else{

			$t_id =$object['parent'] ; 
			$url = '/'.$object['slug'] ; 

			while ( $t_id != 0) {
				$term = get_term($t_id, 'template_cat');
				$url = '/'.$term->slug.$url;
				$t_id = $term->parent ; 
			} ; 

			return $url ; 
		}

	}

	public function get_template_categories($object){

		$temp = wp_get_post_terms($object['id'], 'template_cat', array("orderby" => "term_id") );

		$categories = array();	

		foreach ($temp as $key => $child) {

			$cat = array('id' => $child->term_id , 'name' => $child->name , 'slug' => $child->slug);

			if($child->parent == 0 ){

				$cat['url'] = '/'.$child->slug ; 
			}
			else{

				$t_id = $child->parent ; 
				$url = '/'.$child->slug ; 

				while ( $t_id != 0) {
					$term = get_term($t_id, 'template_cat');
					$url = '/'.$term->slug.$url;
					$t_id = $term->parent ; 
				} ; 
 
				$cat['url'] = $url ; 
			}
			
			$categories[] = $cat ; 
		}

		if(count($categories) > 0 ){
			$names = array_column($categories, 'name');
			array_multisort($names , SORT_ASC , $categories);
		}

		return $categories ; 
 
	}

	public function get_template_description($object){

		$post = get_post($object['id']) ; 
		if(!$post){
			return "" ; 
		}
		$post_content = $post->post_content ; 
		return $post_content; 
	}


	public function get_template_image_url($object){
		return get_the_post_thumbnail_url($object['id']);
	}

	public function get_template_btn_details($object){

		$btn_txt = get_post_meta($object['id'] , 'btn_txt' , true ) ; 
		$btn_url = get_post_meta($object['id'] , 'btn_url' , true ) ;

		$selected_prev_btn = get_post_meta($object['id'] , 'selected_prev_btn' , true ) ;

		if($selected_prev_btn != "" && $selected_prev_btn != -1){
			if($btn_txt[$selected_prev_btn] == ""){
				$btn_txt[$selected_prev_btn] = "Preview" ; 
			}
			$btn_url[$selected_prev_btn] = "preview?template=".$object['slug'] ;
		}

		$btn_details = array( 'btn_txt' => $btn_txt , 'btn_url' => $btn_url);
		return $btn_details;
	}

	public function get_template_featured_status($object){
		$is_featured =  get_post_meta($object['id'] , '_is_featured' , true ) ; 

		if($is_featured != "yes"){

			$is_featured = "no";
		}

		return $is_featured;
	}

	public function get_template_subcategories( $object ){

		$subcats = $this->get_template_sub_cats($object['id']);	
		return $subcats ; 
	}


	public function get_template_sub_cats($cat_id){

		$term_children = get_terms(
			array(
				'taxonomy' => 'template_cat',
				'parent' => $cat_id,
				'hide_empty' => true,
				'orderby' => 'term_order',
				'order' => 'ASC',
			)
		);
		$subcats = array();
		foreach ($term_children as $key => $child) {
			$subcat = array('id' => $child->term_id , 'name' => $child->name , 'slug' => $child->slug , 'cat_order' => $child->term_order);	
			$temp = get_term_children($child->term_id , 'template_cat');

			$subcat['subcats'] = 0 ;
			if(count($temp) > 0 ){
				$subcat['subcats'] = 1 ;
			}

			if($child->parent == 0 ){

				$subcat['cat_url'] = '/'.$child->slug ; 
			}
			else{

				$t_id = $child->parent ; 
				$url = '/'.$child->slug ; 

				while ( $t_id != 0) {
					$term = get_term($t_id, 'template_cat');
					$url = '/'.$term->slug.$url;
					$t_id = $term->parent ; 
				} ; 
 
				$subcat['cat_url'] = $url ; 
			}

			$subcats[] = $subcat ; 

		}

		//die;

		return $subcats ; 
	}


	public function create_custom_taxonomy(){
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'textdomain' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'textdomain' ),
			'search_items'      => __( 'Search Categories', 'textdomain' ),
			'all_items'         => __( 'All Categories', 'textdomain' ),
			'parent_item'       => __( 'Parent Category', 'textdomain' ),
			'parent_item_colon' => __( 'Parent Category:', 'textdomain' ),
			'edit_item'         => __( 'Edit Category', 'textdomain' ),
			'update_item'       => __( 'Update Category', 'textdomain' ),
			'add_new_item'      => __( 'Add New Category', 'textdomain' ),
			'new_item_name'     => __( 'New Category Name', 'textdomain' ),
			'menu_name'         => __( 'Categories', 'textdomain' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest' 		  => true,
			'rewrite'           => array( 'slug' => 'template_cat' ),
		);

		register_taxonomy( 'template_cat', array( 'template' ), $args );
	}


 	/**
 	 * Get ui labels for custom posttype
 	 */
 	public function mwb_get_ui_labels(){
 		// Set UI labels for Custom Post Type
 		$labels = array(
 			'name'                => _x( 'Templates', 'Post Type General Name', 'mwb-gallery-app' ),
 			'singular_name'       => _x( 'Template', 'Post Type Singular Name', 'mwb-gallery-app' ),
 			'menu_name'           => __( 'Templates', 'mwb-gallery-app' ),
 			'parent_item_colon'   => __( 'Parent Template', 'mwb-gallery-app' ),
 			'all_items'           => __( 'All Templates', 'mwb-gallery-app' ),
 			'view_item'           => __( 'View Template', 'mwb-gallery-app' ),
 			'add_new_item'        => __( 'Add New Template', 'mwb-gallery-app' ),
 			'add_new'             => __( 'Add New', 'mwb-gallery-app' ),
 			'edit_item'           => __( 'Edit Template', 'mwb-gallery-app' ),
 			'update_item'         => __( 'Update Template', 'mwb-gallery-app' ),
 			'search_items'        => __( 'Search Template', 'mwb-gallery-app' ),
 			'not_found'           => __( 'Not Found', 'mwb-gallery-app' ),
 			'not_found_in_trash'  => __( 'Not found in Trash', 'mwb-gallery-app' ),
 		);
 		return $labels;
 	}

 	/**
 	 * Get args for the template postype
 	 */

 	public function mwb_get_template_args($labels){
 		// Set other options for Custom Post Type
 		$args = array(
 			'label'               => __( 'Templates', 'twentythirteen' ),
 			'description'         => __( 'Templates for gallery', 'twentythirteen' ),
 			'labels'              => $labels,
 			'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
 			'hierarchical'        => false,
 			'public'              => true,
 			'show_ui'             => true,
 			'show_in_menu'        => true,
 			'show_in_nav_menus'   => true,
 			'show_in_admin_bar'   => true,
 			'menu_position'       => 5,
 			'can_export'          => true,
 			'has_archive'         => true,
 			'show_in_rest' 		  => true,
 			'exclude_from_search' => false,
 			'publicly_queryable'  => true,
 			'capability_type'     => 'page',
 			'rest_controller_class' => 'WP_REST_Template_Controller',
 		);
 		return $args;
 	}



 	public function add_group_field_add_form($taxonomy){
 		
 	}

 	public function get_cat_group_by_id($group_list , $group_id){

 		if(count($group_list) == 0 || $group_id == ""){
 			return array();
 		}

 		$group_name = "";
 		foreach ($group_list as $key => $value) {
 			if($value['id'] == $group_id){
 				$group = $value;
 			}
 		}
 		return $group;
 	}


 	public function add_group_field_edit_form($taxonomy){


 		$term_id = $taxonomy->term_id ; 

 		$group_id = get_option('template_cat_'.$term_id.'_group' , '') ; 

 		$group_list = get_option('template_cat_group_list' , array());

 		$pinned_cards = get_option('template_cat_'.$term_id.'_pinned_cards' , '') ; 

 		$app_heading_txt = get_option('template_cat_'.$term_id.'_heading_txt' , '') ; 

 		if($taxonomy->parent == 0 ) : ?>
 		<tr class="form-field form-required term-group-name">
 			<th scope="row">
 				<label for="name"><?php _ex( 'Group Name', 'term name' ); ?></label>
 			</th>
 			<td>
 				<select name="tag-group-name" id="tag-group-name">
 					<option value="-1">No Group</option>
 					<?php foreach ($group_list as $key => $value) { 
 						$select = ($group_id == $value['id']) ? 'selected' : '' ;
 						?>
 						<option <?php echo $select ;?> value="<?php echo $value['id'] ;?>">
 							<?php echo $value['name'] ;?>		
 						</option>
 					<?php } ?>
 				</select>
 				<p class="description"><?php _e( 'The group of category.' ); ?></p>
 			</td>
 		</tr>
 		<?php endif ; ?>
 		<tr class="form-field  term-group-name">
 			<th scope="row">
 				<label for="top_pinned_card_ids"><?php _ex( 'Pinned Cards', 'term name' ); ?></label>
 			</th>
 			<td>
 				<input type="text" name="top_pinned_card_ids" value="<?php echo $pinned_cards ;?>">
 				<p class="description"><?php _e( 'Enter Post ID numbers separated by , in order to show at page 1' ); ?></p>
 			</td>
 		</tr>
 		<tr class="form-field  term-group-name">
 			<th scope="row">
 				<label for="app_heading_txt"><?php _ex( 'Category Heading', 'term name' ); ?></label>
 			</th>
 			<td>
 				<input type="text" name="app_heading_txt" value="<?php echo $app_heading_txt ;?>">
 				<p class="description"><?php _e( 'Heading text for the Category' ); ?></p>
 			</td>
 		</tr>
 		<?php
 	}

 	public function get_cat_group_by_name($group_list , $group_name){
 		$group = array();
 		if($group_name == ""){
 			return $group_id;
 		}

 		foreach ($group_list as $key => $value) {
 			if($value['name'] == $group_name){
 				$group = $value;
 			}
 		}
 		return $group;
 	}

 	public function save_template_cat_group($term_id , $tt_id){

 		if(isset($_POST['tag-group-name'])){
 			$group_id = $_POST['tag-group-name'] ; 
 			if($group_id != -1){
 				update_option('template_cat_'.$term_id.'_group' , $group_id) ; 
 			} else {
 				delete_option('template_cat_'.$term_id.'_group');
 			}

 		}
 		if(isset($_POST['top_pinned_card_ids'])){

 			$slug = sanitize_text_field($_POST['slug']);
 			update_option('template_cat_'.$term_id.'_pinned_cards' , sanitize_text_field($_POST['top_pinned_card_ids']) );
 			update_option('template_cat_'.$slug.'_pinned_cards' , sanitize_text_field($_POST['top_pinned_card_ids']) );
 		}

 		if(isset($_POST['app_heading_txt'])){

 			$slug = sanitize_text_field($_POST['slug']);
 			update_option('template_cat_'.$term_id.'_heading_txt' , sanitize_text_field($_POST['app_heading_txt']) );
 			update_option('template_cat_'.$slug.'_heading_txt' , sanitize_text_field($_POST['app_heading_txt']) );
 		}
 	}

 	public function add_settings_submenu(){

 		add_submenu_page( 'edit.php?post_type=template', __('Category Groups', 'mwb_tgp'), __('Category Groups', 'mwb_tgp'), 'manage_options', 'mwb_cat_group', array( $this, 'add_category_group_panel') );
 		
 		add_submenu_page( 'edit.php?post_type=template', __('Category Order', 'mwb_tgp'), __('Category Order', 'mwb_tgp'), 'manage_options', 'mwb_cat_order', array( $this, 'add_category_order_panel') );

 		add_submenu_page( 'edit.php?post_type=template', __('Settings', 'mwb_tgp'), __('Settings', 'mwb_tgp'), 'manage_options', 'mwb_tgp', array( $this, 'add_settings_panel') );
 	}

 	public function add_category_group_panel(){

 		include_once MWB_GALLERY_APP_PATH . 'admin/partials/mwb-gallery-cat-group-display.php';
 	}

 	public function add_category_order_panel(){

 		include_once MWB_GALLERY_APP_PATH . 'admin/partials/mwb-gallery-cat-order-display.php';
 	}

 	public function add_settings_panel(){

 		include_once MWB_GALLERY_APP_PATH . 'admin/partials/mwb-gallery-app-admin-display.php';
 	}

 	public function add_setting_route(){
 		register_rest_route( 'mwb-gallery-app/v1', '/settings', array(
 			'methods'         => \WP_REST_Server::READABLE,
            'callback'        => array( $this, 'get_gallery_settings' ),
 		) );
 	}

 	public function get_gallery_settings(){

 		$sidebar_setting = get_option('mwb_tgp_setting' ,Mwb_Gallery_App::get_settings("mwb_tgp_setting"));
 		$template_setting = get_option('mwb_tgp_template_setting' , Mwb_Gallery_App::get_settings("mwb_tgp_template_setting"));
 		$card_setting = get_option('mwb_tgp_card_setting' ,Mwb_Gallery_App::get_settings("mwb_tgp_card_setting"));
 		$card_info_setting = get_option('mwb_tgp_card_info_setting' , Mwb_Gallery_App::
 			get_settings("mwb_tgp_card_info_setting"));

 		$prev_page_setting = get_option('mwb_tgp_prev_setting' , Mwb_Gallery_App::get_settings("mwb_tgp_prev_setting"));

 		$mbl_setting = get_option('mwb_tgp_mbl_setting' , Mwb_Gallery_App::get_settings("mwb_tgp_mbl_setting"));

 		$gbl_setting = get_option('mwb_tgp_gbl_setting' , Mwb_Gallery_App::get_settings("mwb_tgp_gbl_setting"));

 		$header_setting = get_option('mwb_tgp_header_setting' , Mwb_Gallery_App::get_settings("mwb_tgp_header_setting"));

 		$footer_setting = get_option('mwb_tgp_footer_setting' , Mwb_Gallery_App::get_settings("mwb_tgp_footer_setting"));

 		$all_settings = array_merge($sidebar_setting , $template_setting, $card_setting ,$card_info_setting, $prev_page_setting, $mbl_setting , $gbl_setting , $header_setting, $footer_setting) ; 


 		foreach ($all_settings as $key => $setting) {
 			if(strrpos($key, 'size') !== false){
 				$all_settings[$key] = $setting.'px' ; 
 			}
 		}

 		$response = rest_ensure_response( $all_settings );
 		return $response ; 
 	}


 	
 	public function add_title_only_posts_where( $where, $wp_query ){
 		global $wpdb;
 		if(isset($wp_query->query['s']) && $wp_query->query['s'] != ''){
 			$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' .$wp_query->query['s'] . '%\'';
 		}
 		return $where;
 	}

 	public function mwb_set_category_order(){
 		
 		$group_data = $_POST['group_data'];
 		$group_list = get_option('template_cat_group_list' ,array());
 		global $wpdb ; 
 		foreach($group_data as $category_id => $group_id){
 			$term_order = $category_data['term_order'];
 			update_option('template_cat_'.$category_id.'_group' , $group_id) ;
 		}

 		$term_order_list = $_POST['term_order'] ; 

 		foreach ($term_order_list as $category_id => $term_order) {

 			$wpdb->update( $wpdb->terms, array('term_order' => $term_order), array('term_id' => $category_id) );
 		}

 		echo json_encode(array('status' => 'success'));
 		die;
 	}

 	public static function get_taxonomy_hierarchy( $taxonomy, $parent = 0 , $level = 0 ) {

 		$taxonomy = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;

 		$terms = get_terms( $taxonomy, array( 'parent' => $parent , 'hide_empty'=>true  , 'order' => 'ASC' , 'orderby' => 'term_order') );

 		$category_tree = "";



 		$level++ ; 

 		if(count($terms) > 0 ){
 			$category_tree = '<ul id="children-list-'.$parent.'" class="list-level-'.$level.' mwb-list-tree" data-parent-id="'.$parent.'">' ; 
 			foreach ( $terms as $term ){
 				$category_tree .= '<li class="mwb-template-cat mwb-template-cat-'.$parent.' list-item-level-'.$level.'" data-category-id="'.$term->term_id.'" data-term-order="'.$term->term_order.'"><div class="mwb-list-cat-name">'.$term->name.'</div>' ;
 				$category_tree .= self::get_taxonomy_hierarchy( $taxonomy, $term->term_id , $level );

 				$category_tree .= self::may_be_add_template_cards($taxonomy , $term->term_id);

 				$category_tree .= '</li>' ; 
 			}
 			$category_tree .= '</ul>' ;
 		}
 		else if($level == 1){
 			$category_tree .= self::may_be_add_template_cards($taxonomy , $parent);
 		}
 		return $category_tree ; 
 	}

 	public static function may_be_add_template_cards($taxonomy , $term_id){

 		$terms = get_terms( $taxonomy, array( 'parent' => $term_id , 'hide_empty'=>true) );

 		if(count($terms) > 0 ){
 			return "";
 		}

 		$query_args = array(
 			'post_type' => 'template',
 			'post_status' => array('publish'),
 			'posts_per_page' => -1,
 			'tax_query' => array(
 				array(
 					'taxonomy' => 'template_cat',
 					'field' => 'term_id',
 					'terms' => array($term_id),
 					'include_children' => false 
 				)),
 		);

 		$posts_query  = new WP_Query();

 		$query_result = $posts_query->query( $query_args );

 		$category_posts = '';

 		if(count($query_result) > 0 ){
 			$category_posts = '<ul class="mwb-template-card-list">' ; 

 			foreach ($query_result as $post) {
 				$category_posts .= '<li class="mwb-template-card-listitem"><div class="mwb-template-card-name">'.$post->post_title.'  ( Post id - '.$post->ID.' )</div></li>' ; 
 			}

 			$category_posts .= '</ul>';
 		}

 		
 		return $category_posts ; 
 	}

 	public function mwb_save_new_group_name(){
 		if(isset($_POST['action']) && $_POST['action'] == "mwb_save_group_name"){
 			$name = $_POST['mwb_group_name'] ; 
 			$group_list = get_option('template_cat_group_list', array()) ;
 			$group_ids  = array_column($group_list, 'id');
 			$new_id = 1 ; 
 			while (in_array($new_id, $group_ids)) {
 				$new_id++;
 			}
 			$order = count($group_list) + 1 ; 
 			$group = array(
 				'id' => $new_id,
 				'name' => $name,
 				'order' => $order,
 			);
 			$group_list[] = $group ; 
 			update_option('template_cat_group_list' , $group_list );
 		}
 	}

 	public function mwb_set_group_order(){
 		$response = array('success' => true);
 		$group_list = $_POST['group_list'] ; 
 		update_option('template_cat_group_list' , $group_list);
 		echo json_encode($response);
 		die;
 	}

 	public function mwb_delete_group(){
 		$response = array('success' => true);
 		$group_id = $_POST['group_id'];
 		$group_list = get_option('template_cat_group_list', array()) ;
 		
 		foreach ($group_list as $key => $value) {
 			if($value['id'] == $group_id){
 				unset($group_list[$key]);
 			}
 		}
 		update_option('template_cat_group_list', array_values($group_list));

 		$parent_categories = get_terms(
 			array(
 				'taxonomy' => 'template_cat',
 				'parent' => 0,
 				'hide_empty' => true,
 			)
 		);

 		foreach ($parent_categories as $key => $parent_category) {

 			$cat_group_id = get_option('template_cat_'.$parent_category->term_id.'_group' , '');
 			if($cat_group_id == $group_id){
 				delete_option('template_cat_'.$parent_category->term_id.'_group');
 			}
 		}

 		echo json_encode($response);
 		die;
 	}

 	public function mwb_get_temp_cat_columns($columns){
 		$columns['group'] = 'Group' ; 
 		return $columns;
 	}

 	public function manage_category_custom_fields($deprecated,$column_name,$term_id){
 		if ($column_name == 'group') {
 			$group_id = get_option('template_cat_'.$term_id.'_group' , '') ;
 			$group_name = '--' ; 
 			if($group_id != ''){
 				$group_list = get_option('template_cat_group_list' , array());
 				$group = $this->get_cat_group_by_id($group_list,$group_id);
 				$group_name = $group['name'];
 			}
 			echo $group_name;
 		}
 	}

 	public function save_backend_settings(){

 		$setting_options = array(
 			'mwb_tgp_setting' ,
 			'mwb_tgp_template_setting',
 			'mwb_tgp_card_setting',
 			'mwb_tgp_card_info_setting',
 			'mwb_tgp_prev_setting',
 			'mwb_tgp_mbl_setting',
 			'mwb_tgp_gbl_setting',
 			'mwb_tgp_header_setting',
 			'mwb_tgp_footer_setting'
 		);

 		foreach ($setting_options as $k => $setting_key) {
 			if(array_key_exists($setting_key, $_POST)){

 				unset($_POST[$setting_key]);

 				$settings = array();

 				foreach ($_POST as $key => $value) {
 					$settings[$key] = sanitize_text_field($value);
 				}

 				update_option( $setting_key , $settings);

 				global $mwb_tgp ; 
 				$mwb_tgp['notice'] = "Settings Saved Successfully" ; 
 			}
 		}
 	}

 	public static function get_setting_panel_tabs($tab="sidebar"){
 		$tabs = array(
 			'sidebar' => 'Sidebar Panel',
 			'template' => 'Template Panel',
 			'card' => 'Template Card',
 			'card-info' => 'Template Info',
 			'prev-page' => 'Preview Panel',
 			'mobile' => 'Mobile View',
 			'header' => 'App Header',
 			'footer' => 'App Footer',
 			'global' => 'Global',
 		);
 		$tabs_html = '' ; 
 		foreach ($tabs as $key => $name) {
 			$selected = ($key == $tab) ? "selected" : '' ; 
 			$tabs_html .= '<a class="nav-tab '.$selected.'" href="?post_type=template&page=mwb_tgp&tab='.$key.'">'.$name.'</a>';
 		}
 		return $tabs_html;
 	}

 	public static function get_setting_panel_notice(){
 		global $mwb_tgp ; 
 		$notice_html = '';
 		if(isset($mwb_tgp['notice']) && $mwb_tgp['notice'] != ""){
 			$notice_html = '<div class="mwb-tgp-notice"><span class="mwb-tgp-notice-text">'.$mwb_tgp['notice'].'</span><span class="mwb-tgp-notice-close">X</span></div>';
 			unset($mwb_tgp['notice']);
 		}
 		return $notice_html;
 	}

 	public function redirect_single_page_to_app(){
 		global $post ; 
 		if(is_single() && "template" == $post->post_type){
 			wp_redirect("https://wp-react-65a38.web.app/");
 			exit();
 		}
 	}

 	public function add_filter_terms_order( $orderby, $query_vars, $taxonomies ) {
 		return $query_vars['orderby'] == 'term_order' ? 'term_order' : $orderby;
 	}

 	public function add_rest_filter_terms_order($args , $request){
 		$args['orderby'] = 'term_order';
 		$args['hide_empty'] = true;
 		return $args;
 	}
}
