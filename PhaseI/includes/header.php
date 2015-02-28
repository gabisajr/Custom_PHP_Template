<link type="text/css" rel="stylesheet" href="<?php echo HTTP_PATH; ?>front-media/css/bootstrap.css" media="screen">
<!--<script type="text/javascript" src="<?php echo HTTP_PATH; ?>front-media/js/jquery-1.10.2.min.js"></script>-->
<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
    var javascript_site_path = "<?php echo HTTP_PATH; ?>";
    $(document).ready(function(e) {
        jQuery('.close').click(function() {
            $(this).parent('div').slideUp('slow');
        });
    });
</script>
<?php
if (isset($include_js))
    echo $include_js;
?>