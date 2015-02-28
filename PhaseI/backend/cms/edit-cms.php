<?php

/*
#Require File:
*/
require_once(dirname(__FILE__).'/../../pi-classes/global-functions.php');
require_once(dirname(__FILE__).'/../../pi-classes/cls-cms.php');
isAdminLogin();

/*
#Object:-
*/
$obj_cms = new Cms();  


/*
#Template id:
*/
$cms_page_id = $_GET['cms_id'];


/*
# Get CMS Page Details for edit listing:-
*/
	
	#:-parameter:-
	$fields_to_pass    = "`A`.`cms_id`,`A`.`lang_id`,`A`.`page_alias`,`A`.`page_title`,`A`.`page_content`,`A`.`status`,`B`.`lang_name`,`A`.`page_meta_keywords`,`A`.`page_meta_description`,`A`.`page_seo_title`";
	$condition_to_pass = " `B`.`status` = 'A' AND `A`.`cms_id` = '".$cms_page_id."'  ";
	$arr_cms_details = $obj_cms -> getCmsPageDetails($fields_to_pass,$condition_to_pass,$debug_to_pass=0);  

	#@If case:-
  if(empty($arr_cms_details))
  {
					  	header("Location:".HTTP_ADMIN."404");
  	}
	
	
?>

<!-- [Start :: Section ] -->
<?php 
$include_css  = <<<EOF
<style>
	.cleditorMain {
		width:850px !important;
		height:400px !important;
	}
	.cleditorMain iframe{
		height:93% !important;
	}
</style>
EOF;
$include_js   = array($include_css);
$include_js[] = '<script language="javascript" type="text/javascript" src="'.HTTP_ADMIN.'admin-media/js/jquery.validate.js"></script>';
$include_js[] = '<script language="javascript" type="text/javascript" src="'.HTTP_ADMIN.'admin-media/js/cms/edit-cms.js"></script>';
$include_js=implode("\n",$include_js);
include('../sections/header.php');
include('../sections/top-nav.php');
include('../sections/leftmenu.php'); 
?>
<script type="text/javascript" src="<?php echo HTTP_ADMIN;?>admin-media/js/libs/editor/required_files_ckedior/ckeditor.js"></script>
<script src="<?php echo HTTP_ADMIN;?>admin-media/js/libs/editor/required_files_ckedior/sample.js" type="text/javascript"></script>	
<script type="text/javascript">      
    CKEDITOR.replace( 'desc',
        {
            filebrowserBrowseUrl :'<?php echo HTTP_ADMIN;?>admin-media/js/libs/editor/required_files_ckedior/filemanager/browser/default/browser.html?Connector=<?php echo HTTP_ADMIN;?>/js/admin/libs/editor/required_files_ckedior/filemanager/connectors/php/connector.php',
            filebrowserImageBrowseUrl : '<?php echo HTTP_ADMIN;?>admin-media/js/libs/editor/required_files_ckedior/filemanager/browser/default/browser.html?Type=Image&amp;Connector=<?php echo HTTP_ADMIN;?>/js/admin/libs/editor/required_files_ckedior/filemanager/connectors/php/connector.php',
            filebrowserFlashBrowseUrl :'<?php echo HTTP_ADMIN;?>admin-media/js/libs/editor/required_files_ckedior/filemanager/browser/default/browser.html?Type=Flash&amp;Connector=<?php echo HTTP_ADMIN;?>/js/admin/libs/editor/required_files_ckedior/filemanager/connectors/php/connector.php'}
     );
     // here inserting text to ckeditor after double click.
     function insertText(obj) {
	newtext = obj.value;
	CKEDITOR.instances['textContent'].insertText(newtext);
};
     //   CKEDITOR.instances.desc.insertText(newtext);
	//ckeditor.execCommand("ckInsertContent",false,);

</script>
<!-- [End :: Section ] -->

<!--  -->

<title><?php echo SITE_TITLE;?>-Admin Panel</title>
<div id="content" class="span10">

<div>
	<ul class="breadcrumb">
		<li>
			<a href="<?php echo HTTP_ADMIN;?>cms-list">CMS Page List</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="<?php echo HTTP_ADMIN;?>edit-cms/<?php echo $cms_page_id; ?>" >Edit CMS Page</a>
		</li>
	</ul>
</div>

<div class="row-fluid sortable">

	<div class="box span12">
	
		<div class="box-header well" data-original-title>
			<h2><i class="icon-list-alt"></i> Edit CMS Page Details </h2>
			<div class="box-icon">
				<a href="<?php echo HTTP_ADMIN;?>cms-list" class="btn btn-round" title="Back"><i class="icon-circle-arrow-left"></i></a>
				<!-- <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a> -->
			</div>
		</div>
		
		
		<div class="box-content">
			<form class="form-horizontal" name="edit_cms_form" id="edit_cms_form" action="<?php echo HTTP_ADMIN;?>action-edit-cms/<?php echo $cms_page_id;?>" method="post">
				<fieldset>
					 <legend> CMS Page Details (* Required) </legend>

					<div class="control-group">
						<label class="control-label">CMS Page Title *</label>
						<div class="controls">
							<input type="text" name="cms_page_title" id="cms_page_title" value="<?php echo $arr_cms_details[0]['page_title'];?>">
						</div>
					</div>   

					<div class="control-group">
						<label class="control-label" for="textarea2">Cms Page Content</label>    
						<div class="controls">
           <textarea class="ckeditor" id="content" name="content" ><?php echo $arr_cms_details[0]['page_content'];?></textarea>
						</div>
					</div>
					
					<!--<div class="control-group">
                        <label class="control-label">Status *</label>
                        <div class="controls">
                            <select name="status" id="status">
                            				<option value=""> -- Select Status -- </option>
																												<option value="Published"   <?php if($arr_cms_details[0]['status'] == "Published"){?> selected=selected <?php }?> > Published</option>
																												<option value="Unpublished" <?php if($arr_cms_details[0]['status'] == "Unpublished"){?> selected=selected <?php }?> >Unpublished</option>
                            </select>
                        </div>
                    </div>-->
                    
                    <!--<div class="control-group">
                        <label class="control-label">Language</label>
                        <div class="controls">
                        			<input type="text" readonly="readonly" name="lang_name" id="lang_name" value="<?php echo $arr_cms_details[0]['lang_name'];?>" style="width:80px;" /> 
                        </div>
                    </div>-->
						
						<legend> Meta Details</legend>
						
                    <div class="control-group">
                        <label class="control-label">Page SEO Title </label>
                        <div class="controls">
                        			<textarea name="cms_page_seo_title" id="cms_page_seo_title" rows="5" cols="20" style=" width: 350px;"><?php echo $arr_cms_details[0]['page_seo_title'];?></textarea>
                        </div>
                    </div>
						
                    <div class="control-group">
                        <label class="control-label">Meta Keywords</label>
                        <div class="controls">
                        			<textarea name="cms_page_meta_keywords" id="cms_page_meta_keywords" rows="5" cols="20"  style=" width: 350px;"><?php echo $arr_cms_details[0]['page_meta_keywords'];?></textarea> 
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Meta Description </label>
                        <div class="controls">
																								<textarea name="cms_page_meta_description" id="cms_page_meta_description" rows="5" cols="20"  style=" width: 350px;"><?php echo $arr_cms_details[0]['page_meta_description'];?></textarea>                        			 
                        </div>
                    </div>
						
  					<div class="form-actions">
						<button type="submit" name="submit_button" id="submit_button" class="btn btn-primary" value="Save Changes">Save Changes</button>
						<input type="hidden" name="cms_id" id="cms_id" value="<?php echo $cms_page_id; ?>" >
						<button type="reset" name="cancel" class="btn" onclick="window.top.location='<?php echo HTTP_ADMIN;?>cms-list';">Cancel</button>
						</div>
						
				</fieldset>
			</form>   
		</div>
	</div><!--/span-->
</div><!--/row-->

<!-- [start:::sections] -->       
<?php include('../sections/footer.php'); ?>
<!-- [end:::sections] -->
