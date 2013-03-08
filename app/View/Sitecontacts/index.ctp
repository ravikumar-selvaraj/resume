<div class="row app-header">
            <div class="container ">
                <h1>Contact</h1>
            </div>
        </div>

        <div class="container main-body">
            <div class="row dashboard">
                <form class="well span8" action="" method="post">
                <input type="hidden" name="data[date]" value="<?php echo date('Y-m-d h:m:s') ?>" />
                    <div class="row">
                        <div class="span3">
                         <div class="control-group" id="contact_name" style="margin-bottom:0;">
                          <label>Name</label>
                            <input type="text" id="name" name="data[name]" class="span3" placeholder="Name">
                           <span id="contact_name_error" style="color:#B94A48"></span>
                          </div>
                          <div class="control-group" id="contact_email" style="margin-bottom:0;">
                          <label>Email Address</label>
                            <input type="text" id="SitecontactEmail" name="data[email]" class="span3" placeholder="Your email address">
                            <span id="contact_email_error" style="color:#B94A48"></span>
                         </div>
                          <div class="control-group" id="contact_phone" style="margin-bottom:0;">
                           <label>Phone</label>
                            <input type="text" id="SitecontactPhone" name="data[phone]" class="span3" placeholder="Phone number">
                            <span id="contact_phone_error" style="color:#B94A48"></span>
                          </div>
                         <div class="control-group" id="contact_sub" style="margin-bottom:0;">
                           <label>Subject</label>
                            <input type="text" id="SitecontactSubject" name="data[subject]" class="span3" placeholder="Subject">
                            <span id="contact_sub_error" style="color:#B94A48"></span>
                          </div>
                        </div>
                        <div class="span5">
                        <div class="control-group" id="contact_mes" style="margin-bottom:0;">
                            <label>Message</label>
                            <textarea name="data[message]" id="SitecontactMessage" class="input-xlarge span5" rows="10"></textarea>
                             <span id="contact_mes_error" style="color:#B94A48"></span>
							 <label>Captcha</label>
							 <?php echo $this->Recaptcha->display(); ?>
                         </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" id="contact">Send</button>
                    </div>
                </form>

            </div>
        </div>
        
<script type="text/javascript">
$(document).ready(function(){
$('#contact').click(function(){
	var validEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	var email = $("#SitecontactEmail").val();
	var name = $("#name").val();
	var subject = $("#SitecontactSubject").val();
	var message = $("#SitecontactMessage").val();
	if(name == ''){
			$("#contact_mes").removeClass("error");
			$("#contact_mes_error").html("");
			$("#contact_email").removeClass("error");
			$("#contact_email_error").html("");
			$("#contact_sub").removeClass("error");
			$("#contact_sub_error").html("");
			$("#contact_phone_error").html("");
			$("#contact_phone").removeClass("error");
			$("#contact_name").addClass("error");
			$("#contact_name_error").html("<?php echo __("Name required");?>");
			return false;
		} 
	else if(email == ''){
			$("#contact_mes").removeClass("error");
			$("#contact_mes_error").html("");
			$("#contact_name").removeClass("error");
			$("#contact_name_error").html("");
			$("#contact_sub").removeClass("error");
			$("#contact_sub_error").html("");
			$("#contact_phone_error").html("");
			$("#contact_phone").removeClass("error");
			$("#contact_email").addClass("error");
			$("#contact_email_error").html("<?php echo __("Email required");?>");
			return false;
		}
		else if(!validEmail.test(email)){
			$("#contact_mes").removeClass("error");
			$("#contact_mes_error").html("");
			$("#contact_name").removeClass("error");
			$("#contact_name_error").html("");
			$("#contact_sub").removeClass("error");
			$("#contact_sub_error").html("");
			$("#contact_phone_error").html("");
			$("#contact_phone").removeClass("error");
			$("#contact_email").addClass("error");
			$("#contact_email_error").html("<?php echo __("Invalid email");?>");
			return false;
		}
		else if(subject == ''){
			$("#contact_email").removeClass("error");
			$("#contact_email_error").html("");
			$("#contact_name").removeClass("error");
			$("#contact_name_error").html("");
			$("#contact_mes").removeClass("error");
			$("#contact_mes_error").html("");
			$("#contact_phone_error").html("");
			$("#contact_phone").removeClass("error");
			$("#contact_sub").addClass("error");
			$("#contact_sub_error").html("<?php echo __("Subject required");?>");
			return false;
		} 
			else if(message == ''){
			$("#contact_email").removeClass("error");
			$("#contact_email_error").html("");
			$("#contact_name").removeClass("error");
			$("#contact_name_error").html("");
			$("#contact_sub").removeClass("error");
			$("#contact_sub_error").html("");
			$("#contact_phone_error").html("");
			$("#contact_phone").removeClass("error");
			$("#contact_mes").addClass("error");
			$("#contact_mes_error").html("<?php echo __("Message required");?>");
			return false;
		}
		else if($('#SitecontactPhone').val().match(/[^\d]/)) {
			$("#contact_email").removeClass("error");
			$("#contact_email_error").html("");
			$("#contact_name").removeClass("error");
			$("#contact_name_error").html("");
			$("#contact_sub").removeClass("error");
			$("#contact_sub_error").html("");
			$("#contact_mes_error").html("");
			$("#contact_mes").removeClass("error");
			$("#contact_phone").addClass("error");
			$("#contact_phone_error").html("<?php echo __("Invalid number");?>");
    
	 		return false;
    }
		
		});
		});
</script>