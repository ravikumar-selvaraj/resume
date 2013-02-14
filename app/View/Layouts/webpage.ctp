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
                    <a href="" id="brand" class="span3 pull-left"><img src="<?php echo Router::url('/'); ?>img/page/logo.png" alt="CVomg - The best way to show yourself"></a>
                    <div class="span3 pull-right ">
                        <button type="button" data-toggle="modal" data-target="#signup" class="btn primary_btn signup_btn"><?php echo __("Sign up");?></button>
                        <button type="button" data-toggle="modal" data-target="#login" class="btn secondary_btn pull-right" ><?php echo __("Sign in");?></button>

                        <!-- Signup -->
                        <div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"><?php echo __("Sign up for a free account");?></h2>
                            </div>

                            <div class="modal-body">
                                <form class="form-horizontal" name="login" action="<?php echo BASE_URL;?>pages/signup" method="post">
                                    <div class="control-group error">
                                        <label class="control-label" for="inputInfo"><?php echo __("Email");?></label>
                                        <div class="controls error">
                                            <input type="text" id="inputError" name="data[email]" placeholder="Email">
                                             <span class="help-inline"><?php echo __("Username is already taken");?></span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"><?php echo __("Password");?></label>
                                        <div class="controls">
                                            <input type="password" id="inputPassword" name="data[password]" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn btn-primary "><?php echo __("Sign up");?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                         <!-- Login -->
                        <div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                       <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 id="myModalLabel"><? echo __("Sign in to your account");?></h2>
                            </div>

                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label" for="inputInfo"><?php echo __("Email");?></label>
                                        <div class="controls error">
                                            <input type="text" id="inputError" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"><?php echo __("Password");?></label>
                                        <div class="controls">
                                            <input type="password" id="inputPassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn btn-primary "><?php echo __("Sign in");?></button>
											<a href="">Forgot password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                            <li><a href="<?php echo Router::url('/'); ?>"><?php echo __("Contact us");?></a></li>
                            <li><a href="<?php echo Router::url('/'); ?>"><?php echo __("F.A.Q");?></a></li>
                            <li><a href="<?php echo Router::url('/'); ?>"><?php echo __("Partners");?></a></li>
                            <li><a href="<?php echo Router::url('/'); ?>"><?php echo __("Term of service");?></a></li>
                            <li><a href="<?php echo Router::url('/'); ?>"><?php echo __("Privacy policy");?></a></li>
                        </ul> 
                        <p>© 2013 CVomg.com</p>
                    </section>
                </div>
            </div>
        </footer>
<?php	
		echo $this->html->script(array('page/vendor/jquery-1.9.1.min','page/vendor/bootstrap','page/plugins','page/main'));
?>
		
  </body>
</html>