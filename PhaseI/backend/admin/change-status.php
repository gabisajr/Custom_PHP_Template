<?php
require_once("../../pi-classes/global-functions.php");
require_once("../../pi-classes/cls-admin.php");
if(isset($_POST['user_id']))
{
	#changing the user status.
    $obj_admin=new Admin();
    $arr_to_update=array(
            "user_status"=>$_POST['user_status']
    );
    $where_field="`user_id`='".intval($_POST['user_id'])."'";
    $obj_admin->updateAdminDetails($arr_to_update, $where_field);
    echo json_encode(array("error"=>"0","error_message"=>""));
}
else
{
	#if something going wrong providing error message. 
    echo json_encode(array("error"=>"1","error_message"=>"Sorry, your request can not be fulfilled this time. Please try again later"));
}
?>