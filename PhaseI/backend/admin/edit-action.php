<?php
require_once("../../pi-classes/global-functions.php");
#Check User Login Session user_id:
isAdminLogin();
require_once("../../pi-classes/cls-admin.php");
include_once("../../pi-classes/cls-common.php");
$obj_admin=new Admin();
if($_POST['edit_id']!="")
{
		$arr_admin_detail=$obj_admin->getAdminDetails("*","user_id='".$_POST['edit_id']."'");
		// single row fix
		$arr_admin_detail=end($arr_admin_detail);
		#setting variable to update or add admin record.
		if($_POST['user_email']==$_POST['old_email'])
		{
			if($_POST['user_status']!="")
			{
				$status=$_POST['user_status'];
			}
			else
			{
				$status=1;
			}
			$email_verified=1;
			$activation_code=$arr_admin_detail['activation_code'];
		}
		else
		{
			$status=0;	
			$email_verified=0;
			$activation_code=time();
		}
	if($_POST['change_password']=='on')
	{
		$user_password=$_POST['user_password'];
		
		#if passwording need to change
     	$arr_to_update=array(
			"user_name"=>mysql_real_escape_string($_POST['user_name']),    
			"first_name"=>mysql_real_escape_string($_POST['first_name']),
			"user_email"=>mysql_real_escape_string($_POST['user_email']),
			"user_password"=> base64_encode($_POST['user_password']),
			"user_status"=>$status,
			'email_verified'=>$email_verified,
			'sex'=>$_POST['sex'],
			'activation_code'=>$activation_code,
			'role_id'=>$_POST['role_id'],
			
	 	 );	
	 }
	 else
	 {
	 	$user_password=base64_decode($arr_admin_detail['user_password']);
	 	#if passwording need not need to change
		$arr_to_update=array(
		"user_name"=>mysql_real_escape_string($_POST['user_name']),    
		"first_name"=>mysql_real_escape_string($_POST['first_name']),
		"user_email"=>mysql_real_escape_string($_POST['user_email']), 
		"user_status"=>$status,  
		'sex'=>$_POST['sex'],
		'email_verified'=>$email_verified,
		'activation_code'=>$activation_code,
		'role_id'=>$_POST['role_id']
		);	
	 }	
	 
	 
	 
	 	$obj_admin->updateAdminDetails($arr_to_update," user_id='".$_POST['edit_id']."'",0);
		$obj_email_tmp = new Common();
		if($_POST['user_email']==$_POST['old_email'])
		{
			#sending account updating mail to user
			$lang_id = 17; 
			$admin_login_link = '<a href="' . HTTP_ADMIN . 'login" target="_new">Log in to '.SITE_TITLE.' administration</a>';
			$var_array = array
				("||SITE_TITLE||" => SITE_TITLE,
				"||SITE_PATH||" => SITE_PATH,
				"||USER_NAME||" => $_POST['user_name'],
				"||ADMIN_NAME||" => $_POST['first_name'],
				"||ADMIN_EMAIL||" => $_POST['user_email'],
				"||PASSWORD||" => $user_password,
				"||ADMIN_LOGIN_LINK||" => $admin_login_link
			);
			$template_title = 'admin-updated';
			$mail = $obj_email_tmp->commonEmail($_POST['user_email'], $var_array, $template_title, $lang_id, $debug = 0);
		}
		else
		{
			#sending account verification link mail to user
			$lang_id = 17; 
			$activation_link='<a href="'.HTTP_ADMIN.'admin-activation/'.$activation_code.'">Activate Account</a>';
			$var_array = array
				("||SITE_TITLE||" => SITE_TITLE,
				"||SITE_PATH||" => SITE_PATH,
				"||USER_NAME||" => $_POST['user_name'],
				"||ADMIN_NAME||" => $_POST['first_name'],
				"||ADMIN_EMAIL||" => $_POST['user_email'],
				"||PASSWORD||" => $user_password,
				"||ADMIN_ACTIVATION_LINK||" => $activation_link
				);
			$template_title = 'admin-email-updated';
			$mail = $obj_email_tmp->commonEmail($_POST['user_email'], $var_array, $template_title, $lang_id, $debug = 0);			
		}
		$_SESSION['msg']="<span class='success'>Admin updated successfully!</span>";	
		header("location:".HTTP_ADMIN."admin/list.php");
}

?>