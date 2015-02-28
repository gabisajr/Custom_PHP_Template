// JavaScript Document
$(document).ready(function(e) {        
	$("#frm_admin_details").validate({
		errorElement: "div",
		errorPlacement: function(label, element) {
			if(element[0].name=="admin_privileges[]")
			{
				label.insertAfter("#pre_div");
			}
			else
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
			user_name:{
				required:true,
				minlength:5,
				remote:{
					url: jQuery("#HTTP_ADMIN").val()+"admin/check-admin-username.php",
					type: "post"
				}
			},
			user_email:{
				required:true,
				email:true,
				remote:{
					url: jQuery("#HTTP_ADMIN").val()+"admin/check-admin-email.php",
					type: "post"
				}
			},
			user_password:{
				 required: true,
				 minlength: 8,
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
				required: "Please enter password.",
                minlength: "Please enter atleast 8 characters."
			},
			confirm_password:{
				required:"Please enter the confirm password.",
				equalTo:"Password and confirm password does not match."
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
});