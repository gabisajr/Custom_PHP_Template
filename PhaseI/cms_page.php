<?php 


/*
#Require File:
*/
require_once(dirname(__FILE__).'/pi-classes/global-functions.php');
require_once(dirname(__FILE__).'/language/'.LANG_KEY.'/language-'.LANG_KEY.'.php');
require_once(dirname(__FILE__).'/pi-classes/cls-cms.php');


/*
#Object:-
*/
$obj_cms = new Cms();


/*
# Get Variables:
*/
$cms_page_alias = $_GET['cms_page_alias']; 

/*
# GET ALL CMS Pages LIST : Default LANG_ID; 
*/
						
		#@Parameter:-
		$table_name        = "cms";
		$fields_to_pass    = "*";
		$condition_to_pass = " `page_alias` = '".$cms_page_alias."'  AND `lang_id` = '".LANG_ID."' AND `status` = 'Published' ";
		$arr_cms_page_list = $obj_cms->getAnyRecord($table_name,$fields_to_pass,$condition_to_pass,$debug_to_pass=0);
  
  #@If case:-
  if(empty($arr_cms_page_list))
  {
					  	header("Location:".SITE_PATH."404");
  	}
?>

<!-- [Start::Header,Top-Navigation Section] -->
<?php
$static_string_to_include=<<<EOF
<script>
jQuery(document).ready(function(e) {
    jQuery(".panel-heading").bind("click",handleClickOfQuestion);
	 jQuery(".panel-heading").css("cursor","pointer");
});

function handleClickOfQuestion()
{
	
	if(jQuery(this).find(".btn-faq").hasClass("glyphicon-chevron-right"))
	{
		jQuery(this).next(".panel-body").hide().removeClass("hidden").show("fast");
		jQuery(this).find(".btn-faq").removeClass("glyphicon-chevron-right").addClass("glyphicon-chevron-down");
	}
	else
	{
		jQuery(this).next(".panel-body").addClass("hidden");
		jQuery(this).find(".btn-faq").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-right");
	}
	
}
</script>
<style>
.error{
    color: red;
}
</style>
EOF;
$include_js_array=array($static_string_to_include);
$include_js=implode("\n",$include_js_array);

#@Define Page Meta Keywords & Meta Description :- 
$page_title            = stripslashes($arr_cms_page_list[0]['page_seo_title']); 
$page_meta_keywords    = stripslashes($arr_cms_page_list[0]['page_meta_keywords']);
$page_meta_description = stripslashes($arr_cms_page_list[0]['page_meta_description']);

include("includes/header.php");
include("includes/top-nav.php");
?>
<!-- [End::Header,Top-Navigation Section] -->


 <title><?php echo SITE_TITLE; ?></title> 
<!-- [Start::Middle Container] -->
<div class="container">

<div class="bs-docs-section">
        <div class="page-header">
          <div class="row">
            <div class="col-lg-12">
              <h1 id="buttons"><?php echo $arr_cms_page_list[0]['page_title'];?></h1>
            </div>
          </div>
        </div>
</div>
<section>

<!-- [Start :: User :: Interface Msg] -->
<?php /* echo USER_MSG;*/ ?>
<!-- [End :: User :: Interface Msg] -->

<!-- [Start :: CMS Page Content] -->
<?php echo $arr_cms_page_list[0]['page_content'];?>
<!-- [End :: CMS Page Content] -->

</section>

</div>
<!-- [End::Middle Container] -->





<!-- [Start::Footer Section] -->
<?php 
include("includes/footer.php"); 
?>
<!-- [End::Footer Section] -->