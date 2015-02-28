<?php
require_once("../../pi-classes/global-functions.php");
#Check Admin Login Session admin_id:
isAdminLogin();
require_once("../../pi-classes/cls-role.php");
// get list of Role
$obj_role=new Role();

if(count($_POST)>0)	
{
if($_POST['role_name']!="")
{
	$obj_role=new Role();
	if($_POST['edit_id']!='')
	{	
		
		$arr_to_update=array(
			"role_name"=>mysql_real_escape_string($_POST['role_name'])
		);
		$where_field="`role_id`='".intval(base64_decode($_POST['edit_id']))."'";
		$obj_role->updateRole($arr_to_update, $where_field);
		
		#deleting the role old priviliges
		$obj_role->deleteRolePrivileges(" role_id='".base64_decode($_POST['edit_id'])."'");
		
		#inserting the role new priviliges
		foreach($_POST['role_privileges'] as $privilege)
		{	
			$privilege_to_insert=array("role_id"=>base64_decode($_POST['edit_id']),"privilege_id"=>$privilege);
			$obj_role->insertRolePrivileges($privilege_to_insert);	
		}
			$_SESSION['msg']="<span class='success'>Role updated successfully!</span>";	
	}
	else
	{
		$arr_to_insert=array("role_name"=>mysql_real_escape_string($_POST['role_name']));				
		$last_insert_id=$obj_role->insertRole($arr_to_insert,1);
		#inserting priviges for Role
		foreach($_POST['role_privileges'] as $privilege)
		{
			$privilege_to_insert=array("role_id"=>$last_insert_id,"privilege_id"=>$privilege);
			$obj_role->insertRolePrivileges($privilege_to_insert);			
		}
		$_SESSION['msg']="<span class='success'>Role added successfully!</span>";	
	}
	header("location:".HTTP_ADMIN."role-list");
}
}
$arr_privileges=array();
#getting all privileges 
$arr_privileges=$obj_role->getAllPrivileges();

$arr_role=array();
if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
{
	$arr_role=$obj_role->getRole("*","role_id='".intval(base64_decode($_GET['edit_id']))."'");
	// single row fix
	$arr_role=end($arr_role);
	
	#getting role privileges 
	$arr_role_privileges=$obj_role->getRolePrivileges("privilege_id","role_id='".intval(base64_decode($_GET['edit_id']))."'");
}

?><!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo SITE_TITLE;?>-Admin Panel</title>
<?php include('../sections/header.php'); ?>
<style>
.error {
    color: #BD4247;
    margin-left: 140px;
    width: 210px;
}
.FETextInput{
    margin-left: 120px;
    margin-top: -28px;
}
</style>
<!-- validation js -->
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN;?>admin-media/js/jquery.validate.min.js"></script>

</head>
<body>
<?php include('../sections/top-nav.php'); ?>
<?php include('../sections/leftmenu.php'); ?>
      <div id="content" class="span10">
      <!--[breadcrumb]-->
      <div>
        <ul class="breadcrumb">
          <li> <a href="<?php echo HTTP_ADMIN;?>dashboard">Dashboard</a> <span class="divider">/</span> </li>
          <li> <a href="<?php echo HTTP_ADMIN; ?>role-list">Manage Roles</a> <span class="divider">/</span></li>
		  <li> <?php echo ((isset($_GET['edit_id']) && $_GET['edit_id']!="")?"Update":"Add");?> Role </li>
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
            <h2><i class=""></i><?php echo ((isset($_GET['edit_id']) && $_GET['edit_id']!="")?"Update":"Add");?> Role</h2>
              <div class="box-icon">
	              <a title="Manage Role" class="btn btn-plus btn-round" href="<?php echo HTTP_ADMIN;?>role-list"><i class="icon-arrow-left"></i></a>
            </div>
          </div>
          <br >
          <!--[sortable body]-->
          <div class="box-content">
            <form name="frm_role" id="frm_role" action="<?php echo HTTP_ADMIN;?>role/add.php" method="POST" >
				<?php
					if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
					{	?>
						<input type="hidden" name="frm_type" id="frm_type" value="edit" />
						<input type="hidden" name="old_role_name" id="old_role_name" value="<?php echo $arr_role['role_name'];?>" />
					<?php
					}
					else
					{
						?>
						<input type="hidden" name="frm_type" id="frm_type" value="add" />	
						<input type="hidden" name="old_role_name" id="old_role_name" value="" />
						<?php
					}
				?>
                <div class="control-group">
                  <label class="control-label" for="inputQuestion">Role Name<sup class="mandatory">*</sup></label>
                  <div class="controls">
				  	<input type="text" dir="ltr" style="margin-left:140px; margin-top:-28px" class="FETextInput" name="role_name" id="role_name" value="<?php echo $arr_role['role_name']; ?>" size="80"   />
                  </div>
                </div>
				
				<div class="control-group">
					<label for="typeahead" class="control-label">Choose Role Privileges<sup class="mandatory">*</sup> </label>
					<div class="controls">
						<?php foreach($arr_privileges as $key=>$privilege)
						{?>
							<p style="margin-left:140px;">
								<input type="checkbox" name="role_privileges[]" id="role_privileges" value="<?php echo $privilege['privileges_id']?>"  <?php if(isset($_GET['edit_id']) || $_GET['edit_id']!=''){ if(in_array($privilege['privileges_id'],$arr_role_privileges)){?> checked="checked" <?php }}?>> <?php echo ucwords($privilege['privilege_name']);?>
							</p>
						 <?php }?>
					</div>
					
					
					
					<div id="pre_div">
					
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
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN;?>admin-media/js/role-manage/add-edit-role.js"></script>
</body>
</html>

