<?php
require_once("../../pi-classes/global-functions.php");
#Check User Login Session user_id:
isAdminLogin();
require_once("../../pi-classes/cls-email-template-admin.php");

if($_POST['inputSubject']!="")
{
    
	$obj_edit_email_template=new EmailTemplate();
       if($_POST['edit_id']!='')
	{		
                //creating array to update the fields 
                $arr_to_update=array("email_template_subject"=>mysql_real_escape_string($_POST['inputSubject']),"email_template_content"=>mysql_real_escape_string(str_replace("\r\n","",$_POST['textContent'])),"date_updated"=>date("Y-m-d"));
		// condition to update the fields 
                $where_field="`email_template_id`=".$_POST['edit_id'];
		
               // updating email template here  
		$obj_edit_email_template->updateEmailTemplate($arr_to_update, $where_field);
                
		$_SESSION['msg']="<span class='success'>Email Template has been updated successfully!</span>";	
	}
	
	header("location:".HTTP_ADMIN."email-template/list.php");

}

$arr_email_template_details=array();
if(isset($_GET['edit_id']) && $_GET['edit_id']!='')
{
        // creating object to get email template details to display in edit form 
	$obj_email_template=new EmailTemplate();
	// getting email info by id 
        $arr_email_template_details=$obj_email_template->getEmailTemplateDetails("*","email_template_id='".intval($_GET['edit_id'])."'");
	
	//getting last element to array as it will be 1 row only but making it sure here 
	$arr_email_template_details=end($arr_email_template_details);
        
}

?><!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo SITE_TITLE;?>-Admin Panel</title>
<?php include('../sections/header.php'); ?>
<script src="<?php echo HTTP_ADMIN;?>admin-media/js/jquery.validate.min.js"></script>
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
<script type="text/javascript" language="javascript">

$(document).ready(function(){
	
	
	jQuery("#frmEmailTemplate").validate({
		 errorElement:'label',
		 rules: {
			inputSubject:{
				required: true
			},
			inputContent:{
				required: true
			}
		},
		messages: {
			inputSubject:{
				required: "Please enter the email template subject."
			},
			inputContent:{
				required: "Please enter the email template content."
			}
		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
		// set &nbsp; as text for IE
			label.hide();
		}
	});

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
          <li> <a href="<?php echo HTTP_ADMIN; ?>email-template/list.php">Manage Email Template</a> <span class="divider">/</span></li>
		  <li>Update Email Templates</li>
        </ul>
      </div>
      
           <div class="row-fluid sortable"> 
        <!--[sortable header start]-->
        <div class="box span12">
          <div class="box-header well">
            <h2><i class=""></i>Update Email Template</h2>
              <div class="box-icon">
              <a title="Manage Email Template" class="btn btn-plus btn-round" href="<?php echo HTTP_ADMIN;?>email-template/list.php"><i class="icon-arrow-left"></i></a>
            </div>
          </div>
          <br >
          <!--[sortable body]-->
          <div class="box-content">
            <FORM name="frmEmailTemplate" id="frmEmailTemplate" action="<?php echo HTTP_ADMIN;?>email-template/edit-email-template.php" method="POST" >
                <div class="control-group">
                    <label class="control-label" for="title">Email Template Title <sup style="color: red;">*</sup></label>
                  <div class="controls">
                      <input type="text" dir="ltr" disabled="disabled" style="margin-left:200px; margin-top:-28px" class="FETextInput" name="inputTitle" value="<?php echo ucwords(str_replace("-"," ",$arr_email_template_details['email_template_title'])); ?>" id="inputTitle" size="100"   />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="subject">Email Template Subject <sup style="color: red;">*</sup></label>
                  <div class="controls">
                      <input type="text" dir="ltr" style="margin-left:200px; margin-top:-28px" class="FETextInput" name="inputSubject" value="<?php echo $arr_email_template_details['email_template_subject']; ?>" id="inputSubject" size="1000"   />
                          
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="content">Email Template Content </label>
                  <div class="controls">
                      <textarea dir="ltr" class="ckeditor"  style="width:100%;" class="FETextInput" name="textContent" id="textContent" ><?php echo ($arr_email_template_details['email_template_content']); ?></textarea>
                  </div>
                </div>
                  <div class="control-group">
                  <label class="control-label" for="content">Email Template Content </label>
                  <div class="controls">
                        <select style="width:100%;"  class="combobox"  multiple ondblclick="insertText(this)" style="min-height:80px;">
						
							<option value="||ADMIN_NAME||">Admin Name ||ADMIN_NAME||</option>
							<option value="||SITE_TITLE||">Site Title ||SITE_TITLE||</option>
							<option value="||USER_NAME||">User Name ||USER_NAME||</option>
							<option value="||PASSWORD||">Password ||PASSWORD||</option>
							<option value="||ADMIN_LOGIN_LINK||">Admin Login Link ||ADMIN_LOGIN_LINK||</option>
							<option value="||ADMIN_ACTIVATION_LINK||">Admin Activation Link ||ADMIN_ACTIVATION_LINK||</option>
							<option value="||SITE_PATH||">Site Path ||SITE_PATH||</option>
  
                    	</select>
                     </div>
                </div>  
              
                <div class="form-actions">
                  <button type="submit" name="btn_submit" class="btn btn-primary" value="Save changes">Save changes</button>
                  <input type="hidden" name="edit_id" value="<?php echo $_GET['edit_id']; ?>">
                </div>
              </FORM>
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
<style>
    .error{
    color: #BD4247;
    margin-left: 202px;
    width: 400px;
}
    </style>