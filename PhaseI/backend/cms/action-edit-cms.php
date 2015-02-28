<?php

/*
#Require File:
*/
require_once(dirname(__FILE__).'/../../pi-classes/global-functions.php');
require_once(dirname(__FILE__).'/../../pi-classes/cls-cms.php');


/*
#Object:-
*/
$obj_cms = new Cms();  


/*
# Post Variable Declaration: 
*/

$cms_id      															 = intval($_POST['cms_id']);
$cms_page_title               = addslashes($_POST['cms_page_title']);
$cms_page_content											 = addslashes($_POST['content']);
$cms_page_meta_keywords							= addslashes($_POST['cms_page_meta_keywords']);
$cms_page_meta_description				= addslashes($_POST['cms_page_meta_description']);
$cms_page_seo_title					 			= addslashes($_POST['cms_page_seo_title']);
$cms_page_status              = mysql_real_escape_string('Published'); 
$submit_save_button           = mysql_real_escape_string($_POST['submit_button']);


/*
# If Case:-
*/
if($submit_save_button == "Save Changes" && !empty($cms_page_title) )
{
	
			/*	
			#:-Update Data:-
			*/
			
			#:-parameter:-
			$table_name            = "cms";
			$arr_set_fields        = array("page_title"=>$cms_page_title,
										   "page_content"=>$cms_page_content,
										   "page_meta_keywords"=>$cms_page_meta_keywords,
											"page_meta_description"=>$cms_page_meta_description,
											"page_seo_title"=>$cms_page_seo_title,
										   "status"=>$cms_page_status,
											"on_date"=>date('Y-m-d H:i:s')
										   );
   $conditional_string    = "`cms_id` = '".$cms_id."' "; 																					           
			$return               = $obj_cms -> updateAnyRecord($table_name,$arr_set_fields,$conditional_string,$debug=0);
						
			/*
			#:-Redirect:-  
			*/
			
			if($return)
			{
					$_SESSION['ADMIN_MSG'] = '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button>
																															<strong>Well done!</strong> Record has been updated successfully.
																														</div>';
				 header("location:".HTTP_ADMIN."cms-list");exit;
			}	else
			{
					$_SESSION['ADMIN_MSG'] = '<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button>
																															<strong>Sorry!</strong> We found error in record insertion. Please try after some time !
																														</div>';
				 header("location:".HTTP_ADMIN."cms-list");exit;
			}
						
}else 
{
					$_SESSION['ADMIN_MSG'] = '<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button>
																															<strong>Sorry!</strong> We found some thing wrong in your operation !  
																														</div>';
				 header("location:".HTTP_ADMIN."cms-list");exit;
}
?>
