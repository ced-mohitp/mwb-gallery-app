<?php
$tab = isset($_GET['tab']) ? $_GET['tab'] : "sidebar" ; 
?>
<div class="mwb-tgp-admin-wrap">
	<div class="mwb-tgp-admin-head mwb-tgp-setting-head">
		<?php _e('General Settings') ;?>
	</div>
	<div class="mwb-tgp-notice-wrap">
		<?php echo Mwb_Gallery_App_Admin::get_setting_panel_notice();?>
	</div>
	<div class="nav-tab-wrapper">
		<?php echo Mwb_Gallery_App_Admin::get_setting_panel_tabs($tab) ; ?>
	</div>
	<div class="mwb-tgp-admin-content">
		<?php 
		include_once MWB_GALLERY_APP_PATH . "admin/partials/{$tab}-settings.php";
		?>
	</div>
</div>
