<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>CVomg _ Beautifully Simple Online Resume Builder _ Maker _ Generator</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		
<?php	
		echo $this->html->css(array('page/normalize.min','page/bootstrap','page/main')); 
		echo $this->html->script(array('page/vendor/modernizr-2.6.2-respond-1.1.0.min'));
?>
  </head>

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
		
       <!-- MAIN HEADER -->
        <header>
            <div class="topbar row">
                <div class="container">
                    <div class="row">
                        <div class="span4 site_links offset6">
                            <a href=""><?php echo __("Features");?></a>
                            <a href=""><?php echo __("Career advice");?></a>
                            <a href=""><?php echo __("Blog");?></a>
                            <a href=""><?php echo __("Contact");?></a>
							
                        </div>

                        <div class="span2 pull-right language">
                            <?php echo __("Language");?>:
                            <a href="" class="lang_active"><img src="<?php echo Router::url('/'); ?>img/page/eng.png" alt="english"></a>
                            <a href=""><img src="<?php echo Router::url('/'); ?>img/page/es.png" alt="english"></a>
                        </div>
                    </div>
                </div>
            </div>
           <div class="container">
                <div class="row brand_bar">
                    <a href="<?php echo BASE_URL;?>" id="brand" class="span3 pull-left"><img src="<?php echo Router::url('/'); ?>img/page/logo.png" alt="CVomg - The best way to show yourself"></a>
                    <?php if(!isset($_SESSION['User']['uid'])) {?>
                    <div class="span3 pull-right ">
                        <button type="button" data-toggle="modal" data-target="#signup" class="btn primary_btn signup_btn"><?php echo __("Sign up");?></button>
                        <button type="button" data-toggle="modal" data-target="#login" class="btn secondary_btn pull-right" ><?php echo __("Sign in");?></button>

                        <!-- Signup -->
                        <div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"><?php echo __("Sign up for a free account");?></h2>
                            </div>

                            <div class="modal-body">
                                <form class="form-horizontal" name="login" action="<?php echo BASE_URL;?>pages/signup" method="post">
								<input type="hidden" name="test_email" value="0" id="test_email">
                                    <div class="control-group" id="sign_up_email">
                                        <label class="control-label" for="inputInfo"><?php echo __("Email");?></label>
                                        <div class="controls">
                                            <input type="text" id="signup_email" name="data[email]" placeholder="Email">
                                             <span class="help-inline" id="sign_up_email_error"></span>
                                        </div>
                                    </div>
                                    <div class="control-group" id="sign_up_pwd">
                                        <label class="control-label" for="inputPassword"><?php echo __("Password");?></label>
                                        <div class="controls">
                                            <input type="password" id="signup_password" name="data[password]" placeholder="Password">
											<span class="help-inline" id="sign_up_pwd_error"></span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" id="signup_btn" class="btn btn-primary "><?php echo __("Sign up");?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                         <!-- Login -->
                        <div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                                       <div class="modal-header" id="sign1">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"><? echo __("Sign in to your account");?></h2>
                            </div>

                            <div class="modal-body"  id="sign">
                                    <form class="form-horizontal" name="login" id="login_form" action="<?php echo BASE_URL;?>pages/signin" method="post">
									<input type="hidden" value="0" name="login_test" id="login_test">
                                    <div class="control-group" id="log_in_email">
                                        <label class="control-label" for="inputInfo"><?php echo __("Email");?></label>
                                        <div class="controls">
                                            <input type="text" id="login_email" placeholder="Email" name="data[email]">
											<span class="help-inline" id="login_email_error"></span>
                                        </div>
                                    </div>
                                    <div class="control-group" id="log_in_pwd">
                                        <label class="control-label" for="inputPassword"><?php echo __("Password");?></label>
                                        <div class="controls">
                                            <input type="password" id="login_password" placeholder="Password" name="data[password]">
											<span class="help-inline" id="login_pwd_error"></span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn btn-primary" id="login_btn"><?php echo __("Sign in");?></button>
											<a id="forget" onClick="showpass(id)" style="cursor:pointer;"><?php echo __("Forgot password?");?></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Forget Password-->
                             <div class="modal-header" id="forget1" style="display:none">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"><? echo __("Forgot password");?></h2>
                            </div>
                            
                            <div class="modal-body" id="forget2" style="display:none">
                                <form class="form-horizontal" name="forget" id="forget_form" action="<?php echo BASE_URL;?>pages/forget" method="post">
                                    <div class="control-group" id="forget_error">
                                        <label class="control-label" for="inputInfo"><?php echo __("Email");?></label>
                                        <div class="controls">
                                            <input type="text" id="forget_email" name="data[email]" placeholder="Email">
											<span class="help-inline" id="forget_pwd_error"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn btn-primary" id="forget_btn"><?php echo __("Submit");?></button>
											<a id="none" onClick="showpass(id)" style="cursor:pointer;"><?php echo __("Sign in");?></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                    <?php } else {?>
                     <div class="pull-right acc_settings_menu">
                    <span class="profile_pic pull-left"><img src="<?php echo Router::url('/'); ?>img/page/profile_pic_mini.jpg" alt=""></span>
                    <ul class="pull-left unstyled">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, John <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo BASE_URL?>pages/dashboard"><i class="icon-home"></i> Dashboard</a></li>
                                <li><a href=""><i class="icon-user"></i> My Account</a></li>
                                <li><a href=""><i class="icon-cog"></i> Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo BASE_URL?>pages/logout"><i class="icon-off"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php } //echo 'per'.$_SESSION['percentage'];?>
                </div>
            </div>
            <div class="color_bar"></div>
			
	<?php echo $this->fetch('content'); ?>
	
	
 <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">  
                    <section class="span8 pull-left footer-links">
                        <ul class="unstyled inline">
                            <li><a href="<?php echo Router::url('/'); ?>"><?php echo __("Home");?></a></li>
                            <li><a href="<?php echo Router::url('/'); ?>staticpages/about"><?php echo __("About us");?></a></li>
                            <li><a href="<?php echo Router::url('/'); ?>staticpages/contact"><?php echo __("Contact us");?></a></li>
                            <li><a href="<?php echo Router::url('/'); ?>staticpages/faq"><?php echo __("F.A.Q");?></a></li>
                            <li><a href="<?php echo Router::url('/'); ?>staticpages/partners"><?php echo __("Partners");?></a></li>
                            <li><a href="<?php echo Router::url('/'); ?>staticpages/terms"><?php echo __("Term of service");?></a></li>
                            <li><a href="<?php echo Router::url('/'); ?>staticpages/policy"><?php echo __("Privacy policy");?></a></li>
                        </ul> 
                        <p>© 2013 CVomg.com</p>
                    </section>
                </div>
            </div>
        </footer>
<?php	
		echo $this->html->script(array('page/vendor/jquery-1.9.1.min','page/vendor/bootstrap','page/plugins','page/main'));
?>

<script type="text/javascript">
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
</script>
		
  </body>
</html>