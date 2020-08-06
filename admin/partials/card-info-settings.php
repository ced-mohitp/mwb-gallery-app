<?php 
$settings = get_option('mwb_tgp_card_info_setting' , array());
if(empty($settings)){
	$settings = Mwb_Gallery_App::get_settings("mwb_tgp_card_info_setting") ;
}
?>
<form method="post" action="">
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="info_panel_bg_color"><?php _e('Backgroud Color');?></label>
				<input type="text" name="info_panel_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "info_panel_bg_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Description Heading');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="description_heading_text"><?php _e('Heading Text');?></label>
				<input type="text"  name="description_heading_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "description_heading_text" ) ;?>" placeholder="Description">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="description_heading_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="48" name="description_heading_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "description_heading_text_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="description_heading_text_color"><?php _e('Text Color');?></label>
				<input type="text" class="mwb-color-field" name="description_heading_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "description_heading_text_color" ) ;?>">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Description Content');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="description_content_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="48" name="description_content_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "description_content_text_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="description_content_text_color"><?php _e('Text Color');?></label>
				<input type="text" class="mwb-color-field" name="description_content_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "description_content_text_color" ) ;?>">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Tagged Heading');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="tagged_heading_text"><?php _e('Heading Text');?></label>
				<input type="text"  name="tagged_heading_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "tagged_heading_text" ) ;?>" placeholder="This template is tagged for : ">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="tagged_heading_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="48" name="tagged_heading_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "tagged_heading_text_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="tagged_heading_text_color"><?php _e('Text Color');?></label>
				<input type="text" class="mwb-color-field" name="tagged_heading_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "tagged_heading_text_color" ) ;?>">
			</div>
		</div>		
	</div>
		<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Tags ');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="tags_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="48" name="tags_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "tags_text_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="tags_text_color"><?php _e('Text Color');?></label>
				<input type="text" class="mwb-color-field" name="tags_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "tags_text_color" ) ;?>">
			</div>
		</div>		
	</div>
	<input type="submit" name="mwb_tgp_card_info_setting" value="save settings" class="button-primary"> 
</form>