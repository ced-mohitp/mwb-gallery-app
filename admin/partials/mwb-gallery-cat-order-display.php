<?php 
$parent_categories = get_terms(
	array(
		'taxonomy' => 'template_cat',
		'parent' => 0,
		'hide_empty' => true,
		'orderby' => 'term_order',
		'order' => 'ASC'
	)
);
$category_groups = array();
$group_list = get_option('template_cat_group_list' , array());
$group_order = array_column($group_list, 'order');
array_multisort($group_order , SORT_ASC , $group_list);
$new_groups = array();
$groupped = array();
foreach ($parent_categories as $key => $parent_category) {
	//$group_id = get_option('template_cat_'.$parent_category->term_id.'_group' , array( 'id' => '' , 'name' => '')) ;
	$group_id = get_option('template_cat_'.$parent_category->term_id.'_group' , '') ;
	if($group_id != ''){
		$category_groups[$group_id][] = $parent_category ; 
		$groupped[] = $parent_category->term_id ; 
	} else {
		$category_groups[-1][] = $parent_category ; 
	}
}
$group_list[] = array('id' => -1 , 'order' => -1 , 'name' => 'Ungroupped') ; 
?>
<div class="mwb-tgp-cat-order-wrap">
	<div class="mwb-tgp-cat-order-head mwb-tgp-setting-head">
		<?php echo "Category Order" ;?>
	</div>
	<div class="mwb-tgp-cat-order-body">
		<div class="mwb-tgp-cat-order-list-wrap" id="group-list-wrap" >
			<?php foreach ($group_list as $key => $group_data) : ?>
				<div class="mwb-tgp-cat-order-list-group-wrap" data-group-id="<?php echo $group_data['id'] ;?>" data-group-order="<?php echo $group_data['order'] ;?>">
					<div class="mwb-cat-order-list-group-name">
						<?php echo $group_data['name'] ;?>
					</div>
					<div class="mwb-cat-order-list-group-cats mwb-hide" id="<?php   echo 'group-wapper-'.$group_data['id'] ;?>">
						<ul class="mwb-cat-order-list" id="<?php echo 'group-list-'.$group_data['id'] ;?>" data-group-id="<?php echo $group_data['id'] ;?>">
							<?php if(isset($category_groups[$group_data['id']])) : ?>	
							<?php foreach ($category_groups[$group_data['id']] as 	$key1 => $category)  : 

								$edit_link = admin_url("term.php?taxonomy=template_cat&tag_ID=$category->term_id&post_type=template") ;


								?>
								<li class="mwb-cat-order-list-item mwb-template-cat" data-category-id="<?php echo $category->term_id ;?>" data-group-id="<?php echo $group_data['id'] ;?>" data-term-order="<?php echo $category->term_order;?>">
									<div class="mwb-list-cat-name parent-cat"><?php echo $category->name ;?> <span class="category-setting"><a target="_blank" href="<?php echo $edit_link ;?>"><span class="dashicons dashicons-edit"></span></a></span></div>
									<?php echo Mwb_Gallery_App_Admin::get_taxonomy_hierarchy('template_cat' , $category->term_id );
									?>
								</li>
							<?php endforeach ;?>
							<?php endif ; ?>
						</ul>
					</div>
				</div>
			<?php endforeach ;?>
		</div>
		<div class="mwb-tgp-cat-group-save-btn-wrap"><button class="button" id="mwb-save-category-order"><?php echo "Save Settings" ;?></button></div>
	</div>
</div>
