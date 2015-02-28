<?php
require_once("../../pi-classes/global-functions.php");
#Check User Login Session user_id:
isAdminLogin();
require_once("../../pi-classes/cls-admin.php");
#declaring obj
$obj_admin=new Admin();
// get admin details
$arr_admin_detail=array();
#getting admin details
$arr_admin_detail=$obj_admin->getAdminDetails("*","user_id='".intval($_SESSION['user_account']['user_id'])."'");
// single row fix
$arr_admin_detail=end($arr_admin_detail);
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

.controls-text {
    margin-left: 160px;
    margin-top: 6px;
}
.form-horizontal .control-label{
	font-weight:bold;
}
</style>  
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN;?>admin-media/js/jquery.validate.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN;?>admin-media/js/admin_manage/edit-admin.js"></script>
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
			  <?php
			  if($_SESSION['user_account']['role_id']==1)
			  {
				  ?>
				  <li> <a href="<?php echo HTTP_ADMIN; ?>admin/list.php">Manage Admin</a> <span class="divider">/</span></li>
				  <?php
			  }
			  ?>
          <li> My Profile </li>
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
            <h2><i class=""></i>My Profile</h2>
              <div class="box-icon">
	             <a title="Go Back" class="btn btn-plus btn-round" onClick="history.go(-1);" href="javascript:void(0);"><i class="icon-arrow-left"></i></a>
            </div>
          </div>
          <br >
          <!--[sortable body]-->
          <div class="box-content">
		  <form id="frm_admin_dtl" class="form-horizontal" name="frm_admin_dtl">
					<input type="hidden" name="HTTP_ADMIN" id="HTTP_ADMIN" value="<?php echo HTTP_ADMIN;?>" />
					<div class="control-group">
                        <label for="typeahead" class="control-label">User Name</label>
                        <div class="controls-text">
                            <?php echo $arr_admin_detail['user_name'];?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="typeahead" class="control-label">Full Name</label>
                        <div class="controls-text">
                            <?php echo $arr_admin_detail['first_name'];?>
                        </div>
                    </div>
                    <!--<div class="control-group">
                        <label for="typeahead" class="control-label">Last Name</label>
                        <div class="controls-text">
                            <?php echo $arr_admin_detail['last_name'];?>
                        </div>
                    </div>-->
                
                    <div class="control-group">
                        <label for="typeahead" class="control-label">Email Id </label>
                        <div class="controls-text">
									<?php echo $arr_admin_detail['user_email'];?>
                        </div>
                    </div>
					
				
					<div class="control-group">
						<label for="typeahead" class="control-label">Sex</label>
						<div class="controls-text">
							<?php if($arr_admin_detail['sex']==1)
							{ 
								echo "Male"; 
							}
							else if($arr_admin_detail['sex']==2)
							{
								echo "Female";
							}
							?>
						</div>
					</div>
					
					<div class="control-group">
						<label for="typeahead" class="control-label">Role</label>
						
						<div class="controls-text">
							<?php echo $arr_admin_detail['role_name'];?>
						</div>
					</div>
					
					<div class="control-group">
						<label for="typeahead" class="control-label">Register Date</label>
						
						<div class="controls-text">
							<?php echo date("Y-m-d",strtotime($arr_admin_detail['register_date'])); ?>
						</div>
					</div>
					
					<div class="form-actions">
						<button onClick="history.go(-1);" class="btn" id="btn_cancel" name="btn_cancel" type="button">Back</button>
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