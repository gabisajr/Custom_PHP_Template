<?php
#Requires Files:
require_once("../../pi-classes/global-functions.php");
require_once("../../pi-classes/cls-admin.php");
#objects:
$obj_admin_details=new Admin();
#admin details with user_name only :
$arr_admin_details_with_username=$obj_admin_details->getAdminDetails("*","user_name='".$_POST['user_name']."'");

if(count($arr_admin_details_with_username)>0)
{
	#admin details with user_name and user_password :
	$arr_admin_details_username_password=$obj_admin_details->getAdminDetails("*","user_name='".$_POST['user_name']."' and user_password='".base64_encode($_POST['user_password'])."'");
	if(count($arr_admin_details_username_password)>0)
	{
		if($arr_admin_details_username_password[0]['user_status']==1)
		{
			#addding user data into the session
			$_SESSION['user_account']['user_id'] = $arr_admin_details_username_password[0]['user_id'];
			$_SESSION['user_account']['user_name'] = $arr_admin_details_username_password[0]['user_name'];
			$_SESSION['user_account']['user_email'] = $arr_admin_details_username_password[0]['user_email'];
			$_SESSION['user_account']['user_type'] = $arr_admin_details_username_password[0]['user_type'];
			$_SESSION['user_account']['role_id'] = $arr_admin_details_username_password[0]['role_id'];
			$_SESSION['user_account']['first_name'] = $arr_admin_details_username_password[0]['first_name'];
			$_SESSION['user_account']['last_name'] = $arr_admin_details_username_password[0]['last_name'];
			header("location:home"); exit;
		}else if($arr_admin_details_username_password[0]['user_status']==2){
			#user account is blocked by admin
			$_SESSION['msg']='<div class="alert alert-error"><strong>Sorry!</strong> Your account has been blocked by Administrator.</div>';				
			header("location:login"); exit;
		}
		else if($arr_admin_details_username_password[0]['user_status']==0){
			#user account is in inactive status 
			$_SESSION['msg']='<div class="alert alert-block">Please activate your account through link provided on your email address.</div>';				
			header("location:login"); exit;
		}
	}
	else
	{
		#alerting message for invalid password
		$_SESSION['msg']='<div class="alert alert-error"><strong>Sorry!</strong> Invalid username or password.</div>';	
		header("location:login");  exit;	
	}
}
else
{
	#alerting message for invalid usename
	$_SESSION['msg']='<div class="alert alert-error"><strong>Sorry!</strong> Invalid username or password.</div>';
	header("location:login");  exit;	
}
?>
