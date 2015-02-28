
<?php
require_once("../../pi-classes/global-functions.php");
#Check User Login Session user_id:
isAdminLogin();
require_once("../../pi-classes/cls-admin.php");
require_once("../../pi-classes/cls-role.php");
#declaring obj
$obj_admin=new Admin();
$obj_role=new Role();
// get admin details
$arr_admin_detail=array();
if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
{
	#getting admin details
	$arr_admin_detail=$obj_admin->getAdminDetails("*","user_id='".intval(base64_decode($_GET['edit_id']))."'");
	// single row fix
	$arr_admin_detail=end($arr_admin_detail);
}

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
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN;?>admin-media/js/admin-manage/edit-admin.js"></script>
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
          <li> Edit Admin User </li>
        </ul>
      </div>
      <!--[message box]-->
      <?php
			if(is_array($msg))
			{
				isAdminLogin();
			}else{
				 if ($msg != '') { ?>
					<div class="msg_box alert alert-success">
						<button type="button" class="close" data-dismiss="alert" id="msg_close" name="msg_close">×</button>
						<?php echo $msg; ?> </div>
				<?php 
						} 
					}
				?>
      <div class="row-fluid sortable"> 
        <!--[sortable header start]-->
        <div class="box span12">
          <div class="box-header well">
            <h2><i class=""></i>Edit Admin User</h2>
              <div class="box-icon">
	             <a title="Manage Admin" class="btn btn-plus btn-round" href="<?php echo HTTP_ADMIN;?>admin-list"><i class="icon-arrow-left"></i></a>
            </div>
          </div>
          <br >
          <!--[sortable body]-->
          <div class="box-content">
            <form name="frm_admin_details" id="frm_admin_details" action="<?php echo HTTP_ADMIN;?>edit-admin-action" method="POST">
					<input type="hidden" name="HTTP_ADMIN" id="HTTP_ADMIN" value="<?php echo HTTP_ADMIN;?>" />
					<div class="control-group">
                        <label for="typeahead" class="control-label">User Name<sup class="mandatory">*</sup> </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $arr_admin_detail['user_name'];?>" id="user_name" name="user_name" class="FETextInput">
                            <input type="hidden" value="<?php echo $arr_admin_detail['user_name'];?>" id="old_username" name="old_username">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="typeahead" class="control-label">Full Name<sup class="mandatory">*</sup> </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $arr_admin_detail['first_name'];?>" name="first_name" id="first_name" class="FETextInput">
                        </div>
                    </div>
                   <!-- <div class="control-group">
                        <label for="typeahead" class="control-label">Last Name<sup class="mandatory">*</sup> </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $arr_admin_detail['last_name'];?>" name="last_name" id="last_name" class="FETextInput">
                        </div>
                    </div>-->
                
                    <div class="control-group">
                        <label for="typeahead" class="control-label">Email Id<sup class="mandatory">*</sup> </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $arr_admin_detail['user_email'];?>" name="user_email" id="user_email" class="FETextInput">
                            <input type="hidden" value="<?php echo $arr_admin_detail['user_email'];?>" name="old_email" id="old_email" class="FETextInput">								
                        </div>
                    </div>
					
					 <div class="control-group">
                        <label for="typeahead" class="control-label" style="display:inline-block;width: 12%;">Change Password</label>
                        <div class="controls"  style="display:inline">
                            <input type="checkbox" name="change_password" id="change_password">
                        </div>
                    </div>
					
					<div id="change_password_div" style="display:none;">
						<div class="control-group">
							<label for="typeahead" class="control-label">New Password<sup class="mandatory">*</sup> </label>
							<div class="controls">
								<input type="password" id="user_password" name="user_password" class="FETextInput">
							</div>
							
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
	
						<div class="control-group">
							<label for="typeahead" class="control-label">Confirm Password<sup class="mandatory">*</sup> </label>
							<div class="controls">
								<input type="password" id="confirm_password" name="confirm_password" class="FETextInput">
							</div>
						</div>
					
					</div>	 
						<div class="control-group">
							<label for="typeahead" class="control-label">Sex<sup class="mandatory">*</sup> </label>
							<div class="controls" style="margin-top:-25px;margin-left:120px;">
								<!--<input type="password" id="confirm_password" name="confirm_password" class="FETextInput">-->
								<span ><input id="sex" type="radio" value="1" name="sex" <?php if($arr_admin_detail['sex']==1){?> checked="checked"<?php }?>>Male
								<input id="sex" type="radio" value="2" name="sex" <?php if($arr_admin_detail['sex']==2){?> checked="checked"<?php }?>>Female</span>
							</div>
						</div>
						<?php
						if($arr_admin_detail['role_id']!=1)
						{
						?>
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
									<option value="<?php echo $role['role_id'];?>" <?php if($arr_admin_detail['role_id']==$role['role_id']){?> selected="selected"<?php }?>><?php echo $role['role_name'];?></option>
									<?php 
									}
								}
								?>
								 </select>
							</div>
							
						</div>
						<?php
						}
						else
						{
						?>
							<input type="hidden" name="role_id" id="role_id" value="1" />
						<?php
						}
						?>
						
						<?php
						if($arr_admin_detail['role_id']!=1)
						{
						?>
						<div class="control-group">
							<label for="typeahead" class="control-label">Change Status</label>
							<div class="controls">
								<select id="user_status" name="user_status" class="FETextInput" style="margin-top:-50px;">
								<?php if($arr_admin_detail['user_status']==0)
								{
								?>
									<option value="">Select Status</option>
								<?php
								}
								?>
									<option value="1" <?php if($arr_admin_detail['user_status']==1){?> selected="selected" <?php }?>>Active</option>
									<option value="2" <?php if($arr_admin_detail['user_status']==2){?> selected="selected" <?php }?>>Blocked</option>
								 </select>
							</div>
						</div>
						<?php
						}
						?>

                    <div class="form-actions">
                        <button type="submit" name="btn_submit" class="btn btn-primary" value="Save changes">Save Changes</button>
                       	<input type="hidden" name="edit_id" id="edit_id" value="<?php echo intval(base64_decode($_GET['edit_id']));?>" />
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