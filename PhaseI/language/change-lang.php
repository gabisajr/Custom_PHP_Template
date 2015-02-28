<?php

/*
#Require File:
*/
require_once(dirname(__FILE__).'/../pi-classes/global-functions.php');


/*
# Get Variables:-
*/
$lang_key = $_GET['lang_key'];
$lang_id  = $_GET['lang_id'];   

if($lang_key=='ar')
{
			$_SESSION['module_cms']['lang_key'] = 'ar';
			$_SESSION['module_cms']['lang_id']  = '4';
}
else if($lang_key=='fr')
{
			$_SESSION['module_cms']['lang_key'] = 'fr';
			$_SESSION['module_cms']['lang_id']  = '22';
}
else
{
			$_SESSION['module_cms']['lang_key'] = 'en';
			$_SESSION['module_cms']['lang_id']  = '17';
}
?>
<script type="text/javascript" >
window.history.back(-1);
</script>