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
		echo $this->html->css(array('user/normalize.min','user/bootstrap','user/main')); 
		echo $this->html->script(array('user/vendor/modernizr-2.6.2-respond-1.1.0.min'));
		 
?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
<?php 
	$app = explode('app', $_SERVER['PHP_SELF']);
	$url = explode($app[0], $_SERVER['REQUEST_URI']);
if(isset($_SESSION['User']['uid'])) {
?>
        <!-- RESUME NAV BAR -->
        <div class="row resume-navigations">
         <?php echo  $this->html->link($this->html->image('logo-small.png',array('border'=>0,'alt'=>'logo','width'=>'150','height'=>'40','class'=>'brand cv-logo pull-left')),array('controller'=>'pages','action'=>'index'),array('escape'=>false)); ?>
           <!-- <a href="#" class="brand span3 pull-left"><img src="<?php echo Router::url('/'); ?>/img/logo-small.png" alt=""></a>-->
        
			
             <div class="pull-right acc_settings_menu">
                    <span class="profile_pic pull-left"><img src="<?php echo Router::url('/'); ?>/img/profile_pic_mini.jpg" alt=""></span>
                    <ul class="pull-left unstyled">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo BASE_URL?>/pages/dashboard"><i class="icon-home"></i> Dashboard</a></li>
                                <li><a href=""><i class="icon-user"></i> My Account</a></li>
                                <li><a href=""><i class="icon-cog"></i> Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo BASE_URL?>pages/logout"><i class="icon-off"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
        </div>

        <!-- RESUME CONFIG -->
     <?php    if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
        <div class="row resume-config">
            <ul class="nav nav-tabs resume-config-tabs" id="resume-config-tabs">
                <li class="open"><a href="#add-content">Add Content</a></li>
                <li class="open"><a href="#design">Design</a></li>
                <li><a href="#share">Share</a></li>
                <li><a href="#recommend">Recommendations</a></li>
                <li><a href="#settings">Settings</a></li>
            </ul>
     
            <div class="tab-content resume-cont" style="display:none;">
                <div class="tab-pane active" id="add-content">
                    <ul class="nav nav-tabs sub-config" id="sub-config">
                        <li class=""><a href="#home">Essential</a></li>
                        <li><a href="#profile">Portfolio</a></li>
                        <li><a href="#messages">Import</a></li>
                    </ul>
 
                    <div class="tab-content">
                        <div class="tab-pane active proff-exp-btn" id="home">
                            <ul class="unstyled inline">
                               <!--<li><a href="<?php echo BASE_URL?>users/userprof" type="button" data-toggle="modal" data-target="#prof_exp" class="">Professional Experience</a></li>-->
                                <li><a href="<?php echo BASE_URL?><?php echo $new['User']['username']; ?>/userprof"   type="button" >Professional Experience</a></li>
                                <li><a href="" data-toggle="modal" data-target="#skills" type="button" >Skills</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#education" class="">Education</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#interests" class="">Interests</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#basic" class="">Photo + Basic info</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#about" class="">About me</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#contacts" class="">Contact</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#mylink" class="">My Links</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#blogs" class="">Blog</a></li>
                            </ul>
                        </div>

                        <!-- Signup -->
                        <div id="proff-exp" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                        <div class="tab-pane" id="profile">..sdfsdfs.</div>
                        <div class="tab-pane" id="messages">.sdfsdfs..</div>
                        <div class="tab-pane" id="settings">.sdfsdfs..</div>
                    </div>
                </div>
                <div class="tab-pane" id="design">sdfsdfdsfds</div>
                <div class="tab-pane" id="share">sdfsdfsdf</div>
                <div class="tab-pane" id="recommend">sdfsd</div>
                <div class="tab-pane" id="settings">sdfsd</div>
            </div>
        </div>
 <?php } } else {?> 
   <div class="row resume-navigations">
   <?php echo  $this->html->link($this->html->image('logo-small.png',array('border'=>0,'alt'=>'logo','width'=>'150','height'=>'40','class'=>'brand cv-logo pull-left')),array('controller'=>'pages','action'=>'index'),array('escape'=>false)); ?>
      
             <div class="pull-right acc_settings_menu">
                    <ul class="pull-left unstyled">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                        </li>
                    </ul>
                </div>
                
        </div>     
 <?php }?> 
        <!-- MAIN HEADER -->
      <?php echo $this->fetch('content'); ?>  
           
       <!-- Professional Experience -->
              
               
                               
                <!--Skills-->
                
                <div id="skills" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"><?php echo __("Add Skill");?></h2>
                            </div>

                            <div class="modal-body" id="for_count">
                                <form class="form-horizontal" name="login" action="<?php echo BASE_URL;?>users/skills" method="post">
                                    <div class="control-group" id="sign_up_email">
                                        <label class="control-label" for="inputInfo"><?php echo __("Skill Area");?></label>
                                        <div class="controls">
                                            <input type="text" id="skill_val" name="data[skill][]">
                                             <span class="help-inline" id="skill_val_error"></span>
											 <a id="skill_add_btn" class="btn btn-mini btn-primary"><?php echo __("Add");?></a>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" id="signup_btn" class="btn btn-primary "><?php echo __("Submit");?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        
                 <!--Education    -->   
                        
                        <div id="education" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
                        
                        <!--Interests-->
                        
                        <div id="interests" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
                        
                      <!--  Photo + Basic info-->
                        
                        <div id="basic" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
                        
                       <!-- About me-->
                        
                        <div id="about" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
                        
                        <!--Contact-->
                        
                        <div id="contacts" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
                        
                        
                       <!-- My Links-->
                       
                        <div id="mylink" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
                        
                        
                        <!--Blog-->
                        
                        <div id="blogs" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
						
 <?php	
		echo $this->html->script(array('page/vendor/jquery-1.9.1.min','user/bootstrap','user/plugins','user/main'));
?>
     <script type="text/javascript">
$(document).ready(function(){
		$(".open").click(function(){
		$('.tab-content').css('display','block');
		//alert('hi');
		});
		

 });
</script> 
<script>
        //Photo and country 
		$("#edit_in").click(function(){
		$('#edit_info').css('display','block');
		$('#info').css('display','none');
		});
		$("#edit_out").click(function(){
		$('#edit_info').css('display','none');
		$('#info').css('display','block');
		});
		//Contact
		$("#edit_cont_out").click(function(){
		$('#edit_cont1').css('display','block');
		$('#edit_cont').css('display','none');
		});
		$("#edit_cont_in").click(function(){
		$('#edit_cont').css('display','block');
		$('#edit_cont1').css('display','none');
		});
		
		
</script>
						
<script type="text/javascript">
		$("#skill_btn").click(function(){
			alert('ghh');
			var skill = $("#skill_val").val();
			if(skill ==''){
				$("#skill_val_div").addClass("error");
				$("#skill_val_error").html("<?php echo __("Atleast one skill required");?>");
				return false;
			}
		});

			$("#skill_add_btn").click(function(){			
							$("#for_count div:last").parent().before('<div class="control-group"><label class="control-label" for="inputInfo"><?php echo __("Skill Area");?></label><div class="controls"><input type="text" id="signup_email" name="data[skill][]"><span class="help-inline" id="skills_error"></span></div></div>');
							return false;
					});
</script>
     </body>
</html>
    