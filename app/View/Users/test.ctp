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

     <!--   <link rel="stylesheet" href="../css/normalize.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>-->
         <?php	
	
		//echo $this->html->script(array('user/main'));
		 
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
                                <li><a href="<?php echo BASE_URL?>pages/dashboard"><i class="icon-home"></i> Dashboard</a></li>
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
     <?php    if(($_SESSION['User']['username']=='sdsmca')) { ?>
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
                               <li><a href="" type="button" data-toggle="modal" data-target="#prof_exp" class="">Professional Experience</a></li>
                                <li><a href="" data-toggle="modal" data-target="#skils" type="button" >Skills</a></li>
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
        <div class="container"> 
            <div class="row brand-bar">
                <a class="brand  pull-left" href="#"><?php echo $new['User']['firstname']."\t".$new['User']['lastname']?></a>
                <nav class="navbar pull-right">
                    <ul class="nav">
                      <!--  <li class="active"><a href="#">Home</a></li>-->
                         <li><?php echo $this->html->link('Home',array('action'=>'.'));?></li>
                        <li><a href="#">Experience</a></li>
                        <li><?php echo $this->html->link('Blog',array('action'=>'blog'));?></li>
                        <li><a href="#">Education</a></li>
                        <li><a href="#">Interest</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <div class="row resume-body">
                <div class="span3 resume-profile-details" >
                    <h1><?php echo $new['User']['firstname']."\t".$new['User']['lastname']?></h1>
                    <div class="left-col-widget clearfix" id="info" style="display:block">
                    <?php echo $this->Html->image('user-images/small/'.$new['User']['image'],array('border'=>0,'width'=>'70','height'=>'70','alt'=>'Resume','class'=>'profile-photo')); ?> 
                       
                        <div class="info">
                         <?php //echo $cou['Country']['country_name']."<br>".$new['User']['city']."<br>".$new['User']['zipcode']?>  </div>
                         <a href="#" class="pull-right" id="edit_in">Edit</a>
                    </div>
                  <!--  edit info-->
                    <div class="left-col-widget clearfix" id="edit_info" style="display:none;">
                    <div class="profile_image">
                    <?php echo $this->Html->image('user-images/small/'.$new['User']['image'],array('border'=>0,'width'=>'70','height'=>'70','alt'=>'Resume','class'=>'profile-photo')); ?> 
                    <a href="" type="button" data-toggle="modal" data-target="#edit_pic" style="float:left">Edit photo</a>
                    </div>
                    <div class="info"> 
                    <div style="float:right">
                    <form class="" name="login" action="<?php echo BASE_URL;?>users/test" method="post">
                    <div class="identity_info">
                    <div class="field identity[country]">
                    <label for="identity[country]" class="label-value">Country</label>
                    <select name="data[country]" id="country" >
                    <option value="">[-- <?php echo __("Select",true);?> --]</option>
                    <?php 
                    foreach($catlist as $cat):
                    if($cat['Country']['iso_code2']==$new['User']['country']){ $sel = ' selected="selected"'; $couid = $cat['Country']['country_id'];} else { $sel = ''; $couid ='';}
                    echo '<option value="'.$cat['Country']['iso_code2'].'" '.$sel.'>'.$cat['Country']['country_name'].'</option>';			
                    endforeach;
                    ?>
                    </select>                                        
                    
                    </div>
                    <div class="field identity[city]">
                    
                    <label for="identity[state]" class="label-value">City</label>
                    <input class="text" name="data[city]" type="text" value="<?php if(!empty($new['User']['city'])) echo $new['User']['city'];?>"  />
                    </div>
                    
                    <div class="field identity[city]">
                    <label for="identity[state]" class="label-value">Zipcode</label>
                    <input class="text" name="data[zipcode]"  type="text" value="<?php if(!empty($new['User']['zipcode'])) echo $new['User']['zipcode'];?>" data />
                    </div>
                    </div>
                    <div class='options2' >		
                    <input class="save" type="submit" value="Save" name="save" />			
                    <a 	href="#">
                    <input class="cancel" type="button" id="edit_out" value="Cancel" />
                    </a>
                    <div class="clear"></div>			
                    </div>	
                    </form>
                    </div>
                    </div>
                    
                    
                    </div>
                    
                    <div id="edit_cont1" style="display:block">
                    <ul class="left-col-widget unstyled resume-contact"> 
                    
                        <li><i class="icon-envelope icon-white"></i><a href=""><?php echo $new['User']['email']?></a></li>
                        <?php if(!empty($new['User']['phone'])) {?>  <li><i class="icon-envelope icon-white"></i><a href=""><?php echo $new['User']['phone']?></a></li><?php }?>
                          <?php if(!empty($new['User']['im'])) {?>    <li><i class="icon-envelope icon-white"></i><a href=""><?php echo $new['User']['im']?></a></li><?php }?>
                        <li><i class="icon-list-alt icon-white"></i><a href="">Contact Form</a></li>
                      <li><i class="icon-white"></i> <a href="#" class="pull-right" id="edit_cont_in">Edit</a></li>
                  
                     </ul>
                    </div>
                    <!--Edit contact-->
                     <div id="edit_cont" style="display:none">
                      <ul class="left-col-widget unstyled resume-contact"> 
                       
                       <div class="cont_info">
                        <div style="float:">
                    <form class="" name="login" action="<?php echo BASE_URL;?>users/test" method="post">
                    <table width="100%">
                    <tr>
                    <td width="25%" valign="top">Phone</td>
                    <td> <input class="text" name="data[phone]" type="text" value="<?php if(!empty($new['User']['phone'])) echo $new['User']['phone'];?>"  /></td>
                    </tr>
                     <tr>
                    <td width="25%" valign="top"> <label for="identity[state]" class="label-value">Email</label></td>
                    <td> <input class="text" name="data[email]" type="text" value="<?php if(!empty($new['User']['email'])) echo $new['User']['email'];?>"  /></td>
                    </tr>
                     <tr>
                    <td width="25%" valign="top"> <label for="identity[state]" class="label-value">Skype</label></td>
                    <td> <input class="text" name="data[im]" type="text" value="<?php if(!empty($new['User']['im'])) echo $new['User']['im'];?>"  /></td>
                    </tr>
                    </table>
                   <div class='options2' >		
                    <input class="save" type="submit" value="Save" name="contact" />			
                    <a 	href="#">
                    <input class="cancel" type="button" id="edit_cont_out" value="Cancel" />
                    </a>
                    <div class="clear"></div>			
                    </div>
                    </form>
                    </div>
                       </div>
                        <li><i class="icon-white"></i> <a href="#" class="pull-right" id="edit_cont_out"></a></li>
                    </ul>
                    </div>
                    
                     <div style="display:block" id="about" >
                    <ul class="left-col-widget unstyled"> 
                    <h3>About Me</h3>
                    <li><?php echo $new['User']['about_me']?></li>
                    <li><i class="icon-white"></i> <a href="#" class="pull-right" id="about_in">Edit</a></li>
                    </ul>
                    </div>
                    <!--Edit About me-->
                     <div style="display:none" id="about1" >
                    <ul class="left-col-widget unstyled"> 
                    <h3>About Me</h3>
                    <div class="cont_info">
                    <form class="" name="login" action="<?php echo BASE_URL;?>users/test" method="post">
                    <table width="100%">
                    <td><textarea cols="3" rows="5" name="data[about_me]"><?php if(!empty($new['User']['about_me'])) echo $new['User']['about_me'];?></textarea>
                    </td>
                    </tr>
                    </table>
                   <div class='options2' >		
                    <input class="save" type="submit" value="Save" name="about" />			
                    <a 	href="#">
                    <input class="cancel" type="button" id="about_out" value="Cancel" />
                    </a>
                    <div class="clear"></div>			
                    </div>
                    </form>
                    </div>
                    </ul>
                    </div>
                    
                    <ul class="left-col-widget unstyled"> 
                        <h3>Professional Status</h3>
                        <li><?php echo $new['User']['professional']?></li>
                        <li><?php echo $new['User']['professional_status']?></li>
                    </ul>

                    <ul class="left-col-widget unstyled"> 
                        <h3>My Links</h3>
                        <li><?php echo $new['User']['social_links']?></li>
                      
                    </ul>
                </div>
                <!--<form class="" name="login" action="<?php echo BASE_URL;?>users/test" method="post">
                    <table width="100%">
                    <tr>
                    <td width="25%" valign="top">Phone</td>
                    <td> <input class="text" name="data[phone]" type="text" value="<?php if(!empty($new['User']['phone'])) echo $new['User']['phone'];?>"  /></td>
                    </tr>
                     <tr>
                    <td width="25%" valign="top"> <label for="identity[state]" class="label-value">Email</label></td>
                    <td> <input class="text" name="data[email]" type="text" value="<?php if(!empty($new['User']['email'])) echo $new['User']['email'];?>"  /></td>
                    </tr>
                     <tr>
                    <td width="25%" valign="top"> <label for="identity[state]" class="label-value">Skype</label></td>
                    <td> <input class="text" name="data[im]" type="text" value="<?php if(!empty($new['User']['im'])) echo $new['User']['im'];?>"  /></td>
                    </tr>
                    </table>
                   
                    </form>-->
              <!-- Edit Photo -->
              
              <div id="edit_pic" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <form class="form-inline" name="update" action="<?php echo Router::url('/'); ?>users/editphoto" method="post" style="margin-bottom:0px;" enctype="multipart/form-data">
                 <input type="hidden" name="data[uid]" value="<?php echo $new['User']['uid'];?>" />
                <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <input type="hidden" name="data[responsibility]"  value="" />
                  <h2 id="myModalLabel" style="font-size:15px; padding:0px; margin:0px;"><?php echo __("Photo Update");?></h2>
                </div>
                <div class="modal-body" style="padding-top:0px;" >
                
                  <div class="control-group" id="job_title_div">
                   <label class="control-label" for="inputInfo" id="prof" style="width:500px; font-size:14px;font-family: arial; font-size: 16px;font-weight: bold;"><?php echo __("Upload Photo");?></label>
                    <div class="controls">
                    <?php echo $this->Html->image('user-images/small/'.$new['User']['image'],array('border'=>0,'alt'=>'Resume','width'=>'70','height'=>'70','class'=>'profile-photo','style'=>'border:1px solid #ccc')); ?> 
                    <input type="file" placeholder="First Name" id="image_edit" name="data[image]" style="padding:2px; margin: 15px 0px 0px 50px; height:26px;"> 
                      <span class="help-inline" id="job_title_div_error"></span> </div>
                  </div>
                  
                </div>
                <div class="modal-footer">
                 
                  <label class="checkbox" style="display:block;">
                    <input type="checkbox" name="data[newsletter]">
                    <span style="margin-left:15px; float:left"><?php echo __("Display on Home page");?></span> </label>
                  <button type="submit" id="photo_btn" class="btn btn-primary "><?php echo __("Submit photo");?></button>
                </div>
    
    <!--</div>-->
          </form>
           </div>
              
              
              
              
              
                    <!--<div id="edit_pic" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                    <form action="photo" method="post" enctype="multipart/form-data" name="">
                    <div class="modal-header" style="margin-bottom:10px;padding-bottom:0px;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h2 id="myModalLabel"><?php echo __("Photo Update");?></h2>
                    </div>
                    
                    <div class="modal-body">  
                    <div class="control-group" id="whoru">
                    <label class="control-label" for="inputInfo"><?php echo __("Who are you?");?></label>
                    <div class="controls">
                    <input type="file" placeholder="First Name" id="user_first_name" name="data[firstname]"> 
                  
                    <span class="help-inline" id="whoru_error"></span>
                    </div>
                    </div>
                 
                    </div>
                    </form>
                    </div>-->
                                
                <!--Skills-->
                
                <div id="skils" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
