<?php
require_once("../../pi-classes/global-functions.php");
#Check User Login Session user_id:
isAdminLogin();
require_once("../../pi-classes/cls-admin.php");
include_once("../../pi-classes/cls-common.php");
if($_POST['btn_submit']!="")
{	
	  $obj_admin=new Admin();
	  $activation_code=time();
	  $arr_to_insert=array(
			"user_name"=>mysql_real_escape_string($_POST['user_name']),    
			"first_name"=>mysql_real_escape_string($_POST['first_name']),
			"user_email"=>mysql_real_escape_string($_POST['user_email']),
			"user_password"=> base64_encode($_POST['user_password']), 
			'sex'=>$_POST['sex'],
			'user_type'=>2,
			'user_status'=>0,
			'activation_code'=>$activation_code,
			'email_verified'=>0,
			'role_id'=>$_POST['role_id'],
			'register_date'=>date("Y-m-d H:i:s")
		);		
		#inserting admin details
		$last_insert_id=$obj_admin->insertAdminDetails($arr_to_insert);
		#inserting priviges for amdin
		foreach($_POST['admin_privileges'] as $privilege)
		{
			$privilege_to_insert=array("admin_id"=>$last_insert_id,"privileges_id"=>$privilege);
			$obj_admin->insertAdminPrivilege($privilege_to_insert);			
		}
		$obj_email_tmp = new Common();
		$lang_id = 17; 
		$activation_link='<a href="'.HTTP_ADMIN.'admin-activation/'.$activation_code.'">Activate Account</a>';
		$var_array = array
			("||SITE_TITLE||" => SITE_TITLE,
			"||SITE_PATH||" => SITE_PATH,
			"||USER_NAME||" => $_POST['user_name'],
			"||ADMIN_NAME||" => $_POST['first_name'],
			"||ADMIN_EMAIL||" => $_POST['user_email'],
			"||PASSWORD||" => $_POST['user_password'],
			"||ADMIN_ACTIVATION_LINK||" => $activation_link
			);
		$template_title = 'admin-added';
		$mail = $obj_email_tmp->commonEmail($_POST['user_email'], $var_array, $template_title, $lang_id, $debug = 0);
	   
	$_SESSION['msg']="<span class='success'>Admin added successfully!</span>";	
	header("location:".HTTP_ADMIN."admin/list.php");
}
else
{
	header("location:".HTTP_ADMIN."login");
}

	



?>