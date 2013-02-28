$(document).ready(function(){
	$("#forget_btn").click(function(){
		var validEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var email = $("#forget_email").val();
		if(email == ''){
			$("#forget_error").addClass("error");
			$("#forget_pwd_error").html("<?php echo __("Email required");?>");
			return false;
		} 
		else if(!validEmail.test(email)){
			$("#forget_error").addClass("error");
			$("#forget_pwd_error").html("<?php echo __("Invalid email");?>");
			return false;
		}
		else if(validEmail.test(email)){
			$.ajax({
					type: "POST",
					url: "<?php echo BASE_URL?>pages/check_email",
					data: "email="+email,
					success: function(msg){ 
						if(msg == 'success'){
							$("#forget_error").addClass("error");
							$("#forget_pwd_error").html("<?php echo __("Email not exist");?>");
						} else {
							$("#forget_error").removeClass("error");
							$("#forget_pwd_error").html(""); 
							$("#forget_form").submit();
						}
					}
					});
			return false;
		}
		});
	$("#signup_email").blur(function(){
		var email = $(this).val();
		var validEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if (validEmail.test(this.value)) {
        		$.ajax({
					type: "POST",
					url: "<?php echo BASE_URL?>pages/check_email",
					data: "email="+email,
					success: function(msg){ 
						if(msg == 'failed'){
							$("#sign_up_email").addClass("error");
							$("#sign_up_email_error").html("<?php echo __("Email is already taken");?>");
						} else {
							$("#sign_up_email").removeClass("error");
							$("#sign_up_email_error").html(""); 
							$("#test_email").val(1);
						}
					}
					});
    		}
   		 else {
        		$("#sign_up_email").addClass("error");
				$("#sign_up_email_error").html("<?php echo __("Invalid email");?>");                                
    		}
		
		});
		
	$("#signup_btn").click(function(){
		var email = $("#signup_email").val();
		var pwd = $("#signup_password").val();
		var test = $("#test_email").val();
		if(email == ''){
			$("#sign_up_email").addClass("error");
			$("#sign_up_email_error").html("<?php echo __("Email required");?>");
			return false;
		}
		else if(test == 0){
			$("#sign_up_email").addClass("error");
			$("#sign_up_email_error").html("<?php echo __("Email is already taken");?>");
			return false;
		}
		else if(pwd == ''){
			$("#sign_up_pwd").addClass("error");
			$("#sign_up_pwd_error").html("<?php echo __("Password required");?>");
			return false;
		}
	});
	
	$("#login_btn").click(function(){
		var email = $("#login_email").val();
		var pwd = $("#login_password").val();
		var log_test = $("#login_test").val();
		if(email == ''){
			$("#log_in_email").addClass("error");
			$("#login_email_error").html("<?php echo __("Email required");?>");
			return false;
		} 
		else if(pwd == ''){
			$("#log_in_pwd").addClass("error");
			$("#login_pwd_error").html("<?php echo __("Password required");?>");
			return false;
		}
		else if(email !='' && pwd !=''){
			$.ajax({
					type: "POST",
					url: "<?php echo BASE_URL?>pages/check_login",
					data: "email="+email+"&pwd="+pwd,
					success: function(msg){ 
						if(msg == 'noemail'){
							$("#log_in_email").addClass("error");
							$("#log_in_pwd").removeClass("error");
							$("#login_pwd_error").html("");
							$("#login_email_error").html("<?php echo __("Invalid email");?>");
						}
						else if(msg == 'nopwd'){
							$("#log_in_pwd").addClass("error");
							$("#log_in_email").removeClass("error");
							$("#login_email_error").html("");
							$("#login_pwd_error").html("<?php echo __("Invalid password");?>");
						} 
						else {
							$("#log_in_email").removeClass("error");$("#login_email_error").html("");
							$("#log_in_pwd").removeClass("error");$("#login_pwd_error").html("");
							 $("#login_form").submit();
						}
						
					}
				});
		return false;
		}
	});
	
	
	
});

function showpass(id)
 {
	 if(id=='forget')
	{
	$('#forget1').show();
	$('#forget2').show();
	$('#sign1').hide();
	$('#sign').hide();
	
	}
	else
	{
	$('#sign1').show();
	$('#sign').show();
	$('#forget1').hide();
	$('#forget2').hide();
	}
 }




