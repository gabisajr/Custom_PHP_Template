<?php
require_once("../../pi-classes/global-functions.php");
#Check User Login Session user_id:
isAdminLogin();
require_once("../../pi-classes/cls-testimonial.php");
if($_POST['btn_submit']!="")
{
	$obj_testimonial=new Testimonial();
	if($_POST['edit_id']!='')
	{		
		$arr_to_update=array(
			"testimonial"=>mysql_real_escape_string($_POST['inputTestimonial']),
			"name"=>mysql_real_escape_string($_POST['inputName']),
			"updated_date"=>date("Y-m-d H:i:s")
		);
		$where_field="`testimonial_id`='".intval($_POST['edit_id'])."'";
		$obj_testimonial->updateTestimonial($arr_to_update, $where_field);
		$_SESSION['msg']="<span class='success'>Testimonial updated successfully!</span>";	
	}
	else{
		$arr_to_insert=array(
			"added_by"=>'Admin',
			"user_id"=>'0',/* replace this by admin id */
			"status"=>'Active',
			"testimonial"=>mysql_real_escape_string($_POST['inputTestimonial']),
			"name"=>mysql_real_escape_string($_POST['inputName']),
			"added_date"=>date("Y-m-d H:i:s"),
			"updated_date"=>date("Y-m-d H:i:s")
		);				
		$obj_testimonial->insertTestimonial($arr_to_insert);
		$_SESSION['msg']="<span class='success'>Testimonial added successfully!</span>";	
	}

	header("location:".HTTP_ADMIN."testimonial/list.php");

}
// get list of Testimonial
$obj_testimonial=new Testimonial();
$arr_testimonial=array();
if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
{
	$arr_testimonial=$obj_testimonial->getTestimonial("*","testimonial_id='".intval($_GET['edit_id'])."'");
	// single row fix
	$arr_testimonial=end($arr_testimonial);
}

?><!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo SITE_TITLE;?>-Admin Panel</title>
<style>
.error {
    color: #BD4247;
    margin-left: 100px;
    width: 210px;
}
.FETextInput{
    margin-left: 120px;
    margin-top: -28px;
}
</style>
<?php include('../sections/header.php'); ?>
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN;?>admin-media/js/jquery.validate.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	jQuery("#frmTestimonials").validate({
		 errorElement:'label',
		 rules: {
			inputTestimonial:{
				required: true,
				minlength: 20
			},
			inputName:{
				required: true
			}
		},
		messages: {
			inputTestimonial:{
				required: "Please enter testimonial.",
				minlength: "Please enter at least 20 characters."
			},
			inputName:{
				required: "Please enter name."
			}
		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
		// set &nbsp; as text for IE
			label.hide();
		}
	});

});
</script>
</head>
<body>
<?php include('../sections/top-nav.php'); ?>
<?php include('../sections/leftmenu.php'); ?>
      <div id="content" class="span10">
      <!--[breadcrumb]-->
      <div>
        <ul class="breadcrumb">
          <li> <a href="<?php echo HTTP_ADMIN;?>dashboard">Dashboard</a> <span class="divider">/</span> </li>
          <li> <a href="<?php echo HTTP_ADMIN; ?>testimonial/list.php">Manage Testimonial</a> <span class="divider">/</span></li>
		  <li> <?php echo ((isset($_GET['edit_id']) && $_GET['edit_id']!="")?"Update":"Add");?> Testimonial </li>
        </ul>
      </div>
      
      <!--[message box]-->
      <?php if($msg != ''){?>
      <div class="msg_box alert alert-success">
        <button type="button" class="close" data-dismiss="alert" id="msg_close" name="msg_close">×</button>
        <?php echo $msg; ?> </div>
      <?php
		 }
	  ?>
      <div class="row-fluid sortable"> 
        <!--[sortable header start]-->
        <div class="box span12">
          <div class="box-header well">
            <h2><i class=""></i><?php echo ((isset($_GET['edit_id']) && $_GET['edit_id']!="")?"Update":"Add");?> Testimonial</h2>
              <div class="box-icon">
	              <a title="Manage Testimonial" class="btn btn-plus btn-round" href="<?php echo HTTP_ADMIN;?>testimonial-list"><i class="icon-arrow-left"></i></a>
            </div>
          </div>
          <br >
          <!--[sortable body]-->
          <div class="box-content">
            <form name="frmTestimonials" id="frmTestimonials" action="<?php echo HTTP_ADMIN;?>testimonial/add.php" method="POST" >
                <div class="control-group">
                  <label class="control-label" for="inputQuestion">Testimonial<sup class="mandatory">*</sup></label>
                  <div class="controls">
				  	<textarea  style="margin-left:100px; margin-top:-28px" class="FETextInput" name="inputTestimonial" size="80"><?php echo $arr_testimonial['testimonial']; ?></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputAnswer">Name<sup class="mandatory">*</sup></label>
                  <div class="controls">
							<input type="text" dir="ltr" style="margin-left:100px; margin-top:-28px" class="FETextInput" name="inputName" value="<?php echo $arr_testimonial['name']; ?>" size="80"   />
                  </div>
                </div>
                <div class="form-actions">
                  <button type="submit" name="btn_submit" class="btn btn-primary" value="Save changes">Save changes</button>
                  <input type="hidden" name="edit_id" value="<?php echo $_GET['edit_id']; ?>">
                </div>
              </FORM>
          </div>
          <!--[sortable body]--> 
        </div>
      </div>
      
      <!--[sortable table end]--> 
      
      <!--[include footer]-->
      </div><!--/#content.span10-->

</div><!--/fluid-row-->
      <?php include('../sections/footer.php'); ?>
</div>
</body>
</html>