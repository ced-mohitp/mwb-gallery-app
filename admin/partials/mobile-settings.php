<?php 
$settings = get_option('mwb_tgp_mbl_setting' , array());
if(empty($settings)){
	$settings = Mwb_Gallery_App::get_settings("mwb_tgp_mbl_setting") ;
}
?>
<form method="post" action="">
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Categories Heading');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="mbl_cat_heading_text"><?php _e('Text Color');?></label>
				<input type="text"  name="mbl_cat_heading_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "mbl_cat_heading_text" ) ;?>"placeholder="Categories">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="mbl_cat_heading_text_color"><?php _e('Text Color');?></label>
				<input type="text"  class="mwb-color-field" name="mbl_cat_heading_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "mbl_cat_heading_text_color" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="mbl_cat_heading_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="24" name="mbl_cat_heading_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "mbl_cat_heading_text_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="mbl_cat_heading_bg_color"><?php _e('Background Color');?></label>
				<input type="text" class="mwb-color-field" name="mbl_cat_heading_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "mbl_cat_heading_bg_color" ) ;?>">
			</div>
		</div>		
	</div>
	<input type="submit" name="mwb_tgp_mbl_setting" value="save settings" class="button-primary"> 
</form>