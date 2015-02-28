<?php
require_once("../../pi-classes/global-functions.php");
#Check Admin Login Session admin_id:
isAdminLogin();

require_once("../../pi-classes/cls-role.php");
require_once("../../pi-classes/cls-admin.php");

/* if btn_delete_all button is pressed*/ 
if(isset($_POST['btn_delete_all']))
{
	#getting all ides selected
	$arr_role_ids=$_POST['checkbox'];	
	if(count($arr_role_ids)>0)
	{
		$obj_role=new Role();
		$obj_admin=new Admin();
		$role_assigned=0;
		foreach($arr_role_ids as $key=>$role_id)
		{
			#checking Role is assigned or not for any user
			$arr_admin_detail=$obj_admin->getAdminDetails("*","u.role_id='".intval($role_id)."'",'','',0);	
			if(count($arr_admin_detail)>0)
			{
				$role_assigned=1;
				unset($arr_role_ids[$key]);
			}
		}
		if(count($arr_role_ids)>0)
		{
			$role_ids=implode(",",$arr_role_ids);			
			$obj_role->deleteRole(" role_id in (".$role_ids.")",0);			
		}
		#if role is assinned any one of the user then settting message.
		if($role_assigned)
		{
			$_SESSION['msg']="<span class='error'>One or more roles are not deleted as it is assigned to one or more user, to delete role it should not be assigned to any user!</span>";
		}
		else
		{
			$_SESSION['msg']="<span class='success'>Role deleted successfully!</span>";
		}	
	}
}
// messages handelling
if(isset($_SESSION['msg']) && $_SESSION['msg']!="")
{
	$msg=$_SESSION['msg'];
	unset($_SESSION['msg']);
}
$obj_roles=new Role();
$arr_roles=$obj_roles->getRole("*");
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
          <li> <!--<a href="<?php echo HTTP_ADMIN; ?>roles/list.php">-->Manage Roles<!--</a>--> </li>
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
            <h2><i class=""></i>Roles Management</h2>
              <div class="box-icon">
              <a title="Add new Role" class="btn btn-plus btn-round" href="<?php echo HTTP_ADMIN;?>add-role"><i class="icon-plus"></i></a>
            </div>
          </div>
          <br >
		  <form name="frm_roles" id="frm_roles" action="<?php echo HTTP_ADMIN?>role/list.php" method="post">
          <!--[sortable body]-->
          <div class="box-content">
            <table  class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
				 <th width="7%" class="workcap">	
				 		<center> Select 
						 <br>
						<?php
						  if(count($arr_roles)>1)
						  {
						  ?>
								<input type="checkbox" name="check_all" id="check_all"  class="select_all_button_class" value="select all" />
						  <?php
						  }
						  ?>
						  </center>				 	
				  </th>
				  
				   
				  
				  <th width="43%" class="workcap">Role Name</th>
				  <th width="20%" class="workcap" align="center">Action</th>
              </thead>
           	  <tbody>
			  
			  
			                  <?php
			
			foreach($arr_roles as $roles)
			{
				 $cnt++;							
			?>
                <tr>
                 <!-- <td class="worktd" align="left"><center><input value="<?php echo $roles['role_id']; ?>" class="chkselect" type="checkbox"></center></td>-->
				  <td class="worktd" align="left">
				  <?php 
				  	if($roles['role_id']!=1)
					{
				  ?>
					<center><input name="checkbox[]" class="case" type="checkbox" id="checkbox[]" value="<?php echo $roles['role_id'];?>" /></center>
					<?php
					}
				  ?>
				  </td>
                  <td class="worktd"  align="left"><?php echo stripslashes($roles['role_name']); ?></td>
                  <td class="worktd">
				  <?php 
				  	if($roles['role_id']!=1)
					{
				  ?>
                  <a class="btn btn-info" href="<?php echo HTTP_ADMIN; ?>edit-role/<?php echo base64_encode($roles['role_id']); ?>" title="Edit Role">
<i class="icon-edit icon-white"></i>Edit</a> 
					<?php
					}
				  ?>
 </td>
                  <?php
			}
			?>
              </tbody>
			  <?php
			  if(count($arr_roles)>1)
			  {
			  ?>
				  <tfoot>
					<th colspan="6">
					<?php /*
				  if(count($arr_roles)>1)
				  {
				  ?>
				  	Select All <input type="checkbox" name="check_all" id="check_all"  class="select_all_button_class" value="select all" />
				  <?php 
				  }*/
				  ?>
					
					<input type="submit" id="btn_delete_all" name="btn_delete_all" class="btn btn-danger" onClick="return deleteConfirm();"  value="Delete Selected"></th>
				  </tfoot>
			  <?php
			  }
			  ?>
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
</body>
</html>