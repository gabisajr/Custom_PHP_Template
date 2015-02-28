<?php
#Require File: 
require_once("../../pi-classes/global-functions.php");
#Check Admin Login Or Not:
if(!empty($_SESSION['user_account']['user_id'])){
    header("Location:".HTTP_ADMIN."dashboard");exit;
}
// messages handelling
if(isset($_SESSION['msg']) && $_SESSION['msg']!="")
{
	$msg=$_SESSION['msg'];
	unset($_SESSION['msg']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo SITE_TITLE;?>-Admin Login</title>
<?php include('../sections/header.php'); ?>
<style>
.error {
    color: #BD4247;
    margin-left: 35px;
    text-align: left;
    width: 150px;
}
.alert{
	padding:8px 0px;
}
</style>
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/bootstrap-tab.js"></script>
<!-- library for advanced tooltip -->
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/bootstrap-tooltip.js"></script>
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/charisma.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN; ?>admin-media/js/jquery.validate.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN; ?>admin-media/js/login/admin-login.js"></script>
</head>
<body>

<div class="row-fluid">
    <div class="span12 center login-header">
        <h2>Welcome to Administrator</h2>
    </div><!--/span-->
</div><!--/row-->

<div class="row-fluid">
    <div class="well span5 center login-box">
        <div class="alert alert-info">
            Login with your Username and Password.
        </div>
        <!-- [start : admin interface message] -->
        <!--[message box]-->
       <?php
			if(is_array($msg))
			{
				isAdminLogin();
			}else{
				 if ($msg != '') {
					echo $msg; 
					 
				} 
			}
		?>     
        <!-- [end  : admin interface message] -->
        <form name="frm_admin_login" id="frm_admin_login" class="form-horizontal" action="<?php echo HTTP_ADMIN;?>login-action" method="post">
            <fieldset>
                <div class="input-prepend" title="Username" data-rel="tooltip">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input autofocus class="input-large span10" type="text" name="user_name" size="" id="user_name" value="" placeholder="Username" >                    
                </div>
                <div class="clearfix"></div>

                <div class="input-prepend" title="Password" data-rel="tooltip">
                    <span class="add-on"><i class="icon-lock"></i></span>                    
                    <input autofocus class="input-large span10" type="password" name="user_password" id="user_password" value="" placeholder="Password" >                    
                </div>
                <div class="clearfix"></div>

                <!--                 <div class="input-prepend">
                                <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
                                </div> -->
                <div class="clearfix"></div>
                <div class="clearfix"></div>
                <div class="input-prepend">
                    Forgot Password? <a href="<?php echo HTTP_ADMIN; ?>forgot-password">click here</a>                    
                </div>

                <div class="clearfix"></div>

                <p class="center span5">
                    <input type="submit" class="btn btn-primary" value="Login">
                </p>
            </fieldset>
        </form>
    </div><!--/span-->
</div><!--/row-->


