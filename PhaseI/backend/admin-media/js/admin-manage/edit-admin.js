// JavaScript Document
$(document).ready(function(e) {        
	$("#frm_admin_details").validate({
		errorElement: "div",
		errorPlacement: function(label, element) {
			if(element[0].name=="admin_privileges[]")
			{
				label.insertAfter("#pre_div");
			}else
			{
				label.insertAfter(element);
			}
		},
		rules: {
			first_name:{
				required:true
			},
			last_name:{
				required:true
			},
			contact_no:{
				number:true,
				minlength:10
			},
			user_name:{
				required:true,
				minlength:5,
				remote:{
					url: jQuery("#HTTP_ADMIN").val()+"admin/check-admin-username.php",
					type: "post",
					data:{
						type:"edit",
						old_username:jQuery('#old_username').val()
                    }
				}
			},
			user_email:{
				required:true,
				email:true,
				remote:{
					url: jQuery("#HTTP_ADMIN").val()+"admin/check-admin-email.php",
					type: "post",
					data:{
						type:"edit",
						old_email:jQuery('#old_email').val()
                    }
				}
			},
			user_password:{
				required:true,
				minlength:5,
				password_strenth: true
			},
			confirm_password:{
				required:true,
				equalTo:'#user_password'	
			},
			role_id:{
				required:true	
			}
		},
		messages:{
			first_name:{
				required:"Please enter first name."
			},
			last_name:{
				required:"Please enter last name."
			},
			contact_no:{
				number:"Please enter valid contact number.",
				minlength:"Please enter 10 digit conact number"
			},
			user_name:{
				required:"Please enter username.",
				minlength:"Please enter at least five characters.",
				remote:"Username already exists."
			},
			user_email:{
				required:"Please enter an email address.",
				email:"Please enter a valid email address.",
				remote:"Email address already exists."
			},
			user_password:{
				required:"Please enter password.",
				minlength:"Please enter atleast five characters."
			},
			confirm_password:{
				required:"Please enter the confirm password.",
				equalTo:"Password and confirm password do not match."
			},
			role_id:{
				required:"Please select admin user role."
			}
		}
	});
	
	jQuery.validator.addMethod("password_strenth", function(value, element) {
		return isPasswordStrong(value, element);
	}, "Password must be strong");
		
	$("#check_box").css({display:"block",opacity:"0",height:"0",width:"0","float":"right"});
	
	jQuery("#change_password").bind("click",function(){
		  if(jQuery(this).attr('checked')=='checked') 
		  {	
		  	jQuery('#change_password_div').css('display','block');
		  }
		  else
		  {
		  	jQuery('#change_password_div').css('display','none');
		  }
	});
});