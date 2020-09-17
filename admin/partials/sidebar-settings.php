<?php 
$settings = get_option('mwb_tgp_setting' , array());
if(empty($settings)){
	$settings = Mwb_Gallery_App::get_settings("mwb_tgp_setting") ;
}
?>
<form method="post" action="">
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Backgroud');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="sidebar_bg_color"><?php _e('Color');?></label>
				<input type="text" name="sidebar_bg_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "sidebar_bg_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Text Separator');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="text_separator_color"><?php _e('Font Size');?></label>
				<input type="number" min="10" max="24" name="text_separator_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "text_separator_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="text_separator_color"><?php _e('Font Color');?></label>
				<input type="text" name="text_separator_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "text_separator_color" ) ;?>" class="mwb-color-field">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Separator Line');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="separator_line_size"><?php _e('Line Size');?></label>
				<input type="number" min="0" max="5" name="separator_line_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "separator_line_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="separator_line_color"><?php _e('Line Color');?></label>
				<input type="text" name="separator_line_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "separator_line_color" ) ;?>"  class="mwb-color-field">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Search Placeholder');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="placeholder_text"><?php _e('Placeholder Text');?></label>
				<input type="text" name="placeholder_text" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "placeholder_text" ) ;?>" placeholder="Search...">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="placeholder_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="24" name="placeholder_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "placeholder_text_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="placeholder_text_color"><?php _e('Text Color');?></label>
				<input type="text" name="placeholder_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "placeholder_text_color" ) ;?>"  class="mwb-color-field">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Category Label');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="category_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="24" name="category_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "category_text_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="category_text_color"><?php _e('Text Color');?></label>
				<input type="text" name="category_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "category_text_color" ) ;?>"  class="mwb-color-field">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Sub Category Label');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="sub_category_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="24" name="sub_category_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "sub_category_text_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="sub_category_text_color"><?php _e('Text Color');?></label>
				<input type="text" class="mwb-color-field" name="sub_category_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "sub_category_text_color" ) ;?>">
			</div>
		</div>		
	</div>
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('All Label');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="all_label_text_size"><?php _e('Text Size');?></label>
				<input type="number" min="10" max="24" name="all_label_text_size" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "all_label_text_size" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="all_label_text_color"><?php _e('Text Color');?></label>
				<input type="text" class="mwb-color-field" name="all_label_text_color" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "all_label_text_color" ) ;?>">
			</div>
		</div>		
	</div>
	<input type="submit" name="mwb_tgp_setting" value="save settings" class="button-primary"> 
</form>	