<?php
/*
*  File: global-functions.php
*  Author: Somnath A Gunjal
*  Purpose: To define global functions duly accessed in entire front end pages
*  Organization: Panacea Infotech Pvt. Ltd.
*/
/*
*  
*  Will define session at the start of page. No need to define on other pages
*
*/
session_start();
/*
*  Will control error debugging.
*
*/
error_reporting(1);
ini_set("display_errors","on");
/*
* Define global constants required in front end
*/
$absolute_path=realpath(dirname((__FILE__)).'/..');
define("HTTP_PATH","http://".$_SERVER["HTTP_HOST"]."/p794/PhaseI/");
define("HTTP_ABS_PATH","/var/www/p794/PhaseI/");
define("HTTP_ADMIN","http://".$_SERVER["HTTP_HOST"]."/p794/PhaseI/backend/");
define("SITE_PATH",HTTP_PATH);
define("SITE_ABS_PATH",HTTP_ABS_PATH);
define("ABSOLUTE_PATH",$absolute_path."/");
define("SITE_TITLE","SMARTMEALPLAN");
#Check Admin Log in:
function isAdminLogin()
{

	if($_SESSION['user_account']['user_type']== 1){
	
		header("location:".SITE_PATH);exit;
	}
	if(empty($_SESSION['user_account']['user_id']))
	{		
		unset($_SESSION['msg']);
		header("location:".HTTP_ADMIN."login");exit;
	}
}



/*
# Set Session Default Language Id :-
*/
$_SESSION['module_cms']['lang_id'] = (!empty($_SESSION['module_cms']['lang_id']))? $_SESSION['module_cms']['lang_id'] :  17 ;
define("LANG_ID",$_SESSION['module_cms']['lang_id']);
$_SESSION['module_cms']['lang_key'] = (!empty($_SESSION['module_cms']['lang_key']))? $_SESSION['module_cms']['lang_key'] :  'en' ;
define("LANG_KEY",$_SESSION['module_cms']['lang_key']);


/*
# Unset Admin Interface Message Flag:-
*/
 define("USER_MSG",(($_SESSION['USER_MSG'])? $_SESSION['USER_MSG'] : ""));
 unset($_SESSION['USER_MSG']);
 
/*
# Unset Admin Interface Message Flag:-
*/
 define("ADMIN_MSG",(($_SESSION['ADMIN_MSG'])? $_SESSION['ADMIN_MSG'] : ""));
 unset($_SESSION['ADMIN_MSG']);
	 	

?>