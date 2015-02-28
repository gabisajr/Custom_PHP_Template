<?php
require_once("../../pi-classes/global-functions.php");
#Check Admin Login Session admin_id:
isAdminLogin();
require_once("../../pi-classes/cls-global-settings.php");
require_once("../../pi-classes/ThumbLib.inc.php");

#creating object of global setttings
$obj_global_settings=new GlobalSettings();


if(isset($_SESSION['msg']) && $_SESSION['msg']!="")
{
	$msg=$_SESSION['msg'];
	unset($_SESSION['msg']);
}

if(count($_POST)>0)	
{
	if($_POST['value']!="" || $_FILES['value']['name']!='')
	{

		#creating object of global setttings
		$obj_global_settings=new GlobalSettings();
		if($_POST['edit_id']!='' && $_POST['lang_id']!='')
		{	

				
				if($_POST['name']=="default_currency" ||  $_POST['name']=="Default Currency")
				{
					#if parameter is currency then converting it into uppercase
					$arr_to_update=array(
						"value"=>mysql_real_escape_string(strtoupper($_POST['value']))
					);
				}elseif($_POST['name']=="Company Logo"){
                                    
                              
                                     /**uploading company logo images  ***/
                                   if($_FILES["value"]["name"]!='')
                                   {
                                        
                                    if (($_FILES["value"]["type"] == "image/gif")|| ($_FILES["value"]["type"] == "image/png") || ($_FILES["value"]["type"] == "image/jpeg") || ($_FILES["value"]["type"] == "image/pjpeg"))
                                    {
                                            if ($_FILES["value"]["error"] > 0)
                                            {
                                               $_SESSION['msg']="<span class='error'>Sorry Image does not seem to be valid!</span>";
                                            }
                                            else
                                            {
											
                                                    if (file_exists("".ABSOLUTE_PATH."/front-media/img/company_logo" . $_FILES["value"]["name"]))
                                                    {
                                                             $_SESSION['msg']="<span class='error'>Sorry this image does not seem to be valid!</span>";
                                                    }
                                                    else{
                                                          $image_name=time().".".end(explode('/',$_FILES['value']['type']));
                                                          move_uploaded_file($_FILES["value"]["tmp_name"],"".ABSOLUTE_PATH."/front-media/img/company_logo/".$image_name);
                                                           $arr_to_update=array(
                                                                    "value"=>$image_name
                                                            );
                                                         
                                                          $thumb = PhpThumbFactory::create("".ABSOLUTE_PATH."/front-media/img/company_logo/".$image_name);
                                                          $thumb->adaptiveResize(233,76);
                                                          $thumb->save("".ABSOLUTE_PATH."/front-media/img/company_logo/thumbs/".$image_name);
                                                          $thumb->adaptiveResize(300,150);
                                                          $thumb->save("".ABSOLUTE_PATH."/front-media/img/company_logo/thumbs-admin/".$image_name);
                                                          $thumb->adaptiveResize(70,50);
                                                          $thumb->save("".ABSOLUTE_PATH."/front-media/img/company_logo/logo-small-thumbs/".$image_name);
                                                        }
                                            }
                                    }
                                    else{
                                          $_SESSION['msg']="<span class='error'>Sorry, the image does not seem to be valid!! Please upload  image of type .gif,.png,.jpg,.jpeg only...</span>";
                                           header("location:".HTTP_ADMIN."global-settings/edit/".$_POST['edit_id'].'/'.$_POST['lang_id']);exit;
                                    }
                                   }

                                }
				else
				{
					$arr_to_update=array(
						"value"=>mysql_real_escape_string($_POST['value'])
					);
				}
			#condition to update record	
			$where_field="lang_id='".intval(base64_decode($_POST['lang_id']))."' and global_name_id='".intval(base64_decode($_POST['edit_id']))."'";
			#updating the global setttings paramete value into database
			$obj_global_settings->updateGlobalSettings($arr_to_update, $where_field);
			#setting session for displaying notiication message.
			$_SESSION['msg']="<span class='success'>Global setting parameter updated successfully!</span>";	
		}
		#redirecting to global settings list
		header("location:".HTTP_ADMIN."global-settings/list");
	}
}
if((isset($_GET['edit_id']) || $_GET['edit_id']!='') && (isset($_GET['lang_id']) || $_GET['lang_id']!='') )
{
	$arr_global_settings=$obj_global_settings->getGlobalSettings("mst_global.*,trans_global.*","trans_global.lang_id='".intval(base64_decode($_GET['lang_id']))."' and trans_global.global_name_id='".intval(base64_decode($_GET['edit_id']))."'");
	// single row fix
	$arr_global_settings=end($arr_global_settings);
}

?><!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo SITE_TITLE;?>-Admin Panel</title>
<?php include('../sections/header.php'); ?>
<style>
.error {
    color: #BD4247;
    margin-left: 140px;
    width: 210px;
}
div.error {
    color: #BD4247;
    margin-left: 140px;
    width: 500px;
}
.FETextInput{
    margin-left: 120px;
    margin-top: -28px;
}
</style>
<!-- validation js -->
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN;?>admin-media/js/jquery.validate.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(e) {
	jQuery("#frm_edit_global_setting_parameter").validate({
		errorElement: "div",
		rules: {
			lang_id:{
				required:true
			},
			value:{
				required:true
				<?php 
				if($arr_global_settings['name']=="site_email" || $arr_global_settings['name']=="contact_us_email")
				{
					echo ",email:true";
				}
				if($arr_global_settings['name']=="default_currency")
				{
					echo ",minlength:3";
					echo ",maxlength:3";
					echo ",lettersonly:true";
				}
				if($arr_global_settings['name']=="currency_symbol")
				{
					echo ",minlength:1";
					echo ",maxlength:1";
				}
				if($arr_global_settings['name']=="per_page_record")
				{
					echo ",number:true";
				}
				if($arr_global_settings['name']=="contact_us_phone_number")
				{
					echo ",minlength:10";
					echo ",maxlength:10";
					echo ",number:true";
				}
				if ($arr_global_settings['name'] == "facebook_url" || $arr_global_settings['name'] == "twitter_url" || $arr_global_settings['name'] == "google+_url" || $arr_global_settings['name'] == "linkedIn_url") {
				  
				   echo ",url:true";

				}
				?>
					
					
			}		
	},
		messages:{
			lang_id:{
				required:"Please select language."
			},
			value:{
				<?php 
				if($arr_global_settings['name']=="site_email" || $arr_global_settings['name']=="contact_us_email")
				{
					echo 'required:"Please enter an email address."';
				}else if($arr_global_settings['name']=="site_title")
				{
					echo 'required:"Please enter a site title."';
				}
				else if($arr_global_settings['name']=="date_format")
				{
					echo 'required:"Please select a date format."';
				}
				else if($arr_global_settings['name']=="default_currency")
				{
					echo 'required:"Please enter default currency."';
				}
				else if($arr_global_settings['name']=="currency_symbol")
				{
					echo 'required:"Please enter currency symbol."';
				}
				else if($arr_global_settings['name']=="per_page_record")
				{
					echo 'required:"Please enter per page record to display."';
				}
				else if($arr_global_settings['name']=="default_meta_keyword")
				{
					echo 'required:"Please enter default meta keyword."';
				}
				else if($arr_global_settings['name']=="default_meta_description")
				{	
					echo 'required:"Please enter default meta description."';
				}
				
				if($arr_global_settings['name']=="site_email" || $arr_global_settings['name']=="contact_mail")
				{
					echo ',email:"Please enter a valid email address."';
				}
				
				if($arr_global_settings['name']=="default_currency")
				{
					echo ',minlength:"Please enter only atlease three characters."';
					echo ',maxlength:"Please enter only atmost three characters."';
					echo ',lettersonly:"Please enter alphabetical characters."';
				}
				
				if($arr_global_settings['name']=="currency_symbol")
				{
					echo ',minlength:"Please enter only one character symbol."';
					echo ',maxlength:"Please enter only one character symbol."';
					
				}
				if($arr_global_settings['name']=="default_currency" || $arr_global_settings['name']=="default_currency")
				{
					 echo ',email:"Please enter a valid email address."';
					
				}
				if($arr_global_settings['name']=="per_page_record")
				{
					echo ',number:"Please enter valid number."';
				}
				?>
		}
	}
	});
	
	jQuery.validator.addMethod("lettersonly", function(value, element) {
    	return this.optional(element) || /^[A-Z]+$/i.test(value);
	}, ""); 
});
</script>


</head>
<body>
<?php include('../sections/top-nav.php'); ?>
<?php include('../sections/leftmenu.php'); ?>
      <div id="content" class="span10">
      <!--[breadcrumb]-->
      <div>
        <ul class="breadcrumb">
          <li> <a href="<?php echo HTTP_ADMIN;?>dashboard">Dashboard</a> <span class="divider">/</span> </li>
          <li> <a href="<?php echo HTTP_ADMIN; ?>global-settings/list">Manage Global Settings</a> <span class="divider">/</span></li>
		  <li> Edit Global Setting Parameter</li>
        </ul>
      </div>
      
      <!--[message box]-->
      <?php if($msg != ''){?>
      <div class="msg_box alert alert-success">
        <button type="button" class="close" data-dismiss="alert" id="msg_close" name="msg_close">×</button>
        <?php echo $msg; ?> </div>
      <?php
		 }
		?>
      <div class="row-fluid sortable"> 
        <!--[sortable header start]-->
        <div class="box span12">
          <div class="box-header well">
            <h2><i class=""></i>Edit Global Setting Parameter</h2>
              <div class="box-icon">
	              <a title="Manage Global Settings" class="btn btn-plus btn-round" href="<?php echo HTTP_ADMIN;?>global-settings/list"><i class="icon-arrow-left"></i></a>
            </div>
          </div>
          <br >
          <!--[sortable body]-->
          <div class="box-content">
            <form name="frm_edit_global_setting_parameter" id="frm_edit_global_setting_parameter" action="<?php echo HTTP_ADMIN;?>global-settings/edit/<?php echo $_GET['edit_id'];?>/<?php echo $_GET['lang_id'];?>" method="POST"  enctype="multipart/form-data">
			
				<input type="hidden" name="global_name_id" id="global_name_id" value="<?php echo $_GET['edit_id'];?>" />
				<input type="hidden" name="lang_id" id="lang_id" value="<?php echo $_GET['lang_id'];?>" />
				
				<div class="control-group">
                  <label class="control-label" for="input_parameter">Parameter Name</label>
                  <div class="controls">
				  	<input type="text" dir="ltr" readonly="readonly" style="margin-left:140px; margin-top:-28px" class="FETextInput" name="name" id="name" value="<?php echo ucwords(str_replace("_"," ",$arr_global_settings['name']));?>" />
                  </div>
                </div>
				
				
				
				<div class="control-group">
                  <label class="control-label" for="inputQuestion">Parameter Value<sup class="mandatory">*</sup></label>
                  <div class="controls">
				  <?php
				  if($arr_global_settings['name']=="date_format")
				  {
					 #here are set some formate it can be changed according to need
					  ?>
					  		<select name="value" id="value" style="margin-left:140px; margin-top:-28px">
								<option <?php if($arr_global_settings['value']=="Y-m-d"){?> selected="selected"<?php }?> value="Y-m-d"><?php echo date("Y-m-d");?></option>
								<option <?php if($arr_global_settings['value']=="Y/m/d"){?> selected="selected"<?php }?> value="Y/m/d"><?php echo date("Y/m/d");?></option>
								<option <?php if($arr_global_settings['value']=="Y-m-d H:i:s"){?> selected="selected"<?php }?> value="Y-m-d H:i:s"><?php echo date("Y-m-d H:i:s");?></option>
								<option <?php if($arr_global_settings['value']=="Y/m/d H:i:s"){?> selected="selected"<?php }?> value="Y/m/d H:i:s"><?php echo date("Y-m-d H:i:s");?></option>
								<option <?php if($arr_global_settings['value']=="F j, Y, g:i a"){?> selected="selected"<?php }?> value="F j, Y, g:i a"><?php echo date("F j, Y, g:i a");?></option>
								<option <?php if($arr_global_settings['value']=="m.d.y"){?> selected="selected"<?php }?> value="m.d.y"><?php echo date("m.d.y");?></option>
							</select>	
					  <?php
				  }else if($arr_global_settings['name']=='company_logo'){?>
                                       <input  dir="ltr" style="margin-left:141px; margin-top:-28px" class="FETextInput" id="value" name="value" type="file">
                                  <br><br><img width="100" height="100" src="<?php echo HTTP_PATH;?>/front-media/img/company_logo/<?php echo stripslashes($arr_global_settings['value']); ?>" id="front_image_tag_id" title="image"> 
                                
                                 <?php }
				  else
				  {
				  ?>
				  	<input type="text" dir="ltr" style="margin-left:140px; margin-top:-28px" class="FETextInput" name="value" id="value" value="<?php echo $arr_global_settings['value'];?>" />
				 <?php
				 }
				 ?>	
					
					
                  </div>
                </div>
				
				
				
                <div class="form-actions">
                  <button type="submit" name="btn_submit" class="btn btn-primary" value="Save changes">Save changes</button>
                 	 <input type="hidden" name="edit_id" value="<?php echo $_GET['edit_id']; ?>">
                </div>
					
              </form>
          </div>
          <!--[sortable body]--> 
        </div>
      </div>
      
      <!--[sortable table end]--> 
      
      <!--[include footer]-->
      </div><!--/#content.span10-->

</div><!--/fluid-row-->
      <?php include('../sections/footer.php'); ?>
</div>
</body>
</html>

