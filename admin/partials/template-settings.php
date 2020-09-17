<?php 
$settings = get_option('mwb_tgp_template_setting' , array());
if(empty($settings)){
	$settings = Mwb_Gallery_App::get_settings("mwb_tgp_template_setting") ;
}
?>
<form method="post" action="">
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Backgroud');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="template_panel_bg_color"><?php _e('Color');?></label>
				<input type="text" name="template_panel_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "template_panel_bg_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Main Heading');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="main_heading_text"><?php _e('Heading Text');?></label>
				<input type="text" name="main_heading_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "main_heading_text" ) ;?>" placeholder="All Templates">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="search_result_text"><?php _e('Search Result Text');?></label>
				<input type="text" name="search_result_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "search_result_text" ) ;?>" placeholder="Your Search Result..">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="no_result_text"><?php _e('No Result Text');?></label>
				<input type="text" name="no_result_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "no_result_text" ) ;?>" placeholder="No Results Found">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="main_heading_text_size"><?php _e('Font Size');?></label>
				<input type="number" min="10" max="24" name="main_heading_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "main_heading_text_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="main_heading_text_color"><?php _e('Font Color');?></label>
				<input type="text" name="main_heading_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "main_heading_text_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Category Heading Text');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="cat_heading_text"><?php _e('Category Heading Text');?></label>
				<textarea name="cat_heading_text" placeholder="Templates for {category_name} category"><?php echo stripslashes( Mwb_Gallery_App::get_setting_value($settings , "cat_heading_text" )) ;?></textarea>
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="cat_heading_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10"  name="cat_heading_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "cat_heading_text_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="cat_heading_text_color"><?php _e('Text Color');?></label>
				<input type="text" name="cat_heading_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "cat_heading_text_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Pagination');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="pagination_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="24" name="pagination_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "pagination_text_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="pagination_text_color"><?php _e('Text Color');?></label>
				<input type="text" name="pagination_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "pagination_text_color" ) ;?>" class="mwb-color-field">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="pagination_hover_color"><?php _e('Hover Circle Color');?></label>
				<input type="text" name="pagination_hover_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "pagination_hover_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>		
	</div>
	<input type="submit" name="mwb_tgp_template_setting" value="save settings" class="button-primary">
</form>