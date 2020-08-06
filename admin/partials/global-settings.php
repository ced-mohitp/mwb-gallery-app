<?php 
$settings = get_option('mwb_tgp_gbl_setting' , array());
if(empty($settings)){
	$settings = Mwb_Gallery_App::get_settings("mwb_tgp_gbl_setting") ;
}
$enable_cand_rand =  Mwb_Gallery_App::get_setting_value($settings , "enable_cand_rand" ) ;
$checked = ($enable_cand_rand == "yes") ? "checked" : "" ; 
?>

<form method="post" action="">
	<div class="mwb-tgp-admin-form-section">
		<div class="mwb-tgp-admin-form-section-head">
			<?php _e('Global Settings');?>
		</div>
		<div class="mwb-tgp-admin-form-section-content">
			<div class="mwb-tgp-admin-form-row">
				<label for="baseuri"><?php _e('Template Base Url');?></label>
				<input type="text"  name="baseuri" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "baseuri" ) ;?>" placeholder="template">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="templateuri"><?php _e('Preview Base Url');?></label>
				<input type="text"  name="templateuri" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "templateuri" ) ;?>" placeholder="preview">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="enable_cand_rand"><?php _e('Enable Card Randomization');?></label>
				<input type="checkbox"  name="enable_cand_rand" value="yes" <?php echo $checked ;?>>
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="featured_count"><?php _e('No. of featured cards at home page');?></label>
				<input type="number" min="1" max="15" name="featured_count" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "featured_count" ) ;?>">
			</div>
			<div class="mwb-tgp-admin-form-row">
				<label for="featured_count_cat"><?php _e('No. of featured cards at category page');?></label>
				<input type="number" min="1" max="15" name="featured_count_cat" value="<?php echo Mwb_Gallery_App::get_setting_value($settings , "featured_count_cat" ) ;?>">
			</div>
		</div>		
	</div>
	<input type="submit" name="mwb_tgp_gbl_setting" value="save settings" class="button-primary"> 
</form>