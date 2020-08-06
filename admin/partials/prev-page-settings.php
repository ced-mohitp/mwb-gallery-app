<?php 
$settings = get_option('mwb_tgp_prev_setting' , array());
if(empty($settings)){
	$settings = Mwb_Gallery_App::get_settings("mwb_tgp_prev_setting") ;
}
?>
<form method="post" action="">
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Template Label');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="prev_template_label_text"><?php _e('Text');?></label>
				<input type="text" name="prev_template_label_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "prev_template_label_text" ) ;?>" placeholder="Template">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="prev_template_label_color"><?php _e('color');?></label>
				<input type="text" name="prev_template_label_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "prev_template_label_color" ) ;?>" class="mwb-color-field">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="prev_template_label_size"><?php _e('Size');?></label>
				<input type="number" name="prev_template_label_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "prev_template_label_size" ) ;?>" >
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Button 1');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="prev_btn_1_bg_color"><?php _e('Backgroud color');?></label>
				<input type="text" name="prev_btn_1_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "prev_btn_1_bg_color" ) ;?>" class="mwb-color-field">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="prev_btn_1_hover_color"><?php _e('Hover color');?></label>
				<input type="text" name="prev_btn_1_hover_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "prev_btn_1_hover_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Button 2');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="prev_btn_2_bg_color"><?php _e('Backgroud color');?></label>
				<input type="text" name="prev_btn_2_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "prev_btn_2_bg_color" ) ;?>" class="mwb-color-field">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="prev_btn_2_hover_color"><?php _e('Hover color');?></label>
				<input type="text" name="prev_btn_2_hover_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "prev_btn_2_hover_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Logo Image');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="prev_page_logo_url"><?php _e('Image url');?></label>
				<input type="text" name="prev_page_logo_url" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "prev_page_logo_url" ) ;?>" placeholder="https://your-site.com/logo.png">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<img src="<?php echo Mwb_Gallery_App::get_setting_value($settings , "prev_page_logo_url" ) ;?>" style="height: 100px;">
			</div>
		</div>		
	</div>
	<input type="submit" name="mwb_tgp_prev_setting" value="save settings" class="button-primary">
</form>