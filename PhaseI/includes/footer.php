<?php 

/*
#Require File:
*/

require_once(ABSOLUTE_PATH.'/pi-classes/global-functions.php');
require_once(ABSOLUTE_PATH.'/language/'.LANG_KEY.'/language-'.LANG_KEY.'.php');
require_once(ABSOLUTE_PATH.'/pi-classes/cls-cms.php');


/*
#Object:-
*/
$obj_cms = new Cms();


/*
# GET ALL CMS Pages LIST : Default LANG_ID; 
*/
		#@Parameter:-
		$table_name        = "cms";
		$fields_to_pass    = "*";
		$condition_to_pass = " `lang_id` = '".LANG_ID."'  AND `status` = 'Published'  GROUP BY `page_alias` ";
		$arr_cms_page_list = $obj_cms->getAnyRecord($table_name,$fields_to_pass,$condition_to_pass,$debug_to_pass=0);
  
?>

<!-- [Start::Header,Top-Navigation Section] -->
<?php
$static_string_to_include=<<<EOF
<script>
jQuery(document).ready(function(e) {
  jQuery(".panel-heading").bind("click",handleClickOfQuestion);
	 jQuery(".panel-heading").css("cursor","pointer");
		/*[End::Language Flag]*/
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

?>

<footer><br />
    <br />
    <hr />
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>
				
				
				<?php echo USER_MSG;?>
				
				<?php 
								 foreach($arr_cms_page_list as $key=>$page)
								 {		
				?>
				 &nbsp; &nbsp; &nbsp; <a href="<?php echo SITE_PATH;?>cms/<?php echo $page['page_alias'];?>" ><?php echo $page['page_title'];?></a> 
				<?php
								 }
				?> 
				<!--&nbsp; &nbsp; &nbsp; # <a href="<?php echo SITE_PATH;?>contact" >Contact Us</a> 
				&nbsp; &nbsp; &nbsp; # <a href="<?php echo SITE_PATH;?>blogs.php" >Blog</a> 
				&nbsp; &nbsp; &nbsp; Made by <a href="http://www.panaceatek.com" target="_blank">Panacea Infotech Pvt. Ltd</a>.-->
            </div>
        </div>
    </div>
	
	
</footer>