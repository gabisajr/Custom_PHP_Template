<?php
require_once("../../pi-classes/global-functions.php");
#Check Admin Login Session admin_id:
isAdminLogin();
require_once("../../pi-classes/cls-global-settings.php");
require_once("../../pi-classes/cls-admin.php");
// messages handelling
if(isset($_SESSION['msg']) && $_SESSION['msg']!="")
{
	$msg=$_SESSION['msg'];
	unset($_SESSION['msg']);
}
$obj_global_settings=new GlobalSettings();
$arr_global_settings=$obj_global_settings->getGlobalSettings("mst_global.*,trans_global.*","trans_global.lang_id=17");
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
</head>
<body>
<?php include('../sections/top-nav.php'); ?>
<?php include('../sections/leftmenu.php'); ?>

      <div id="content" class="span10">
      <!--[breadcrumb]-->
      <div>
        <ul class="breadcrumb">
          <li> <a href="<?php echo HTTP_ADMIN;?>dashboard">Dashboard</a> <span class="divider">/</span> </li>
          <li>Manage Global Settings</li>
        </ul>
      </div>
      
      <!--[message box]-->
      <?php
			if(is_array($msg))
			{
				isAdminLogin();
			}else{
			if(strpos($msg,"does not seem to be valid"))
			  {
				$msg="";
			  }
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
            <h2><i class=""></i>Global Settings Management</h2>
          </div>
          <br >
		  <!--[sortable body]-->
          <div class="box-content">
            <table  class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					 <th width="10%" class="workcap">	
							No
					  </th>
					  <th width="20%" class="workcap">Parameter Name</th>
					  <th width="30%" class="workcap" align="center">Parameter Value</th>
					  <th width="40%" class="workcap" align="center">Action</th>
				  </thead>
           	  <tbody>
			<?php
			foreach($arr_global_settings as $key=>$global_setting)
			{
			?>
                <tr>
                  <td class="worktd" align="left">
				  <?php echo $key+1;?>
				  </td>
				  
                  <td class="worktd"  align="left"><?php echo ucwords(str_replace("_"," ",stripslashes($global_setting['name']))); ?></td>
				  
				  <td class="worktd"  align="left">
				  
				  <?php 
				  if($global_setting['name']=="date_format")
				  {
				  	echo date(stripslashes($global_setting['value']));
				  }
				  elseif($global_setting['name']=='company_logo'){?>
                                  
                       <img width="100" height="100" src="<?php echo HTTP_PATH;?>front-media/img/company_logo/<?php echo stripslashes($global_setting['value']); ?>" id="front_image_tag_id" title="image"> 
                                

                                   <?php }
				  else
				  {
				  	echo stripslashes($global_setting['value']);
				  }
				  ?>
				  
				  </td>
				  
                  <td class="worktd">
				
                  <a class="btn btn-info" href="<?php echo HTTP_ADMIN; ?>global-settings/edit/<?php echo base64_encode($global_setting['global_name_id']);?>/<?php echo base64_encode(17);?>" title="Edit Global Settings Parameter">
<i class="icon-edit icon-white"></i>Edit</a>
				  
 </td>
                  <?php
			}
			?>
              </tbody>
            </table>
          </div>
          <!--[sortable body]--> 
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