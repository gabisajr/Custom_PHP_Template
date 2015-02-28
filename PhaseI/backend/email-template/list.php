<?php
require_once("../../pi-classes/global-functions.php");
require_once("../../pi-classes/cls-email-template-admin.php");
#Check User Login Session user_id:
isAdminLogin();
// messages handelling
if(isset($_SESSION['msg']) && $_SESSION['msg']!="")
{
	$msg=$_SESSION['msg'];
	unset($_SESSION['msg']);
}
// here  we are getting the all email templates 
$obj_email_template=new EmailTemplate();
$arr_email_templates=$obj_email_template->getAllEmailTemplates("email_template.*,lang.lang_name");


?><!DOCTYPE html>
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
          <!--<li> <a href="<?php echo HTTP_ADMIN; ?>email-template/list.php">Manage Email Templates</a> </li>-->
		  <li>Manage Email Templates</li>
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
            <h2><i class=""></i>Email Templates Management</h2>
          </div>
          <br >
          <!--[sortable body]-->
          <div class="box-content">
            <table  class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                <th width="14%" class="workcap">Title</th>
                <th width="38%" class="workcap">Subject</th>
                <!--<th width="10%" class="workcap">Language</th>-->
                <th width="15%" class="workcap">Created On</th>
                <th width="15%" class="workcap">Updated On</th>
                <th width="60%" class="workcap" align="center">Action</th>
              </thead>
              <tbody>
                <?php
			
			foreach($arr_email_templates as $email_template)
			{
				 $cnt++;							
			?>
                <tr>
                    <td class="worktd"  align="left"><?php echo ucwords(str_replace("-"," ",$email_template['email_template_title'])); ?></td>
                   <td class="worktd"  align="left"><?php echo $email_template['email_template_subject']; ?></td>
                   <!--<td class="worktd"  align="left"><?php echo $email_template['lang_name']; ?></td>-->
                   <td class="worktd"  align="left"><?php echo $email_template['date_created']; ?></td>
                   <td class="worktd"  align="left"><?php echo $email_template['date_updated']; ?></td>
                   <td class="worktd">
                     <a class="btn btn-info" href="<?php echo HTTP_ADMIN; ?>email-template/edit-email-template.php?edit_id=<?php echo $email_template['email_template_id']; ?>" title="Edit Email Template">
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
      </div>

</div>

<!--including footer here-->
      <?php include('../sections/footer.php'); ?>
</div>


</body>
</html>