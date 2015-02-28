<?php
require_once("../../pi-classes/global-functions.php");
#Check User Login Session user_id:
isAdminLogin();
require_once("../../pi-classes/cls-admin.php");
require_once("../../pi-classes/cls-common.php");
$obj_admin=new Admin();
/* if btn_delete_all button is pressed*/ 
if(isset($_POST['btn_delete_all']))
{
	#getting all ides selected
	$arr_user_ids=$_POST['checkbox'];	
	if(count($arr_user_ids)>0)
	{
		#cheaking admin setttings for email notification and sending mail
		$obj_email_tmp = new Common();
		foreach($arr_user_ids as $user_id)
		{
			#getting admin details
			$arr_admin_detail=$obj_admin->getAdminDetails("*","user_id='".intval($user_id)."'");
			if(count($arr_admin_detail)>0)
			{
				#sending admin user mail for account deletion.
				$lang_id = 17; 
				$var_array = array
					("||SITE_TITLE||" => SITE_TITLE,
					"||SITE_PATH||" => SITE_PATH,
					"||ADMIN_NAME||" => $arr_admin_detail[0]['first_name'] . ' ' . $arr_admin_detail[0]['last_name']
				);
				$template_title = 'admin-deleted';
				$mail = $obj_email_tmp->commonEmail($arr_admin_detail[0]['user_email'], $var_array, $template_title, $lang_id, $debug = 0);
			}
		}
		
		$user_ids=implode(",",$arr_user_ids);	
		$obj_admin=new Admin();
		$obj_admin->deleteAdminDetails(" user_id in (".$user_ids.")");
		$_SESSION['msg']="<span class='success'>Admin deleted successfully!</span>";
	}
}
// messages handelling
if(isset($_SESSION['msg']) && $_SESSION['msg']!="")
{
	$msg=$_SESSION['msg'];
	unset($_SESSION['msg']);
}
#getting all admin details
$arr_admin_list=$obj_admin->getAdminDetails("u.user_id,u.user_name,u.first_name,u.last_name,u.user_email,u.user_status,u.user_type,u.register_date,u.role_id,r.role_name","u.user_type='2'",'','',0);

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
          <li>Manage Admin</li>
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
            <h2><i class=""></i>Admin Management</h2>
              <div class="box-icon">
              <a title="Add new admin user" class="btn btn-plus btn-round" href="<?php echo HTTP_ADMIN;?>add-admin"><i class="icon-plus"></i></a>
            </div>
          </div>
          <br >
		  <form name="frm_admin_users" id="frm_admin_users" action="<?php echo HTTP_ADMIN?>admin-list" method="post">
          <!--[sortable body]-->
          <div class="box-content">
            <table  class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
              <th width="7%" class="workcap">
			  <?php
			 if(count($arr_admin_list)>1) 
			 {
			 ?>
			  <center>Select <br><input type="checkbox" name="check_all" id="check_all"  class="select_all_button_class" value="select all" /></center>
			   <?php
			 }
			 ?> 
              <!--Select<br><input type="checkbox" id="chkAll">-->
              </th>
                <th width="8%" class="workcap">Username</th>
                <th width="12%" class="workcap">Full Name</th>
                <!--<th width="12%" class="workcap">Last Name</th>-->
                <th width="10%" class="workcap">Email Id</th>
				<th width="10%" class="workcap">Role</th>
                <th width="6%" class="workcap">Status</th>   
                <th width="10%" class="workcap">Created on</th>                    
                <th width="15%" class="workcap" align="center">Action</th>
              </thead>
              <tbody>
                <?php
                    foreach($arr_admin_list as $admin)
                    {
                      $cnt++;							
		?>
                <tr>
                
                <td class="worktd" align="left">
                    <?php 
                    if($admin['role_id']!=1)
                    {
                    ?>
                      <center><input name="checkbox[]" class="case" type="checkbox" id="checkbox[]" value="<?php echo $admin['user_id'];?>" /></center>
                    <?php
                    }
                    ?>
                          
                </td>
                  <td class="worktd"  align="left"><?php echo stripslashes($admin['user_name']); ?></td>
                  <td class="worktd"  align="left"><?php echo stripslashes($admin['first_name']); ?></td>
                  <!--<td class="worktd"  align="left"><?php echo stripslashes($admin['last_name']); ?></td>-->
                  <td class="worktd"  align="left"><?php echo stripslashes($admin['user_email']); ?></td>
				  <td class="worktd"  align="left"><?php echo stripslashes($admin['role_name']); ?></td>
				  
                  <td class="worktd"  align="left">
                      
                      <?php 
                    if($admin['role_id']!=1)
                    {
						if($admin['user_status']==0)
						{
							?>
							<div>
                     			 <a style="cursor:default;" class="label label-warning" href="javascript:void(0);" id="status_<?php echo $admin['user_id'];?>">Inactive</a>
                    		</div>
							<?php
						}
						else
						{
						
                    	?>
							<div id="active_div<?php echo $admin['user_id'];?>"  <?php if($admin['user_status']==1){?> style="display:inline-block" <?php }else { ?> style="display:none;" <?php }?>>
							  <a class="label label-success" title="Click to Change Status" onClick="changeStatus('<?php echo $admin['user_id'];?>',2);" href="javascript:void(0);" id="status_<?php echo $admin['user_id'];?>">Active</a>
							 </div>
		
							<div id="blocked_div<?php echo $admin['user_id'];?>" <?php if($admin['user_status']==2){?> style="display:inline-block" <?php }else { ?> style="display:none;" <?php }?> >
							  <a class="label label-important" title="Click to Change Status" onClick="changeStatus('<?php echo $admin['user_id'];?>',1);" href="javascript:void(0);" id="status_<?php echo $admin['user_id'];?>">Blocked</a>
							</div>
					
							<?php						
							}
							?>
                    
                     <?php
                    }
                    else 
					{
                    ?>
                     <div id="active_div">
                      <a class="label label-success" style="cursor:default;" title="" href="javascript:void(0);" id="status">Active</a>
                     </div>
                    <?php
                    }
                    ?>
					</td>
                  <td class="worktd"  align="left"><?php echo date("d M Y",strtotime($admin['register_date'])); ?></td>
				  
				  <td class="worktd">
				   <?php 
                    if($admin['role_id']==1)
                    {
					  if($admin['user_id']==$_SESSION['user_account']['user_id'])
                  	  {
						?>
						 <a class="btn btn-info" title="Edit Admin User Details" href="<?php echo HTTP_ADMIN; ?>edit-admin/<?php echo base64_encode($admin['user_id']);?>">
<i class="icon-edit icon-white"></i>Edit</a>
							
						<?php
					   }
					}
					else
					{
					?>
					  <a class="btn btn-info" title="Edit Admin User Details" href="<?php echo HTTP_ADMIN; ?>edit-admin/<?php echo base64_encode($admin['user_id']);?>">
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
			 if(count($arr_admin_list)>1) 
			 {
			 ?>
              <tfoot>
              	<th colspan="9"><input type="submit" id="btn_delete_all" name="btn_delete_all" class="btn btn-danger" onClick="return deleteConfirm();"  value="Delete Selected"></th>
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
<script>
function changeStatus(user_id,user_status)
{	
	/* changing the user status*/
	var obj_params=new Object();
	obj_params.user_id=user_id;
	obj_params.user_status=user_status;
	jQuery.post("<?php echo HTTP_ADMIN;?>admin/change-status.php",obj_params,function(msg){
		if(msg.error=="1")
		{
			alert(msg.error_message);
		}
		else
		{
			/* toogling the bloked and active div of user*/
			if(user_status==2)
			{
				$("#blocked_div"+user_id).css('display','inline-block');
				$("#active_div"+user_id).css('display','none');
				
			}
			else
			{
				$("#active_div"+user_id).css('display','inline-block');
				$("#blocked_div"+user_id).css('display','none');
			}
		}
		},"json");

}	
</script>

</body>
</html>