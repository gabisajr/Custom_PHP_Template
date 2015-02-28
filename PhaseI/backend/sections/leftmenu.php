<div class="container-fluid">
<input type="hidden" name="HTTP_ADMIN" id="HTTP_ADMIN" value="<?php echo HTTP_ADMIN;?>" />
<div class="row-fluid">
<?php if ($_SESSION['user_account']['role_id']==1) { ?>
<!-- left menu starts -->
<div class="span2 main-menu-span">
  <div class="well nav-collapse sidebar-nav">
    <ul class="nav nav-tabs nav-stacked main-menu">      
	
	  <li class="nav-header hidden-tablet">Global Settings</li>
	  <li> <a class="ajax-link" href="<?php echo HTTP_ADMIN; ?>global-settings/list"><i class="icon-globe"></i> <span class="hidden-tablet">Manage Global Settings</span></a> </li>
	
	  <li class="nav-header hidden-tablet">Role Section</li>       
	  <li> <a class="ajax-link" href="<?php echo HTTP_ADMIN; ?>role-list"><i class="icon-adjust"></i> <span class="hidden-tablet">Manage Roles</span></a> </li> 	
		
      <li class="nav-header hidden-tablet">Admin Users Section</li>       
      <li> <a class="ajax-link" href="<?php echo HTTP_ADMIN; ?>admin-list"><i class="icon-user"></i> <span class="hidden-tablet">Manage Admin</span></a> </li> 
	  
	  <li class="nav-header hidden-tablet">Email Templates Section</li>
      <li> <a style="cursor: pointer;" class="ajax-link" href="<?php echo HTTP_ADMIN; ?>email-template/list.php"><i class="icon-envelope"></i> <span class="hidden-tablet">Manage Email Templates</span></a> </li>
	        	  
	  <li class="nav-header hidden-tablet">CMS Section</li>
	  <li> <a class="ajax-link" href="<?php echo HTTP_ADMIN;?>cms-list"><i class="icon-list-alt"></i><span class="hidden-tablet"> CMS Page List</span></a></li>
          
    </ul>
  </div>
  
</div>
<!--/span--> 
<!-- left menu ends -->


<!-- content starts -->
<?php }
else{
		require_once dirname(__FILE__)."/../../pi-classes/cls-role.php";
	$obj_role=new Role();
	#getting admin privileges 
	$arr_login_admin_privileges=$obj_role->getRolePrivileges("privilege_id","role_id='".intval($_SESSION['user_account']['role_id'])."'");
	?>
	<div class="span2 main-menu-span">
  	<div class="well nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu"> 
		<?php
		foreach($arr_login_admin_privileges as $privilage)
		{ 
		switch ($privilage) {
		case 1:
		?>
		 	<li class="nav-header hidden-tablet">CMS Section</li>
	  		<li> <a class="ajax-link" href="<?php echo HTTP_ADMIN;?>cms-list"><i class="icon-list-alt"></i><span class="hidden-tablet"> CMS Page List</span></a></li>	
		<?php
		break;
		
		case 2:
		?>
			<li class="nav-header hidden-tablet">Email Templates Section</li>
			<li> <a style="cursor: pointer;" class="ajax-link" href="<?php echo HTTP_ADMIN; ?>email-template/list.php"><i class="icon-envelope"></i> <span class="hidden-tablet">Manage Email Templates</span></a> </li>
		<?php
		break;			
				
			}
		 }
		?>  
		</ul>
  </div>
  
</div>
<?php	
} ?>
<!-- [end:::left menu] --> 