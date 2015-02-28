<?php
require_once("../../pi-classes/global-functions.php");

require_once("../../pi-classes/cls-role.php");
$obj_role=new Role();
if($_POST['type']=="edit")
{
	#checking role is already exist or not when role is editing
	if(strtolower($_POST['role_name'])==strtolower($_POST['old_role_name']))
	{
		echo "true";
	}
	else
	{
		$condition_to_pass=" role_name='".mysql_real_escape_string($_POST['role_name'])."'";
		$arr_role_detail=$obj_role->getRole('*',$condition_to_pass,'','',0);
		if(count($arr_role_detail)==0)
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
		#checking role is already exist or not when new role is adding
	$condition_to_pass=" role_name='".mysql_real_escape_string($_POST['role_name'])."'";
	$arr_role_detail=$obj_role->getRole('*',$condition_to_pass,'','',0);
	
	if(count($arr_role_detail)==0)
	{
		echo "true";
	}
	else
	{
		echo "false";
	}
}

?>