<?php
$group_list = get_option('template_cat_group_list' , array());
$group_order = array_column($group_list, 'order');
array_multisort($group_order , SORT_ASC , $group_list);
?>
<div class="mwb-tgp-cat-order-wrap">
	<div class="mwb-tgp-cat-order-head mwb-tgp-setting-head">
		<?php echo "Category Groups" ;?>
	</div>
	<div class="mwb-tgp-cat-order-body mwb-tgp-admin-form-section">
		<div class="mwb-tgp-cat-order-body-left mwb-tgp-cat-order-body-section">
			<div class="mwb-tgp-cat-group-wrap">
				<ul class="mwb-tgp-cat-group-list">
					<?php foreach ($group_list as $key => $group)  : ?>
						<li class="mwb-tgp-cat-group-item" 
						data-order-id="<?php echo $group['order'] ;?>"
						data-group-name="<?php echo $group['name'] ;?>"
						data-group-id="<?php echo $group['id'] ;?>">
						<span class="mwb-tgp-cat-group-name">
							<?php echo $group['name'] ;?>		
						</span>
						<span class="mwb-name-input-container mwb-hide">
							<input type="text" class="mwb-name-input" value="<?php echo $group['name'] ;?>">
						</span>
						<span class="mwb-list-item-action">
							<a class="mwb-list-item-edit "><span class="dashicons dashicons-edit"></span></a>
							<a class="mwb-list-item-delete"><span class="dashicons dashicons-dismiss"></span></a>
						</span>
					</li>
				<?php endforeach ; ?>
			</ul>
		</div>
		<div class="mwb-tgp-cat-group-save-btn-wrap">
			<button class="button" id="mwb-save-group-order">
				<?php echo "Save Settings" ;?>		
			</button>
		</div>
	</div>
	<div class="mwb-tgp-cat-order-body-right mwb-tgp-cat-order-body-section">
		<div class="mwb-tgp-cat-group-save-btn-wrap">
			<button class="button" id="mwb-add-new-group">
				<?php echo "Add New + " ;?>		
			</button>
		</div>
		<div class="mwb-tgp-cat-new-group-from mwb-hide">
			<form action="" method="post">
				<input type="text" name="mwb_group_name" class="mwb-name-input"  placeholder="<?php echo "Enter group name" ;?>">
				<input type="hidden" name="action" value="mwb_save_group_name">
				<input type="submit" class="button" value="Save Group">
			</form>
		</div>
	</div>
	<div style="clear: both;"></div>
</div>
</div>