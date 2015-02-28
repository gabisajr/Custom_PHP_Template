<?php
#Require File: 
require_once("../pi-classes/global-functions.php");
#Check Admin Login Session admin_id:
isAdminLogin();
require_once("../pi-classes/cls-admin.php");
#objects:
$obj_admin_details=new Admin();
$arr_admin_details_with_username=$obj_admin_details->getAdminDetails('','u.user_type=2');// user type 2 admin user
$totalCount=count($arr_admin_details_with_username);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo SITE_TITLE;?>-Admin Login</title>
<?php include('sections/header.php'); ?>
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/bootstrap-tab.js"></script>
<!-- library for advanced tooltip -->
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/bootstrap-tooltip.js"></script>
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/charisma.js"></script>
<!--<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN; ?>admin-media/js/jquery.validate.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo HTTP_ADMIN; ?>admin-media/js/login/login_admin.js"></script>-->
</head>
<body>
<?php include('sections/top-nav.php'); ?>
<?php include('sections/leftmenu.php'); ?>

  <div id="content" class="span10">
      <!--[breadcrumb]-->
			<div>
				<ul class="breadcrumb">
					<li>
						<!--<a href="javascript:void(0);">Dashboard</a>-->
						Dashboard
					</li>
				</ul>
			</div>
			<?php
			if ($_SESSION['user_account']['role_id']==1) { 
			?>
			<div class="sortable row-fluid">
				<a data-rel="tooltip" title="<?php echo $totalCount;?> Active Admins" class="well span3 top-block" href="<?php HTTP_ADMIN?>admin-list">
					<span class="icon32 icon-red icon-user"></span>
					<div>Total Admin</div>
					<div><?php echo $totalCount;?></div>
					<span class="notification"><?php echo $totalCount;?></span>
				</a>
			</div>
			<?php
			}
			else
			{
			?>
				<div class="sortable row-fluid">
				<a data-rel="tooltip" title="<?php echo $totalCount;?> Active Admins" class="well span3 top-block" href="javascript:void(0);">
					<span class="icon32 icon-red icon-user"></span>
					<div>Total Admin</div>
					<div><?php echo $totalCount;?></div>
					<span class="notification"><?php echo $totalCount;?></span>
				</a>
				</div>
			<?php
			}
			?>		
			<div class="row-fluid sortable">
			</div><!--/row-->

</div>

<!--/fluid-row-->
<?php include('../sections/footer.php'); ?>
</div><!--/.fluid-container-->
</body>
</html>