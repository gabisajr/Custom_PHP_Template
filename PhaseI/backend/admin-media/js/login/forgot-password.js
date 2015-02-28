// REGISTRATION FORM VALIDATIOPN 
$(document).ready(function() {
    $("#frm_admin_forgot_password").validate({
        rules: {
			errorElement: "div",
            user_email: {
                required: true,
                email: true,
				remote:{
					url: jQuery("#HTTP_ADMIN").val()+"forgot-password-email",
					type: "post"
				}
            }
        }, //end rules
        messages: {
            user_email: {
                required: "Please enter email address.",
                email: "Please enter an valid email address.",
           		remote: "Entered email is not registered with us."
            }
        } //end messages
    }); //end validate
}); //end document ready
