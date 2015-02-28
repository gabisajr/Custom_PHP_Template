<?php 

/*
#Require File:
*/
require_once(dirname(__FILE__).'/../../pi-classes/global-functions.php');
isAdminLogin();
require_once(dirname(__FILE__).'/../../pi-classes/cls-cms.php');


/*
#Check Admin Login Or Not:
*/


/*
#Object:-
*/
$obj_cms = new Cms();  


/*
# Get News Letter Template List:- 
*/
		
		#:-parameter:-
		$get_cms_list = $obj_cms->getCmsList($debug_to_pass=0);
?>

<!-- [start:::sections] -->
<?php include('../sections/header.php'); ?>
<?php include('../sections/top-nav.php'); ?>
<?php include('../sections/leftmenu.php'); ?>
<!-- [end:::sections] -->

<script src="<?php echo HTTP_ADMIN; ?>admin-media/js/charisma.js"></script> 

<title><?php echo SITE_TITLE;?>-Admin Panel</title>
<div id="content" class="span10">

<div>
	<ul class="breadcrumb">
		<li> <a href="<?php echo HTTP_ADMIN;?>dashboard">Dashboard</a> <span class="divider">/</span> </li>
		<li>
			<a href="<?php echo HTTP_ADMIN;?>cms-list">CMS Page List</a> <!-- <span class="divider">/</span> -->
		</li>
	</ul>
</div>

<!--[start : admin interface message]-->
<?php echo ADMIN_MSG; ?>      
<!--[end  : admin interface message]-->

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-list-alt"></i> CMS Page List </h2>
			<!--<div class="box-icon">-->
				<!-- <a href="<?php echo HTTP_ADMIN;?>add-news-letters" class="btn btn-round" title="Add New News Letter">
					<i class="icon-plus"></i>
				</a> -->
				<!-- <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a> -->
			<!--</div>-->
		</div>
		
		
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<!--<th># News Category Id</th>-->                        
						<th>Page Title</th>
						<th>Page Alias</th>
						<!--<th>Language</th>-->
						<!--<th>Status</th>-->
						<th>Action</th>
					</tr>
				</thead>   
				<tbody>
					
					<?php
									 if(!empty($get_cms_list))
										{
								 			 foreach($get_cms_list as $key => $value)
					  						{ 
					  									#@Variable Declaration:-
					  									$cms_id 									= 	$value['cms_id'];
					  									$cms_page_lag_id 	= $value['lang_id'];
					  									$cms_page_alias 			= 	$value['page_alias'];
					  									$cms_page_title 		= 	$value['page_title'];
					  									$cms_page_content = 	$value['page_content'];
					  									$cms_page_status 	= 	$value['status'];
					  									$cms_page_lang_name 	= 	$value['lang_name'];
					?>						 
						<tr>
							<td><?php echo $cms_page_title; ?></td>
							<td><?php echo $cms_page_alias; ?></td>							
							<!--<td><?php echo $cms_page_lang_name; ?></td>-->
							
  							<!--<td class="center">
								<?php if($cms_page_status=='Published'){ ?>
								<span class="label label-success">Published</span>
								<?php }else{ ?>
								<span class="label label-important">Unpublished</span>
								<?php }?>
								</td>-->
								
							<td class="center">
								<a class="btn btn-info" href="<?php echo HTTP_ADMIN;?>edit-cms/<?php echo $cms_id;?>"><i class="icon-edit icon-white"></i>Edit</a>
								<!-- <a href="<?php echo SITE_PATH; ?>administrator/delete-news-letter/<?php echo $value['news_letter_template_id']; ?>" onClick="return confirm_page(); return false;"  class="btn btn-danger"><i class="icon-trash icon-white"></i>Delete</a> -->
							</td>
						</tr>
					<?php 		
													}#end:foreach;
										}#end:if case;			
					 ?>
												
				</tbody>
			</table>            
		</div>
</div><!--/span-register-as-user-fb-->
</div><!--/row-->

<!-- [start:::sections] -->       
<?php include('../sections/footer.php'); ?>
<!-- [end:::sections] -->