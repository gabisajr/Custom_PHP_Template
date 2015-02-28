<?php
require_once("../../pi-classes/global-functions.php");
#Check Admin Login Session admin_id:
isAdminLogin();
require_once("../../pi-classes/cls-admin.php");
require_once("../../pi-classes/cls-role.php");
#get list of admin previliges
$obj_role=new Role();
$arr_roles=array();
$arr_roles=$obj_role->getRole();
?><!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo SITE_TITLE;?>-Admin Panel</title>
<?php include('../sections/header.php'); ?>
<style>
.error {
    color: #BD4247;
    margin-left: 120px;
    width: 210px;
}
.FETextInput{
    margin-left: 120px;
    margin-top: -28px;
}
</style>
	        
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN;?>admin-media/js/jquery.validate.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN;?>admin-media/js/admin-manage/add-admin.js"></script>
<link rel="stylesheet" href="<?php echo SITE_PATH; ?>front-media/css/jquery.validate.password.css" />
<script src="<?php echo SITE_PATH; ?>front-media/js/jquery.validate.password.js"></script>
</head>
<body>
<?php include('../sections/top-nav.php'); ?>
<?php include('../sections/leftmenu.php'); ?>
      <div id="content" class="span10">
      <!--[breadcrumb]-->
      <div>
        <ul class="breadcrumb">
          <li> <a href="<?php echo HTTP_ADMIN;?>dashboard">Dashboard</a> <span class="divider">/</span> </li>
          <li> <a href="<?php echo HTTP_ADMIN; ?>admin/list.php">Manage Admin</a> <span class="divider">/</span></li>
          <li> Add Admin User </li>
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
            <h2><i class=""></i>Add Admin User</h2>
              <div class="box-icon">
	              <a title="Manage Admin" class="btn btn-plus btn-round" href="<?php echo HTTP_ADMIN;?>admin-list"><i class="icon-arrow-left"></i></a>
            </div>
          </div>
          <br >
          <!--[sortable body]-->
          <div class="box-content">
            <form name="frm_admin_details" id="frm_admin_details" action="<?php echo HTTP_ADMIN;?>add-admin-action" method="POST" >
			<input type="hidden" name="HTTP_ADMIN" id="HTTP_ADMIN" value="<?php echo HTTP_ADMIN;?>" />
                    <div class="control-group">
                        <label for="typeahead" class="control-label">Username<sup class="mandatory">*</sup> </label>
                        <div class="controls">
                            <input type="text" value="" id="user_name" name="user_name" class="FETextInput">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="typeahead" class="control-label">Full Name<sup class="mandatory">*</sup> </label>
                        <div class="controls">
                            <input type="text" value="" name="first_name" id="first_name" class="FETextInput">
                        </div>
                    </div>
                    <!--<div class="control-group">
                        <label for="typeahead" class="control-label">Last Name<sup class="mandatory">*</sup> </label>
                        <div class="controls">
                            <input type="text" value="" name="last_name" id="last_name" class="FETextInput">
                        </div>
                    </div>-->
                
                    <div class="control-group">
                        <label for="typeahead" class="control-label">Email Id<sup class="mandatory">*</sup> </label>
                        <div class="controls">
                            <input type="text" value="" name="user_email" id="user_email" class="FETextInput">
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="typeahead" class="control-label">Password<sup class="mandatory">*</sup> </label>
                        <div class="controls">
                            <input type="password" id="user_password" name="user_password" class="FETextInput">
							
								<div style="padding-left: 120px;">
									<div class="password-meter">
										<div class="password-meter-message password-meter-message-too-short">Too short</div>
										<div class="password-meter-bg">
											<div class="password-meter-bar password-meter-too-short"></div>
										</div>
									</div>
									<span>
										(Password must be combination of atleast 1 number, 1 special character and 1 upper case letter with minimum 8 characters) 
									</span>
								</div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="typeahead" class="control-label">Confirm Password<sup class="mandatory">*</sup> </label>
                        <div class="controls">
                            <input type="password" id="confirm_password" name="confirm_password" class="FETextInput">
                        </div>
                    </div>
					
					<div class="control-group">
                        <label for="typeahead" class="control-label">Sex<sup class="mandatory">*</sup> </label>
                        <div class="controls" style="margin-top:-25px;margin-left:120px;">
                          <span ><input id="sex" type="radio" value="1" checked="" name="sex" >Male
							<input id="sex" type="radio" value="2" name="sex">Female</span>
                        </div>
                    </div>
					
					<div class="control-group">
                        <label for="typeahead" class="control-label">Choose Admin <br> Role<sup class="mandatory">*</sup> </label>
						
                        <div class="controls">
							<select id="role_id" name="role_id" class="FETextInput" style="margin-top:-50px;">
								<option value="">Select Role</option>
							<?php foreach($arr_roles as $key=>$role)
							{
								if($role['role_id']!=1)
								{
								?>
									<option value="<?php echo $role['role_id'];?>"><?php echo $role['role_name'];?></option>
							<?php 
								}
							}
							?>
							 </select>
                        </div>
						
						<div id="pre_div">
						
						</div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="btn_submit" class="btn btn-primary" value="Save changes">Save changes</button>
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