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
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/bootstrap-tab.js"></script>
<!-- library for advanced tooltip -->
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/bootstrap-tooltip.js"></script>
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/charisma.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN; ?>admin-media/js/jquery.validate.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN; ?>admin-media/js/login/forgot-password.js"></script>
<style>
.error {
    color: #BD4247;
    margin-left: 35px;
    text-align: left;
    width: 230px;
}
.login-box .btn{
	width:35%;
}
</style>
</head>
<body>

<div class="row-fluid">
    <div class="span12 center login-header">
         <h2>Forgot Password</h2>
    </div><!--/span-->
</div><!--/row-->

<div class="row-fluid">
    <div class="well span5 center login-box">
        <div class="alert alert-info">
            Enter your registered email address.
        </div>
        <!-- [start : admin interface message] -->
        <!--[message box]-->
       <?php 
	  		if($msg != ''){ echo $msg; }
		?>      
        <!-- [end  : admin interface message] -->
        <form name="frm_admin_forgot_password" id="frm_admin_forgot_password" class="form-horizontal" action="<?php echo HTTP_ADMIN ?>forgot-password-action" method="post">
		<input type="hidden" name="HTTP_ADMIN" id="HTTP_ADMIN" value="<?php echo HTTP_ADMIN;?>" />
            <fieldset>
                <div class="input-prepend" title="Email" data-rel="tooltip">
                    <span class="add-on">@</span>
                   	<input autofocus class="input-large span10" type="text" name="user_email" size="" id="user_email" value="" placeholder="Email">                             
                </div>
                <div class="clearfix"></div>
                <div class="clearfix"></div>               
                <div class="clearfix"></div>
                <div class="clearfix"></div>				
                <p class="center span5">                    
                    <button type="button" name="btn_back" value="btn_back"  class="btn btn-primary" onClick="javascript:window.location='<?php echo HTTP_ADMIN ?>login';" style="width: 65px;">Back</button>      
					<button type="submit" name="btn_submit" class="btn btn-primary" value="Submit">Submit</button>             
                </p>
                <div class="clearfix"></div>
            </fieldset>
        </form>
    </div><!--/span-->
</div><!--/row-->


