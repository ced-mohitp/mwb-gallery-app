<?php 
$settings = get_option('mwb_tgp_card_setting' , array());
if(empty($settings)){
	$settings = Mwb_Gallery_App::get_settings("mwb_tgp_card_setting") ;
}
?>
<form method="post" action="">
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Card Title');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="title_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="24" name="title_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "title_text_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="title_text_color"><?php _e('Font Color');?></label>
				<input type="text" name="title_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "title_text_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Card Button 1');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="card_button_1_bg_color"><?php _e('Background Color');?></label>
				<input type="text" name="card_button_1_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "card_button_1_bg_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="card_button_1_hover_color"><?php _e('Hover Color');?></label>
				<input type="text" name="card_button_1_hover_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "card_button_1_hover_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>			
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Card Button 2');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="card_button_2_bg_color"><?php _e('Background Color');?></label>
				<input type="text" name="card_button_2_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "card_button_2_bg_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="card_button_2_hover_color"><?php _e('Hover Color');?></label>
				<input type="text" name="card_button_2_hover_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "card_button_2_hover_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>			
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Card Button 3');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="card_button_3_bg_color"><?php _e('Background Color');?></label>
				<input type="text" name="card_button_3_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "card_button_3_bg_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="card_button_3_hover_color"><?php _e('Hover Color');?></label>
				<input type="text" name="card_button_3_hover_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "card_button_3_hover_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>			
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Card Button 4');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="card_button_4_bg_color"><?php _e('Background Color');?></label>
				<input type="text" name="card_button_4_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "card_button_4_bg_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="card_button_4_hover_color"><?php _e('Hover Color');?></label>
				<input type="text" name="card_button_4_hover_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "card_button_4_hover_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>			
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Card Button 5');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="card_button_5_bg_color"><?php _e('Background Color');?></label>
				<input type="text" name="card_button_5_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "card_button_5_bg_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="card_button_5_hover_color"><?php _e('Hover Color');?></label>
				<input type="text" name="card_button_5_hover_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "card_button_5_hover_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>			
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Info Link');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="info_link_text"><?php _e('Info LinkText');?></label>
				<input type="text" name="info_link_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "info_link_text" ) ;?>" placeholder="card info">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="info_link_text_color"><?php _e('Text Color');?></label>
				<input type="text" name="info_link_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "info_link_text_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="info_link_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="24" name="info_link_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "info_link_text_size" ) ;?>">
			</div>
		</div>			
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Price Text');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="price_label_text"><?php _e('Price Label Text');?></label>
				<input type="text" name="price_label_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "price_label_text" ) ;?>" placeholder="Price : ">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="price_label_text_color"><?php _e('Text Color');?></label>
				<input type="text" name="price_label_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "price_label_text_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="price_label_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="24" name="price_label_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "price_label_text_size" ) ;?>">
			</div>
		</div>			
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Featured Text');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="featured_label_text"><?php _e('Featured Label Text');?></label>
				<input type="text" name="featured_label_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "featured_label_text" ) ;?>" placeholder="Featured">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="featured_label_text_color"><?php _e('Text Color');?></label>
				<input type="text" name="featured_label_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "featured_label_text_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="featured_label_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="24" name="featured_label_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "featured_label_text_size" ) ;?>">
			</div>
		</div>			
	</div>
	<input type="submit" name="mwb_tgp_card_setting" value="save settings" class="button-primary">
</form>