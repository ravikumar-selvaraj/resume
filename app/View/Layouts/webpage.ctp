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
		echo $this->html->script(array('jquery','page/vendor/modernizr-2.6.2-respond-1.1.0.min','jquery.validationEngine','chart/highcharts','chart/exporting'));
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
                    <span class="profile_pic pull-left">
                    <?php if(empty($user['User']['image'])) { ?>
                    <img src="<?php echo Router::url('/'); ?>img/page/profile_pic_mini.jpg" alt="CVomg - The best way to show yourself"> <?php } else { ?>
                     <img src="<?php echo Router::url('/'); ?>img/user-images/small/<?php echo $user['User']['image']; ?>" >
                    <?php } ?>
                    
                    <!--<img src="<?php echo Router::url('/'); ?>img/page/profile_pic_mini.jpg" alt="">--></span>
                    <ul class="pull-left unstyled">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $_SESSION['User']['firstname'] ;?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo BASE_URL?>pages/dashboard"><i class="icon-home"></i> Dashboard</a></li>
                               <!-- <li><a href=""><i class="icon-user"></i> My Account</a></li>-->
                                <li><a href="<?php echo BASE_URL?>pages/setting"><i class="icon-cog"></i> Settings</a></li>
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
		echo $this->html->script(array('page/vendor/jquery-1.9.1.min','page/vendor/bootstrap','page/plugins','page/main','bootbox'));
		
		
?>

<script>
<?php
$msg = $this->Session->flash();
if(!empty($msg)){ ?>
	bootbox.alert(<?php echo $msg;?>);	
<?php }?>
</script>


<script type="text/javascript">
$(document).ready(function(){
	
	// forget password
	
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
		
		
	// sign up
		
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
	
	
	// login
	
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
	
	// user activation
	
	$("#useractive_btn").click(function(){
		var gender 	= $("#user_gender").val();
		var fname 	= $("#user_first_name").val();
		var lname 	= $("#user_last_name").val();
		var uname 	= $("#user_username").val();
		var resume 	= $("#user_resume_title").val();
		var status 	= $("#user_status").val();
		var prof 	= $("#user_prof_status").val();
		var terms 	= $("#terms").val();
		var test_url = $("#test_url").val();
		
		//alert(test_url);
	
		if((gender == '') || (fname == '') || (lname == '')){
			$("#whoru").addClass("error");
			$("#whoru_error").html("<?php echo __("Firstname / Lastname required");?>");
			return false;
		} else {
			$("#whoru").removeClass("error");
			$("#whoru_error").html("");
		}		
		
		 if(uname == '') {
			$("#cvomg_url").addClass("error");
			$("#cvomg_url_error").html("<?php echo __("Username required");?>");
			return false;
		} else {
			$("#cvomg_url").removeClass("error");
			$("#cvomg_url_error").html("");
		}
		
		 if(resume == '') {
			$("#resume_title").addClass("error");
			$("#resume_title_error").html("<?php echo __("Resume title required");?>");
			return false;
		} else { 
			$("#resume_title").removeClass("error");
			$("#resume_title_error").html("");
		}
		
		 if(status == '') {
			$("#status").addClass("error");
			$("#status_error").html("<?php echo __("Proffessional status required");?>");
			return false;
		} else {
			$("#status").removeClass("error");
			$("#status_error").html("");
		}
		
		 if(prof == '') {
			$("#availability").addClass("error");
			$("#availability_error").html("<?php echo __("Availability required");?>");
			return false;
		} else {
			$("#availability").removeClass("error");
			$("#availability_error").html("");
		}
		
		 if (!$("#terms").is(':checked')) {
			$("#terms_error").html("<font color='#b94a48'><?php echo __("Terms required");?></font>");
			return false;
		} else {
			$("#terms_error").html("");
		}
		
		 if(test_url == 0){
			$("#cvomg_url").addClass("error");
			$("#cvomg_url_error").html("<?php echo __("Usename is already taken");?>");
			return false;
		} else {
			$("#cvomg_url").removeClass("error");
			$("#cvomg_url_error").html("");
		}
	});
	
	$("#user_username").blur(function(){
		var username = $(this).val();
		$.ajax({
					type: "POST",
					url: "<?php echo BASE_URL?>pages/check_username",
					data: "user="+username,
					success: function(msg){ 
						if(msg == 'failed'){
							$("#cvomg_url").addClass("error");
							$("#cvomg_url_error").html("<?php echo __("Username is already taken");?>");
							$("#test_url").val(0);
						} else {
							$("#cvomg_url").removeClass("error");
							$("#cvomg_url_error").html(""); 
							$("#test_url").val(1);
						}
					}
					});
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

<script type="text/javascript">
$("#set_user_btn").click(function(){
	var set_email = $("#set_email").val();
	var set_fname = $("#set_fname").val();
	var set_lname = $("#set_lname").val();
	var set_gender = $("#set_gender").val();
	var test = $("#test_set_email").val();
	var validEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	
	if(set_email == '') {
			$("#set_email_div").addClass("error");
			$("#set_email_error").html("<?php echo __("Email required");?>");
			return false;
		} else {
			$("#set_email_div").removeClass("error");
			$("#set_email_error").html("");
		}
	
	 if(!validEmail.test(set_email)){
			$("#set_email_div").addClass("error");
			$("#set_email_error").html("<?php echo __("Invalid email");?>");
			return false;
		} else {
			$("#set_email_div").removeClass("error");
			$("#set_email_error").html("");
		}
		
	 /*if(test == 0){
			$("#set_email_div").addClass("error");
			$("#set_email_error").html("<?php echo __("Email is already taken");?>");
			return false;
		} else {
			$("#set_email_div").removeClass("error");
			$("#set_email_error").html("");
		}*/
		
	if(set_fname == '') {
			$("#set_fname_div").addClass("error");
			$("#set_fname_error").html("<?php echo __("Firstname required");?>");
			return false;
		} else {
			$("#set_fname_div").removeClass("error");
			$("#set_fname_error").html("");
		}
		
	if(set_lname == '') {
			$("#set_lname_div").addClass("error");
			$("#set_lname_error").html("<?php echo __("Lastname required");?>");
			return false;
		} else {
			$("#set_lname_div").removeClass("error");
			$("#set_lname_error").html("");
		}
		
	if(set_gender == '') {
			$("#set_gender_div").addClass("error");
			$("#set_gender_error").html("<?php echo __("Gender required");?>");
			return false;
		} else {
			$("#set_gender_div").removeClass("error");
			$("#set_gender_error").html("");
		}
		
	});
	
	$("#set_email").blur(function(){
		var email = $(this).val();
		var uid = $("#set_uid").val();
		var validEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if (validEmail.test(this.value)) {
        		$.ajax({
					type: "POST",
					url: "<?php echo BASE_URL?>pages/check_set_email",
					data: "email="+email+"&uid="+uid,
					success: function(msg){ 
						if(msg == 'failed'){
							$("#set_email_div").addClass("error");
							$("#set_email_error").html("<?php echo __("Email is already taken");?>");
						} else {
							$("#set_email_div").removeClass("error");
							$("#set_email_error").html(""); 
							$("#test_set_email").val(1);
						}
					}
					});
    		}
   		 else {
        		$("#set_email_div").addClass("error");
				$("#set_email_error").html("<?php echo __("Invalid email");?>");                                
    		}
		
		});
</script> 

<script type="text/javascript">
$("#set_pwd_button").click(function(){
	var set_cur_pwd = $("#set_cur_pwd").val();
	var set_new_pwd = $("#set_new_pwd").val();
	var set_con_pwd = $("#set_con_pwd").val();
	var chk_pwd = $("#chk_pwd").val();
	
	if(set_cur_pwd == ''){
		$("#set_cur_pwd_div").addClass("error");
		$("#set_cur_pwd_error").html("<?php echo __("Current password required");?>");
		return false;
	} else {
		$("#set_cur_pwd_div").removeClass("error");
		$("#set_cur_pwd_error").html("");
	}
	
	if(chk_pwd == 0){
		$("#set_cur_pwd_div").addClass("error");
		$("#set_cur_pwd_error").html("<?php echo __("Check your current password");?>");
		return false;
	} else {
		$("#set_cur_pwd_div").removeClass("error");
		$("#set_cur_pwd_error").html("");
	}
	
	if(set_new_pwd == ''){
		$("#set_new_pwd_div").addClass("error");
		$("#set_new_pwd_error").html("<?php echo __("New password required");?>");
		return false;
	} else {
		$("#set_new_pwd_div").removeClass("error");
		$("#set_new_pwd_error").html("");
	}
	
	if(set_con_pwd == ''){
		$("#set_con_pwd_div").addClass("error");
		$("#set_con_pwd_error").html("<?php echo __("Confirm password required");?>");
		return false;
	} else {
		$("#set_con_pwd_div").removeClass("error");
		$("#set_con_pwd_error").html("");
	}
	
	if(set_new_pwd != set_con_pwd) {
		$("#set_con_pwd_div").addClass("error");
		$("#set_con_pwd_error").html("<?php echo __("Password fields do not match");?>");
		return false;
	} else { 
		$("#set_con_pwd_div").removeClass("error");
		$("#set_con_pwd_error").html("");
	}
});

$("#set_cur_pwd").blur(function(){
		var pwd = $(this).val();
		var user_key = $("#set_user_key").val();
        		$.ajax({
					type: "POST",
					url: "<?php echo BASE_URL?>pages/check_user_pwd",
					data: "pwd="+pwd+"&user_key="+user_key,
					success: function(msg){ 
						if(msg == 'failed'){
							$("#set_cur_pwd_div").addClass("error");
							$("#set_cur_pwd_error").html("<?php echo __("Check your current password");?>");
							$("#chk_pwd").val(0);
						} else {
							$("#set_cur_pwd_div").removeClass("error");
							$("#set_cur_pwd_error").html(""); 
							$("#chk_pwd").val(1);
						}
					}
					});
    	
		
		});


</script>

<?php
                            $today = date("D M j G:i:s T Y"); 
                            $d = new DateTime();
                            $one=$d->format('dM');
                            $d->modify('-7 day');
                            $two=$d->format('dM');
                            $d->modify('-7 day');
                            $three=$d->format('dM');
                            $d->modify('-7 day');
                            $four=$d->format('dM');
                            $d->modify('-7 day');
                            $five=$d->format('dM');
                            
                             ?> 
                        
                        <?php
							//$exp=count(ClassRegistry::init('Profileview')->find('all',array('conditions'=>array('uid'=>$_SESSION['User']['uid']))));
						 //echo 'Profile View ---'.$exp; ?>
                         <script>
    $(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'charting',
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: '',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
			grid: {
                backgroundColor: { colors: ["#D1D1D1", "#7A7A7A"] }
            },
			 backgroundColor: {
	                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
	                stops: [
	                    [0, '#333'],
	                    [1, '#FFF']
	                ]
	            },

            xAxis: {
                categories: ['', '<?php echo $five; ?>', '', '', '', '','', '', '<?php echo $four; ?>', '', '', '','', '', '', '<?php echo $three; ?>', '', '','', '', '', '', '<?php echo $two; ?>', '','', '', '', '', '', '<?php echo $one; ?>']
            },
            yAxis: {
                title: {
                    text: 'Page Views'
                },
				min: 0,
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+this.x +': '+ this.y +'°C';
						//return '<b>'+ this.series.name +'</b><br/>'+ this.y +'peoples';
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: 10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: 'Views',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 5, 0, 3, 0, 9, 0]
            }]
        });
    });
    
});
  </script>
  </body>
  
</html>