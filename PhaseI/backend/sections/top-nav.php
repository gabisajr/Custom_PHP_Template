<?php 
if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
<!-- topbar starts -->
<div class="navbar">
  <div class="navbar-inner">
    <div class="container-fluid"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="<?php echo HTTP_ADMIN;?>dashboard"> <img alt="Logo" src="<?php echo HTTP_ADMIN;?>admin-media/img/logo20.png" /> <span><?php echo SITE_TITLE;?></span></a> 
      
    
      <!-- user dropdown starts -->
      <div class="btn-group pull-right" > 
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> 
              <i class="icon-user"></i><span class="hidden-phone"><?php echo $_SESSION['user_account']['user_name'];?></span> <span class="caret"></span> 
		  </a>
        <ul class="dropdown-menu">
		  <li><a href="<?php echo HTTP_ADMIN;?>admin-profile"><?php echo $_SESSION['user_account']['first_name']." ".$_SESSION['user_account']['last_name'];?></a></li>	
		  <li><a href="<?php echo HTTP_ADMIN;?>log-out">Logout</a></li>
        </ul>
      </div>
      <!-- user dropdown ends -->
      
      <div class="top-nav nav-collapse">
        <ul class="nav">
          <li><a href="<?php echo SITE_PATH;?>" target="_blank">Visit Site</a></li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>
<!-- topbar ends -->
<?php } ?>
