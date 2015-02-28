<?php
require_once("../pi-classes/global-functions.php");
if($_FILES["imageName"]['name']!="")
{
	$file_destination="admin-media/userfiles/".str_replace(" ","_",microtime()).".".strtolower(end(explode(".",$_FILES["imageName"]['name'])));
	move_uploaded_file($_FILES['imageName']['tmp_name'],$file_destination);
	?>
	<div id="image"><?php echo HTTP_ADMIN.$file_destination; ?></div>
	<?php
}
else
echo "false";
?>