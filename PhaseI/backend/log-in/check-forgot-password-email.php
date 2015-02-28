<?php
require_once("../../pi-classes/global-functions.php");
require_once("../../pi-classes/cls-admin.php");
$obj_admin=new Admin();
#checking email is exist or not for forgot password email entry
$condition_to_pass=" user_email='".$_POST['user_email']."'";
$arr_admin_detail=$obj_admin->getAdminDetails('*',$condition_to_pass);
if(count($arr_admin_detail)==0)
{
	echo "false";
}
else
{
	echo "true";
}

?>