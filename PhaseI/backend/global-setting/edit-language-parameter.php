<?php
require_once("../../pi-classes/global-functions.php");
#Check Admin Login Session admin_id:
isAdminLogin();
require_once("../../pi-classes/cls-global-settings.php");

#creating object of global setttings
$obj_global_settings=new GlobalSettings();
if(count($_POST)>0)	
{
	if($_POST['value']!="")
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
				}
				else
				{
					$arr_to_update=array(
						"value"=>mysql_real_escape_string($_POST['value'])
					);
				}
			#condition to update record	
			$where_field="lang_id='".intval($_POST['lang_id'])."' and global_name_id='".intval(base64_decode($_POST['edit_id']))."'";
			#updaing the golbal settings parameter into database
			$obj_global_settings->updateGlobalSettings($arr_to_update, $where_field);
			#setting session for displaying notiication message.
			$_SESSION['msg']="<span class='success'>Global setting parameter updated successfully!</span>";	
		}
		#redirecting to global settings list
		header("location:".HTTP_ADMIN."global-settings/list");
	}
}
$arr_global_settings=array();
if((isset($_GET['edit_id']) || $_GET['edit_id']!=''))
{
	#getting the global settings 
	$arr_global_settings=$obj_global_settings->getGlobalSettings("mst_global.*,trans_global.*","trans_global.lang_id='".intval(17)."' and trans_global.global_name_id='".intval(base64_decode($_GET['edit_id']))."'");
	// single row fix
	$arr_global_settings=end($arr_global_settings);
}
#getting all the active languages from the database
$arr_languages=$obj_global_settings->getActiveLanguages("*","status='A'");


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
.FETextInput{
    margin-left: 120px;
    margin-top: -28px;
}
</style>
<!-- validation js -->
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN;?>admin-media/js/jquery.validate.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(e) {
	jQuery("#lang_id").bind("change",getLanguageVals);
	
	/*Validating the form depending upon the parameter set in global settings*/
	jQuery("#frm_edit_global_setting_parameter").validate({
		errorElement: "div",
		rules: {
			lang_id:{
				required:true
			},
			value:{
				required:true
				<?php 
				if($arr_global_settings['name']=="site_email" || $arr_global_settings['name']=="contact_mail")
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
				?>
					
					
			}		
	},
		messages:{
			lang_id:{
				required:"Please select language."
			},
			value:{
				<?php 
				if($arr_global_settings['name']=="site_email" || $arr_global_settings['name']=="contact_email")
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
	
	/*Gettig langauage values for the global settings parameter*/
	function getLanguageVals()
	{
		if(jQuery(this).val()!="")
		{
			jQuery.post("<?php echo HTTP_ADMIN;?>global-settings/get-global-parameter-language",{lang_id:jQuery(this).val(),edit_id:<?php echo base64_decode($_GET['edit_id']);?>},function(msg){
				jQuery("#value").val(msg.value);
			 },"json");
		}
	}
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
		  <li> Edit Global Setting </li>
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
            <h2><i class=""></i>Edit Global Setting</h2>
              <div class="box-icon">
	              <a title="Manage Global Settings" class="btn btn-plus btn-round" href="<?php echo HTTP_ADMIN;?>global-settings/list"><i class="icon-arrow-left"></i></a>
            </div>
          </div>
          <br >
          <!--[sortable body]-->
          <div class="box-content">
            <form name="frm_edit_global_setting_parameter" id="frm_edit_global_setting_parameter" action="<?php echo HTTP_ADMIN;?>global-settings/edit-parameter-language/<?php echo $_GET['edit_id'];?>/<?php echo $_GET['lang_id'];?>" method="POST">
			
				<input type="hidden" name="global_name_id" id="global_name_id" value="<?php echo $_GET['edit_id'];?>" />
				
				<div class="control-group">
                  <label class="control-label" for="input_parameter_name">Parameter Name</label>
                  <div class="controls">
				  	<input type="text" dir="ltr" readonly="readonly" style="margin-left:140px; margin-top:-28px" class="FETextInput" name="name" id="name" value="<?php echo ucwords(str_replace("_"," ",$arr_global_settings['name']));?>" />
                  </div>
                 </div>
				 
				 
				 <div class="control-group">
                  <label class="control-label" for="input_language">Select Language<sup class="mandatory">*</sup></label>
                  <div class="controls">
					  <select id="lang_id" name="lang_id" style="margin-left:140px; margin-top:-28px">
						  <option value="">Select Language</option>
						<?php
						
						foreach($arr_languages as $language)
						{
						?>
							<option value="<?php echo $language['lang_id'];?>"><?php echo $language['lang_name'];?></option><?php
						}
						?>
						</select>
                  </div>
                </div>
				<div class="control-group">
                  <label class="control-label" for="input_parameter_value">Parameter Value<sup class="mandatory">*</sup></label>
                  <div class="controls">
				  				  <?php
								  #here are set some formate it can be changed according to need
				  if($arr_global_settings['name']=="date_format")
				  {
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
				  }
				  else
				  {
				  ?>
				  	<input type="text" dir="ltr" style="margin-left:140px; margin-top:-28px" class="FETextInput" name="value" id="value" value="" />
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

