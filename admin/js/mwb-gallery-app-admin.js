jQuery(document).ready(function($){
	
	hideAdminNotice();	
	addEditorNotice();
	addColorFields();


	$('.mwb-cat-order-list-item').draggable({revert: "invalid"});

	$('.mwb-list-tree' ).sortable({
		update: function( event, ui ) {
			updateCategoryOrder(event , ui);
		}
	});

	$('.mwb-cat-order-list-group-name').click(function(e){
		const list = jQuery(this).closest('.mwb-tgp-cat-order-list-group-wrap').find('.mwb-cat-order-list-group-cats');
		list.slideToggle();
	});

/*	$('.mwb-list-cat-name').click(function(e){
		const list  = jQuery(this).closest('.mwb-template-cat').find('.mwb-template-card-list');
		if(list.length > 0 ){
			list.slideToggle();
		}
	});
*/


	updateCategoryOrder = (event , ui) => {
		const eleId = event.target.id ;
		const parentId = jQuery('#'+eleId).attr('data-parent-id');
		const listItems = jQuery('.mwb-template-cat-'+parentId);
		let termOrder = []
		jQuery(listItems).each(function(index, obj){
			termOrder.push(index);
		});
		termOrder.sort();
		jQuery(listItems).each(function(index, obj){
			jQuery(this).attr('data-term-order' , termOrder[index]);
		});
	}

	$('#group-list-wrap').droppable({
		tolerance: 'pointer',
		accept: '.mwb-tgp-cat-order-list-group-wrap',
		activeClass: "ui-state-active",
		hoverClass: "ui-state-hover",
		drop: function(event, ui) {
			var itemEl = $(ui.draggable);
			if(itemEl.length > 0){
				itemEl.css({top: 0, left: 0}).appendTo('#group-list-wrap');
				updateGroupOrder();
			}
		} 
	});

	initializeDroppableElements = () => {
		jQuery('.mwb-cat-order-list-group-cats').each(function(index, $obj){
			const eleId = jQuery(this).attr('id');
			const listEleId = jQuery(this).find('.mwb-cat-order-list').attr('id');
			const groupID = jQuery(this).find('.mwb-cat-order-list').attr('data-group-id');

			$('#'+eleId).droppable({
				tolerance: 'pointer',
				accept: '.mwb-cat-order-list-item',
				activeClass: "ui-state-active",
				hoverClass: "ui-state-hover",
				drop: function(event, ui) {
					var itemEl = $(ui.draggable);
					if(itemEl.length > 0){
						itemEl.css({top: 0, left: 0}).appendTo('#'+listEleId);
						itemEl.attr("data-group-id" , groupID);
						updateGroupTermOrder('#'+listEleId);
					}
				} 
			});
		});
	}

	initializeDroppableElements();
		

	jQuery("#mwb-save-category-order").click(function(){
		
		var groupData = {};
		var catTermOrder = {};
		var groupOrder = {};

		jQuery('.mwb-template-cat').each(function (index, obj) {
			var catID  = jQuery(this).attr("data-category-id") ;
			var termOrder  = jQuery(this).attr("data-term-order") ;
			catTermOrder[catID] = termOrder;
		});

		jQuery('.mwb-cat-order-list-item').each(function (index, obj) {
			var catID  = jQuery(this).attr("data-category-id") ; 
			var groupID  = jQuery(this).attr("data-group-id") ;
			groupData[catID] = groupID
		});

		jQuery('.mwb-tgp-cat-order-list-group-wrap').each(function(index,obj){
			var id = jQuery(this).attr('data-group-id');
			var order = jQuery(this).attr('data-group-order');
			groupOrder[id] = order;
		});

		var data = {
			'action' : 'mwb_set_category_order' , 
			'group_data' : groupData,
			'group_order': groupOrder,
			'term_order' : catTermOrder,
		}

		jQuery.post( js_data.ajax_url, data, function(response) {
			if(response){
				alert('updated');
			}
		});

	});


	updateGroupTermOrder = (groupContainer) => {
		const listItems = jQuery(groupContainer).find('.mwb-cat-order-list-item');
		let termOrder = [] ; 
		listItems.each(function(index , obj){
			termOrder.push(index);
		});
		termOrder.sort();
		listItems.each(function(index, obj){
			jQuery(this).attr('data-term-order' , termOrder[index]);
		});
	}

	updateGroupOrder = () => {
		let groupOrder = [] ;
		jQuery('.mwb-tgp-cat-order-list-group-wrap').each(function(index,obj){
			groupOrder.push(jQuery(this).attr('data-group-order'));
		});
		groupOrder.sort();
		jQuery('.mwb-tgp-cat-order-list-group-wrap').each(function(index,obj){
			jQuery(this).attr('data-group-order' , groupOrder[index]);
		});
	}

	//cat order js

	$('.mwb-tgp-cat-group-list').sortable({
		update: function( event, ui ) {
			updateGroupListOrder(event , ui);
		}
	});
	const updateGroupListOrder = (event , ui) => {
		$('.mwb-tgp-cat-group-item').each(function(index, obj){
			jQuery(this).attr('data-order-id' , index);
		});
	}

	$('#mwb-save-group-order').click(function(e){
		
		var groupList = [] ;
		$('.mwb-tgp-cat-group-item').each(function(index, obj){

			var group = {
				'order' : jQuery(this).attr('data-order-id'),
				'id' : jQuery(this).attr('data-group-id'),
				'name' : jQuery(this).attr('data-group-name'),
			};
			groupList.push(group);

		});

		var data = {
			'action' : 'mwb_set_group_order' , 
			'group_list' : groupList,
		}

		jQuery.post( js_data.ajax_url, data, function(response) {
			if(response){
				location.reload();
			}
		});
	});

	$('.mwb-list-item-edit').click(function(e){
		e.preventDefault();
		var html = jQuery(this).html();
		const item = jQuery(this).closest('.mwb-tgp-cat-group-item') ;
		name = item.find('.mwb-name-input').val();
		item.attr('data-group-name' , name);
		item.find('.mwb-tgp-cat-group-name').html(name);
		item.find('.mwb-tgp-cat-group-name').toggleClass('mwb-hide');
		item.find('.mwb-name-input-container').toggleClass('mwb-hide');
	});

	$('.mwb-name-input').keyup(function(e){
		const item = jQuery(this).closest('.mwb-tgp-cat-group-item') ;
		var name = jQuery(this).val() ; 
		if(name.length > 0 ){
			item.attr('data-group-name' , name);
		}
	});

	$('.mwb-list-item-delete').click(function(e){
		
		e.preventDefault();
		const item = jQuery(this).closest('.mwb-tgp-cat-group-item') ;
		const groupId = item.attr('data-group-id');

		var data = {
			'action' : 'mwb_delete_group' , 
			'group_id' : groupId,
		}

		jQuery.post( js_data.ajax_url, data, function(response) {
			if(response){
				location.reload(); 
			}
		});
	});

	//cat order js 

	//btn prev select 

	$('.mwb-select-prev-btn').click(function(e){
		$('.mwb-select-prev-btn').prop('checked' , false);
		$(this).prop('checked', true);
		var btnId = $(this).val();	
		var slug = $('.mwb-btn-meta-box-wrap').attr('data-temp-slug');
		var oldBtnId = $('.mwb-btn-meta-box-wrap').attr('data-prev-btn');
		$('.mwb-btn-meta-box-wrap').attr('data-prev-btn', btnId);
		var url = "preview?template="+slug ; 
		$('.btn_text_'+oldBtnId).val('') ;
		$('.btn_url_'+oldBtnId).val('') ;
		$('.btn_text_'+btnId).val('Preview') ;
		$('.btn_url_'+btnId).val(url) ;
	});

	//automatically check parent cats 

	$('.selectit input').click(function(e){
		e.stopPropagation();	
		var label = jQuery(this);
		findAndCheckParent(label);
		
	});

	const findAndCheckParent = (label) => {
		var ul =  label.closest('ul') ; 
		if(ul.hasClass('children')){
			var li = ul.parent('li') ; 
			var parentLabel = li.first('.selectit');
			var checkBox = parentLabel.find('input:first');
			var checked = checkBox.is(':checked') ; 
			checkBox.prop('checked' , !checked);
			findAndCheckParent(parentLabel);
		} 
	}


	//add new group js 

	jQuery("#mwb-add-new-group").click(function(e){
		jQuery(".mwb-tgp-cat-new-group-from").slideToggle();
	});
});

hideAdminNotice = () => {
	if(jQuery('.mwb-tgp-notice').length > 0){
		setTimeout(function(){
			jQuery('.mwb-tgp-notice').hide();
		}, 3000);
	} 
}
addEditorNotice = () => {
	if(jQuery('body').hasClass('post-type-template')){
		jQuery('<div id="mwb-editor-notice"><span>Can only use inline styles</span></div>')
		.insertAfter('#titlediv') ; 
	}	
}

addColorFields = () => {
	jQuery('.mwb-color-field').wpColorPicker();
}