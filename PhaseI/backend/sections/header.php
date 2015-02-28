<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo SITE_TITLE;?> - admin panel.">
<meta name="author" content="Somnath A Gunjal" >
<!-- The styles -->
<link id="bs-css" href="<?php echo HTTP_ADMIN;?>admin-media/css/bootstrap-cerulean.css" rel="stylesheet" />
<link href="<?php echo HTTP_ADMIN;?>admin-media/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo HTTP_ADMIN;?>admin-media/css/charisma-app.css" rel="stylesheet">
<link href="<?php echo HTTP_ADMIN;?>admin-media/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
<link href="<?php echo HTTP_ADMIN;?>admin-media/css/jquery.iphone.toggle.css" rel='stylesheet'>
<link href="<?php echo HTTP_ADMIN;?>admin-media/css/opa-icons.css" rel='stylesheet'>
<link rel="shortcut icon" href="<?php echo HTTP_ADMIN;?>admin-media/img/favicon.ico">
<link rel="stylesheet" type="text/css" href="<?php echo HTTP_ADMIN;?>admin-media/css/common.css">
<style type="text/css">
  body {
	padding-bottom: 40px;
  }
  .sidebar-nav {
	padding: 9px 0;
  }
   .error{
		color: #BD4247;
	}
</style>
<script src="<?php echo HTTP_ADMIN;?>admin-media/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/jquery-ui.js" type="text/javascript"></script>
    <!-- external javascript
================================================== -->
<link href="<?php echo HTTP_ADMIN;?>admin-media/css/pipl-admin.css" rel='stylesheet'>
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/pipl-admin.js"></script>
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery UI -->
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/bootstrap-dropdown.js"></script>

<script type="text/javascript">
$(document).ready(function(e){
	jQuery("#msg_close").bind("click",function(){
		$(this).parent().remove();
	});
});
</script>
