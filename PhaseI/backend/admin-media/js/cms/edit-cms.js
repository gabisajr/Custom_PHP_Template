/* add admin Js */

jQuery(document).ready(function() {
	
	jQuery("#edit_cms_form").validate({
		
		errorElement:'div',
		
		rules: {
			cms_page_title: {
				required: true
			},
			status: {
				required: true
			},
			cms_page_meta_keywords:{
				required:true
			},
			cms_page_meta_description:{
				required:true
			},
			cms_page_meta_content:{
				required:true
			}
		},
		messages: {
			cms_page_title:{
				required:"Please enter cms page title."
			},
			status:{
				required:"Please select cms page status."
			},
			cms_page_meta_keywords:{
				required:"Please mention page meta keywords."
			},
			cms_page_meta_description:{
				required:"Please mention page meta description."
			},
			cms_page_meta_content:{
				required:"Please mention page meta content."
			}
		}
		
	});

});
