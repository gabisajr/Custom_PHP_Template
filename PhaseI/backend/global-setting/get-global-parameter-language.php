<?php
require_once("../../pi-classes/global-functions.php");

require_once("../../pi-classes/cls-global-settings.php");

if($_POST['lang_id']!="")
{
	#creating object of global setttings
	$obj_global_settings=new GlobalSettings();
	
	#getting the global settings using the language id and parameter id.
	$arr_language_values=$obj_global_settings->getGlobalSettings("mst_global.*,trans_global.*","trans_global.lang_id='".intval($_POST['lang_id'])."' and trans_global.global_name_id='".intval($_POST['edit_id'])."'");
	$arr_to_return=array();
	if(count($arr_language_values)>0)
	{
		$arr_to_return["value"]=stripslashes($arr_language_values[0]["value"]);
	}
	else
	{
		$arr_to_return["value"]="";
	}
	#encodeing the array into json formate 
	echo json_encode($arr_to_return);
}
?>