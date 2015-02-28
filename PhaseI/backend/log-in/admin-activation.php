<?php
include_once("../../pi-classes/global-functions.php");
include_once("../../pi-classes/cls-admin.php");
//Create object of Registration cass for user registration
$obj_pass_recovedry = new Admin();
$fields_to_pass=array('user_id','first_name','last_name','user_name','user_email','user_type','email_verified','user_status');
$condition_to_pass="`activation_code`='".$_REQUEST['activation_code']."'";
// get user details to verify the email address
$arr_login_data=$obj_pass_recovedry->getAdminDetails($fields_to_pass,$condition_to_pass,$order_by_to_pass='',$limit_to_pass='',$debug_to_pass = 0);
if(count($arr_login_data)){
   if($arr_login_data[0]['email_verified']==1){
       $_SESSION['msg']='<div class="alert alert-success">You have already activated your account. Please login.</div>';
   }else{
       $arr_fields=array('email_verified'=>1,'user_status'=>1);
       $conditional_string="activation_code='".$_REQUEST['activation_code']."'";
       $obj_pass_recovedry->updateAdminDetails($arr_fields, $conditional_string,$debug=0);
       $_SESSION['msg']='<div class="alert alert-success"><strong>Congratulations!</strong> Your account has been activated successfully. Please login.</div>'; 
   }
}
else{
	$_SESSION['msg']='<div class="alert alert-error">Invalid activation code.</div>'; 
}
header("location:".HTTP_ADMIN."login")
?>