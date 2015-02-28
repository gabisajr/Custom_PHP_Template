<?php
require_once("../../pi-classes/global-functions.php");
require_once("../../pi-classes/cls-admin.php");
$obj_admin=new Admin();

if(isset($_POST['type']))
{
	#checking admin email already exist or not for edit.php
	if($_POST['user_email']==$_POST['old_email'])
	{
		echo "true";
	}
	else
	{
		$condition_to_pass=" user_email='".mysql_real_escape_string($_POST['user_email'])."'";
		$arr_admin_detail=$obj_admin->getAdminDetails('*',$condition_to_pass,'','',0);
		if(count($arr_admin_detail)==0)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
	}
}
else
{
	#checking admin email already exist or not for add.php
	$condition_to_pass=" user_email='".mysql_real_escape_string($_POST['user_email'])."'";
	$arr_admin_detail=$obj_admin->getAdminDetails('*',$condition_to_pass,'','',0);
	if(count($arr_admin_detail)==0)
	{
		echo "true";
	}
	else
	{
		echo "false";
	}
}
?>