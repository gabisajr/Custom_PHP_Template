<?php
require_once("../../pi-classes/global-functions.php");
require_once("../../pi-classes/cls-testimonial.php");
if(isset($_POST['testimonial_id']))
{
	#changing status of testimonial
	$obj_testimonial=new Testimonial();
	$arr_to_update=array(
			"status"=>$_POST['status']
		);
		$where_field="`testimonial_id`='".intval($_POST['testimonial_id'])."'";
		$obj_testimonial->updateTestimonial($arr_to_update, $where_field);
	echo json_encode(array("error"=>"0","error_message"=>""));
}
else
{
		#if something going wrong providing error message
	echo json_encode(array("error"=>"1","error_message"=>"Sorry, your request can not be fulfilled this time. Please try again later"));
}
?>