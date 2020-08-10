<?php 
$settings = get_option('mwb_tgp_footer_setting' , array());
if(empty($settings)){
	$settings = Mwb_Gallery_App::get_settings("mwb_tgp_footer_setting") ;
}
?>
<form method="post" action="">
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Backgroud');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="footer_bg_color"><?php _e('Backgroud color');?></label>
				<input type="text" name="footer_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "footer_bg_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>			
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Content');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="footer_text"><?php _e('Text');?></label>
				<textarea name="footer_text" placeholder="© 2020: (site name) – The Business Hustlers Corner of the Web. A project by Excite Lab."><?php echo Mwb_Gallery_App::get_setting_value($settings , "footer_text" ) ;?></textarea>
			</div>
		</div>	
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="footer_text_size"><?php _e('Text Size');?></label>
				<input type="number" name="footer_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "footer_text_size" ) ;?>" min="12" placeholder="12">
			</div>
		</div>	
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="footer_text_color"><?php _e('Text color');?></label>
				<input type="text" name="footer_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "footer_text_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>			
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Social Links');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="footer_facebook_link"><?php _e('Facebook');?></label>
				<input type="text" name="footer_facebook_link" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "footer_facebook_link" ) ;?>" placeholder="https://www.facebook.com/">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="footer_youtube_link"><?php _e('YouTube');?></label>
				<input type="text" name="footer_youtube_link" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "footer_youtube_link" ) ;?>" placeholder="https://www.youtube.com/">
			</div>
		</div>	
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="footer_twitter_link"><?php _e('Twitter');?></label>
				<input type="text" name="footer_twitter_link" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "footer_twitter_link" ) ;?>"placeholder="https://www.twitter.com/">
			</div>
		</div>	
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="footer_pinterest_link"><?php _e('Pinterest');?></label>
				<input type="text" name="footer_pinterest_link" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "footer_pinterest_link" ) ;?>" placeholder="https://www.pinterest.com/">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="footer_linkedin_link"><?php _e('Linked In');?></label>
				<input type="text" name="footer_linkedin_link" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "footer_linkedin_link" ) ;?>" placeholder="https://www.linkedin.com/">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="footer_support_link"><?php _e('Support');?></label>
				<input type="text" name="footer_support_link" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "footer_support_link" ) ;?>" placeholder="https://www.yoursite.com/contact">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="footer_email_link"><?php _e('Email');?></label>
				<input type="text" name="footer_email_link" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "footer_email_link" ) ;?>" placeholder="mailto:support@makewebbetter.com">
			</div>
		</div>						
	</div>
	<input type="submit" name="mwb_tgp_footer_setting" value="save settings" class="button-primary">
</form>	