<?php 
$settings = get_option('mwb_tgp_header_setting' , array());
if(empty($settings)){
	$settings = Mwb_Gallery_App::get_settings("mwb_tgp_header_setting") ;
}
?>
<form method="post" action="">
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Header Logo');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="header_logo_url"><?php _e('Image url');?></label>
				<input type="text" name="header_logo_url" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_logo_url" ) ;?>" placeholder="https://your-site.com/logo.png">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<img src="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_logo_url" ) ;?>" style="height: 100px;">
			</div>
		</div>			
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Backgroud');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="header_bg_color"><?php _e('Backgroud color');?></label>
				<input type="text" name="header_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_bg_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>			
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Close Button');?>
		</div>
		<div class="mwb-tgp-admin-form-row">
			<label for="header_back_btn_url"><?php _e('Url');?></label>
			<input type="text" name="header_back_btn_url" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_back_btn_url" ) ;?>"  placeholder="https://yoursite.com/button3">
		</div>
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Button 1');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn1_text"><?php _e('Text');?></label>
				<input type="text" name="header_btn1_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn1_text" ) ;?>"  placeholder="Button 1">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn1_url"><?php _e('Url');?></label>
				<input type="text" name="header_btn1_url" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn1_url" ) ;?>"  placeholder="https://yoursite.com/button1">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn1_text_size"><?php _e('Text Size');?></label>
				<input min="12" type="number" name="header_btn1_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn1_text_size" ) ;?>" placeholder="12">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn1_bg_color"><?php _e('Backgroud color');?></label>
				<input type="text" name="header_btn1_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn1_bg_color" ) ;?>" class="mwb-color-field">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn1_hover_color"><?php _e('Hover color');?></label>
				<input type="text" name="header_btn1_hover_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn1_hover_color" ) ;?>" class="mwb-color-field">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<?php
				$header_btn1_new_tab =  Mwb_Gallery_App::get_setting_value($settings , "header_btn1_new_tab" ) ;
				$checked = ($header_btn1_new_tab == "yes") ? "checked" : "" ; 
				?>
				<label for="header_btn1_new_tab"><?php _e('Open in New Tab');?></label>
				<input type="checkbox" name="header_btn1_new_tab" value="yes" <?php echo $checked ;?>>
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Button 2');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn2_text"><?php _e('Text');?></label>
				<input type="text" name="header_btn2_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn2_text" ) ;?>"  placeholder="Button 2">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn2_url"><?php _e('Url');?></label>
				<input type="text" name="header_btn2_url" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn2_url" ) ;?>"  placeholder="https://yoursite.com/button2">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn2_text_size"><?php _e('Text Size');?></label>
				<input min="12" type="number" name="header_btn2_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn2_text_size" ) ;?>" placeholder="12">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn2_bg_color"><?php _e('Backgroud color');?></label>
				<input type="text" name="header_btn2_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn2_bg_color" ) ;?>" class="mwb-color-field">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn2_hover_color"><?php _e('Hover color');?></label>
				<input type="text" name="header_btn2_hover_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn2_hover_color" ) ;?>" class="mwb-color-field">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<?php
				$header_btn2_new_tab =  Mwb_Gallery_App::get_setting_value($settings , "header_btn2_new_tab" ) ;
				$checked = ($header_btn2_new_tab == "yes") ? "checked" : "" ; 
				?>
				<label for="header_btn2_new_tab"><?php _e('Open in New Tab');?></label>
				<input type="checkbox" name="header_btn2_new_tab" value="yes" <?php echo $checked ;?>>
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Button 3');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn3_text"><?php _e('Text');?></label>
				<input type="text" name="header_btn3_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn3_text" ) ;?>"  placeholder="Button 2">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn3_url"><?php _e('Url');?></label>
				<input type="text" name="header_btn3_url" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn3_url" ) ;?>"  placeholder="https://yoursite.com/button3">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn3_text_size"><?php _e('Text Size');?></label>
				<input min="12" type="number" name="header_btn3_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn3_text_size" ) ;?>" placeholder="12">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn3_bg_color"><?php _e('Backgroud color');?></label>
				<input type="text" name="header_btn3_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn3_bg_color" ) ;?>" class="mwb-color-field">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="header_btn3_hover_color"><?php _e('Hover color');?></label>
				<input type="text" name="header_btn3_hover_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "header_btn3_hover_color" ) ;?>" class="mwb-color-field">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<?php
				$header_btn3_new_tab =  Mwb_Gallery_App::get_setting_value($settings , "header_btn3_new_tab" ) ;
				$checked = ($header_btn3_new_tab == "yes") ? "checked" : "" ; 
				?>
				<label for="header_btn3_new_tab"><?php _e('Open in New Tab');?></label>
				<input type="checkbox" name="header_btn3_new_tab" value="yes" <?php echo $checked ;?>>
			</div>
		</div>		
	</div>
	
	<input type="submit" name="mwb_tgp_header_setting" value="save settings" class="button-primary">
</form>	