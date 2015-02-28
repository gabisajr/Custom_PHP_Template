<?php
require_once("../pi-classes/global-functions.php");
require_once("../pi-classes/cls-categories.php");

$obj_categories=new Categories();

$condition="`url`='".mysql_real_escape_string($_REQUEST['inputPageUrl'])."' and type='".mysql_real_escape_string($_REQUEST['type'])."'";

if($_REQUEST['edit_id']!="")
{
	$condition.=" and rel_id !='".$_REQUEST['edit_id']."'";
}
$found_rows=$obj_categories->validatePageURL($condition);

if($found_rows>0)
{
	echo "false";
}
else echo "true";
?>