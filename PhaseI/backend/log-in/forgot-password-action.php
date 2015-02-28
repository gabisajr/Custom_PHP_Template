<?php
#Requires Files:
require_once("../../pi-classes/global-functions.php");
require_once("../../pi-classes/cls-admin.php");
include_once("../../pi-classes/cls-common.php");
#objects:
$obj_admin=new Admin();

if (!empty($_POST) && $_POST['btn_submit'] == 'Submit'){
#getting admin details if exist from email
$arr_admin_detail=$obj_admin->getAdminDetails("*","user_email='".$_POST['user_email']."'");
$arr_admin_detail=end($arr_admin_detail);

if(count($arr_admin_detail)>0)
{
	#sending admin credentail on admin account mail on user email
	$obj_email_tmp = new Common();
	$lang_id = 17; 
	$admin_login_link = '<a href="' . HTTP_ADMIN . 'login" target="_new">Log in to '.SITE_TITLE.' administration</a>';
	$var_array = array(
		"||SITE_TITLE||" => SITE_TITLE,
		"||SITE_PATH||" => SITE_PATH,
		"||USER_NAME||" => $arr_admin_detail['user_name'],
		"||ADMIN_NAME||" => $arr_admin_detail['first_name'] . ' ' . $arr_admin_detail['last_name'],
		"||ADMIN_EMAIL||" => $arr_admin_detail['user_email'],
		"||PASSWORD||" => base64_decode($arr_admin_detail['user_password']),
		"||ADMIN_LOGIN_LINK||" => $admin_login_link
	);
	$template_title = 'admin-forgot-password';
	$mail = $obj_email_tmp->commonEmail($arr_admin_detail['user_email'], $var_array, $template_title, $lang_id, $debug = 0);
	if($mail)
	{
		$_SESSION['msg']='<div class="alert alert-success">Your login details has been sent successfully.</div>';				
		header("location:login"); exit;
	}
	else
	{
		$_SESSION['msg'] = '<div class="alert alert-error">Error occurred during sending mail, please try latter.</div>';
        header('location:forgot-password');exit;	
	}

}
else
{
	$_SESSION['msg'] = '<div class="alert alert-error">Your email is not registered with us.</div>';
	header('location:forgot-password');
	exit;
}
	
}//main if
?>
