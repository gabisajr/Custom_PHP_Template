<?php
require_once("../../pi-classes/global-functions.php");
#Check User Login Session user_id:
isAdminLogin();
require_once("../../pi-classes/cls-testimonial.php");
/* if btn_delete_all button is pressed*/ 
if(isset($_POST['btn_delete_all']))
{
	#getting all ides selected
	$arr_testimonial_ids=$_POST['checkbox'];	
	if(count($arr_testimonial_ids)>0)
	{
		$testimonial_ids=implode(",",$arr_testimonial_ids);
		$obj_testimonial=new Testimonial();
		$obj_testimonial->deleteTestimonial(" testimonial_id in (".$testimonial_ids.")");
		$_SESSION['msg']="<span class='success'>Testimonial deleted successfully!</span>";
	}
}
// messages handelling
if(isset($_SESSION['msg']) && $_SESSION['msg']!="")
{
	$msg=$_SESSION['msg'];
	unset($_SESSION['msg']);
}
$obj_testimonials=new Testimonial();
$arr_tetimonials=$obj_testimonials->getTestimonial("*","","updated_date desc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo SITE_TITLE;?>-Admin Panel</title>
<?php include('../sections/header.php'); ?>
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/bootstrap-tab.js"></script>
<!-- library for advanced tooltip -->
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/bootstrap-tooltip.js"></script>
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/charisma.js"></script> 
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/select-all-delete.js"></script> 
</head>
<body>
<?php include('../sections/top-nav.php'); ?>
<?php include('../sections/leftmenu.php'); ?>

      <div id="content" class="span10">
      <!--[breadcrumb]-->
      <div>
        <ul class="breadcrumb">
          <li> <a href="<?php echo HTTP_ADMIN;?>dashboard">Dashboard</a> <span class="divider">/</span> </li>
          <li> <!--<a href="<?php echo HTTP_ADMIN; ?>tetimonial/list.php">-->Manage Testimonial<!--</a>--> </li>
        </ul>
      </div>
      
      <!--[message box]-->
      	<?php
			if(is_array($msg))
			{
				isAdminLogin();
			}else{
				 if ($msg != '') { ?>
					<div class="msg_box alert alert-success">
						<button type="button" class="close" data-dismiss="alert" id="msg_close" name="msg_close">×</button>
						<?php echo $msg; ?> </div>
			<?php 
					} 
				}
			?> 
      <div class="row-fluid sortable">   
        <!--[sortable header start]-->
        <div class="box span12">
          <div class="box-header well">
            <h2><i class=""></i>Testimonial Management</h2>
              <div class="box-icon">
              <a title="Add new FAQ" class="btn btn-plus btn-round" href="<?php echo HTTP_ADMIN;?>add-testimonial"><i class="icon-plus"></i></a>
            </div>
          </div>
          <br >
		  <form name="frm_testimonial" id="frm_testimonial" action="<?php echo HTTP_ADMIN?>testimonial/list.php" method="post">
          <!--[sortable body]-->
          <div class="box-content">
            <table  class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
              <th width="7%" class="workcap">
			  <center>Select <br><input type="checkbox" name="check_all" id="check_all"  class="select_all_button_class" value="select all" /></center>
			  
              <!--Select<br><input type="checkbox" id="chkAll">-->
              </th>
					<th width="43%" class="workcap">Testimonial</th>
					<th width="15%" class="workcap">Name</th>
					<th width="10%" class="workcap">Status</th>
					<th width="10%" class="workcap">Added By</th>
					<th width="20%" class="workcap" align="center">Action</th>
                  </thead>
              <tbody>
                <?php
			
			foreach($arr_tetimonials as $tetimonials)
			{
				 $cnt++;							
			?>
                <tr>
                 <!-- <td class="worktd" align="left"><center><input value="<?php echo $tetimonials['testimonial_id']; ?>" class="chkselect" type="checkbox"></center></td>-->
				  <td class="worktd" align="left">
					<center><input name="checkbox[]" class="case" type="checkbox" id="checkbox[]" value="<?php echo $tetimonials['testimonial_id'];?>" /></center>
				  </td>
                  <td class="worktd"  align="left"><?php echo stripslashes($tetimonials['testimonial']); ?></td>
                  <td class="worktd"  align="left"><?php echo stripslashes($tetimonials['name']); ?></td>
				  <td class="worktd"  align="left">
				  	
					 <?php
						switch ($tetimonials['status']) {
							case 'Active':
								$class = 'label-success';
								$status=$row['status'];
								$status_to_change='Inactive';
								break;
							case 'Inactive':
								$class = 'label-warning';
								$status=$row['status'];
								$status_to_change='Active';
								break;
						}
						?>		
						 
							<div id="active_div<?php echo $tetimonials['testimonial_id'];?>" <?php if($tetimonials['status']=="Active"){?> style="display:inline-block" <?php }else { ?> style="display:none;" <?php }?>>
							  <a class="label label-success" title="Click to Change Status" onClick="changeStatus('<?php echo $tetimonials['testimonial_id'];?>','Inactive');" href="javascript:void(0);" id="status_<?php echo $tetimonials['testimonial_id'];?>">Active</a>
							 </div> 
					
							<div id="inactive_div<?php echo $tetimonials['testimonial_id'];?>" <?php if($tetimonials['status']=="Inactive"){?> style="display:inline-block" <?php }else { ?> style="display:none;" <?php }?>> 
							  <a class="label label-warning" title="Click to Change Status" onClick="changeStatus('<?php echo $tetimonials['testimonial_id'];?>','Active');" href="javascript:void(0);" id="status_<?php echo $tetimonials['testimonial_id'];?>">Inactive</a>
							</div> 
				  </td>
				  
                  <td class="worktd"  align="left"><?php echo $tetimonials['added_by']; ?></td>
				  
                  <td class="worktd">
				  
                  <a class="btn btn-info" href="<?php echo HTTP_ADMIN; ?>edit-testimonial/<?php echo $tetimonials['testimonial_id']; ?>">
<i class="icon-edit icon-white"></i>Edit</a> 
 </td>
                  <?php
			}
			?>
              </tbody>
              <tfoot>
              	<th colspan="6"><input type="submit" id="btn_delete_all" name="btn_delete_all" class="btn btn-danger" onClick="return deleteConfirm();"  value="Delete Selected"></th>
              </tfoot>
            </table>
          </div>
          <!--[sortable body]--> 
		  </form>
        </div>
      </div>
      
      <!--[sortable table end]--> 
      
      <!--[include footer]-->
      </div><!--/#content.span10-->

</div><!--/fluid-row-->
      <?php include('../sections/footer.php'); ?>
	  
</div><!--/.fluid-container-->
<script>

function changeStatus(testimonial_id,status)
{
	var obj_params=new Object();
	obj_params.testimonial_id=testimonial_id;
	obj_params.status=status;
	jQuery.post("<?php echo HTTP_ADMIN;?>testimonial-change-status",obj_params,function(msg){
		if(msg.error=="1")
		{
			alert(msg.error_message);
		}
		else
		{
			if(status=="Inactive")
			{
			$("#inactive_div"+testimonial_id).css('display','inline-block');
				$("#active_div"+testimonial_id).css('display','none');
				
			}
			else
			{
				$("#active_div"+testimonial_id).css('display','inline-block');
				$("#inactive_div"+testimonial_id).css('display','none');
			}
		}
		},"json");

}
</script>

</body>
</html>
