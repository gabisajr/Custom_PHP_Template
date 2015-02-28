<?php
require_once(dirname(__FILE__).'/pi-classes/global-functions.php');
require_once(dirname(__FILE__).'/language/'.LANG_KEY.'/language-'.LANG_KEY.'.php');
require_once(dirname(__FILE__).'/pi-classes/cls-cms.php');
include_once(dirname(__FILE__).'/pi-classes/cls-blog.php');

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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Bootbusiness | Short description about company">
        <meta name="author" content="Your name">        
        <title><?php echo SITE_TITLE; ?></title>    
        <?php include("includes/header.php"); ?>
    </head>
    <body>
        <?php include("includes/top-nav.php"); ?>
        <div class="container">
            <div class="bs-docs-section">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 id="buttons">Home</h1>
                        </div>
                    </div>
                </div>
            </div> 
            <?php include("includes/bred-crumb.php"); ?>
            <?php if ($_SESSION['msg']['logout_message'] != '') { ?>
                <div class="alert alert-success">
                    <a href="javascript:void(0);" class="close" data-dismiss="alert">&times;</a>
                    <strong></strong> <?php echo $_SESSION['msg']['logout_message']; ?>
                </div>
                <?php unset($_SESSION['msg']['logout_message']);
            }
            ?>
            <section>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="well">
                            Welcome page content Welcome page content Welcome page content Welcome page content Welcome page content Welcome page content Welcome page content Welcome page content 
                            Welcome page content Welcome page content Welcome page content Welcome page content Welcome page content Welcome page content Welcome page content Welcome page content 
                        </div>
                    </div>
            </section>
            <br>
        </div>
<?php include("includes/footer.php"); ?>
    </body>
</html>