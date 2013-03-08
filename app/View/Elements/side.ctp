
<?php 
		$app = explode('app', $_SERVER['PHP_SELF']);
		$url = explode($app[0], $_SERVER['REQUEST_URI']);
		$url = explode('/', $url[1]);
 
if(isset($_SESSION['User']['uid'])) {
?>
        <!-- RESUME NAV BAR -->
        <div class="row resume-navigations">
         <?php echo  $this->html->link($this->html->image('logo-small.png',array('border'=>0,'alt'=>'logo','width'=>'20','height'=>'20','class'=>'brand span2 pull-left')),array('controller'=>'pages','action'=>'index'),array('escape'=>false)); ?>
		 <?php echo  $this->html->link($this->html->image('dashboard_icon.png',array('border'=>0,'alt'=>'logo','class'=>'brand cv-logo pull-left','width'=>'20','height'=>'20')),array('controller'=>'pages','action'=>'dashboard'),array('escape'=>false,'class'=>'return-dash')); ?>
         <?php echo  $this->html->link('My Resume',array('controller'=>'','action'=>$_SESSION['User']['username']),array('class'=>'site_links')); ?>
         
        
			
             <div class="pull-right acc_settings_menu">
                    <span class="profile_pic pull-left">
                   <?php
				 
				   	$img=ClassRegistry::init('User')->find('first',array('conditions'=>array('uid'=>$_SESSION['User']['uid'])));
				    if(empty($img['User']['image']) && $img['User']['username']==Configure::read('userpage')) { ?>
                    <img src="<?php echo Router::url('/'); ?>img/page/profile_pic_mini.jpg" alt="CVomg - The best way to show yourself" height="20" width="20"> <?php } else { ?>
                     <img src="<?php echo Router::url('/'); ?>img/user-images/small/<?php echo $img['User']['image']; ?>" height="20" width="20">
                    <?php } ?> 
                    
                    
                    <!--<img src="<?php echo Router::url('/'); ?>/img/profile_pic_mini.jpg" alt="">--></span>
                    <ul class="pull-left unstyled">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo BASE_URL?>pages/dashboard"><i class="icon-home"></i> Dashboard</a></li>
                              <!--  <li><a href=""><i class="icon-user"></i> My Account</a></li>-->
                                <li><a href="<?php echo BASE_URL?>pages/setting"><i class="icon-cog"></i> Settings</a></li>
                               
                                <li class="divider"></li>
                                <li><a href="<?php echo BASE_URL?>pages/logout"><i class="icon-off"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
        </div>

        <!-- RESUME CONFIG -->
     <?php  
	
	   if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?>
        <div class="row resume-config">
            <ul class="nav nav-tabs resume-config-tabs" id="resume-config-tabs">
				<li class="" id="addin" style="display:block"><a href="#add-content" class="test">Add Content</a></li>
                <li class="" id="addout" style="display:none"><a href="#add-content" class="test">Add Content</a></li>
                <li><a href="#design" class="test">Design</a></li>
                <li><a href="#share" class="test">Share</a></li>
                <li><a href="#recommend" class="test">Recommendations</a></li>
                <li><a href="#settings" class="test">Settings</a></li>
            </ul>
          
            <div class="tab-content resume-cont" style="display:none;" id="addcon">
                <div class="tab-pane active" id="add-content">
                    <ul class="nav nav-tabs sub-config" id="sub-config">
						<li class="active"><a href="#home" >Essential</a></li>
                        <li><a href="#profile">Portfolio</a></li>
                        <li><a href="#messages">Import</a></li>
						
                    </ul>
 
                    <div class="tab-content">
                        <div class="tab-pane active proff-exp-btn" id="home">
							<ul class="unstyled inline config-menus">
                                <li class="proff-exp-nav"><a href="" type="button" data-toggle="modal" data-target="#prof_exp" class=""><span>Professional Experience</span></a></li>
                                <li class="skills-nav"><a href="" data-toggle="modal" data-target="#skills" type="button" ><span>Skills</span></a></li>
                                <li class="educ-nav"><a href="" type="button" data-toggle="modal" data-target="#education" class=""><span>Education</span></a></li>
                                <li class="interest-nav"><a href="" type="button" data-toggle="modal" data-target="#interests" class=""><span>Interests</span></a></li>
                                <li class="info-nav"><a href="" type="button" data-toggle="modal" data-target="#basic" class=""><span>Photo + Basic info</span></a></li>
								<?php if(empty($new['User']['about_me'])) {?>
                                <li class="about-nav"><a href="" type="button" data-toggle="modal" data-target="#aboutme" class=""><span>About me</span></a></li>
								<?php } else {?>
                                <li class="about-nav"><a href="#"><span>About me</span></a></li>
								<?php } ?>
                                <li class="contact-nav"><a href="" type="button" data-toggle="modal" data-target="#contacts" class=""><span>Contact</span></a></li>
                                <li class="my-links-nav"><a href="" type="button" data-toggle="modal" data-target="#mylink" class=""><span>My Links</span></a></li>
                                <li class="blog-nav"><a href="" type="button" data-toggle="modal" data-target="#blogs" class=""><span>Blog</span></a></li>
                            </ul>					
                            
                        </div>
						
						<!-- Portfolio -->
						<div class="tab-pane" id="profile">
                            <ul class="unstyled inline config-menus">
                                <li class="photo-nav"><a href="" type="button" data-toggle="modal" data-target="#port_photo" class=""><span>Photo</span></a></li>
                                <li class="video-nav"><a href="" data-toggle="modal" data-target="#port_video" type="button" class=""><span>Video</span></a></li>
                                <li class="audio-nav"><a href="" type="button" data-toggle="modal" data-target="#port_audio" class=""><span>Audio</span></a></li>
                                <li class="word-nav"><a href="" type="button" data-toggle="modal" data-target="#port_pdf" class=""><span>Word/PDF</span></a></li>
                                <li class="presentation-nav"><a href="" type="button" data-toggle="modal" data-target="#port_presentation" class=""><span>Presentation</span></a></li>
                            </ul>
                        </div>                        
                        
                          <!--Import-->
                        <div class="tab-pane" id="messages">
							<ul class="unstyled inline config-menus">
                               <li class="linkedin-nav"><a href="<?php echo BASE_URL;?>linkedin" type="button"  class=""><span>Linkedin</span></a></li>
                            </ul>
						</div>
						
                    </div>
                </div>
                <div class="tab-pane" id="design"> 
                	 <img src="<?php echo BASE_URL;?>img/template1.png" width="200" height="200"  class="templateimg" id="yellow" />
                 	 <img src="<?php echo BASE_URL;?>img/template2.jpg" width="200" height="200"  class="templateimg" id="red" />
                 	 <img src="<?php echo BASE_URL;?>img/template3.jpg" width="200" height="200"  class="templateimg" id="blue" />
                  	 <img src="<?php echo BASE_URL;?>img/template4.jpg" width="200" height="200"  class="templateimg" id="black" />
                  </div>
                <div class="tab-pane" id="share">
					<ul class="nav nav-tabs sub-config" id="sub-config">
						<li class="active"><a href="#social_share" >Share my resume on:</a></li>
                    </ul>
						<div class="tab-content">
						<div class="tab-pane active" id="social_share">
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox">   
							<div class="custom_images">
								<ul class="unstyled inline config-menus">
									<li class="facebook-nav"><a class="addthis_button_facebook"><span>Facebook</span></a></li>
									<li class="twitter-nav"><a class="addthis_button_twitter"><span>Twitter</span></a></li>
									<li class="linkedin-nav"><a class="addthis_button_linkedin"><span>Linkedin</span></a></li>
								</ul>
							</div>
						</div>
						<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5138450745755372"></script>
						<!-- AddThis Button END -->
						</div>
                </div>
				</div>
                <div class="tab-pane" id="recommend">
            <a href="#" style="cursor:pointer;" class="btn btn-large btn-primary disabled " data-toggle="modal" data-target="#recommendmy">Recommentation</a>						                </div>
                <div class="tab-pane" id="settings">
				
					<ul class="nav nav-tabs sub-config" id="sub-config">
						<li class="active"><a href="#general_settings" >General</a></li>
                        <li><a href="#privacy_settings">Privacy</a></li>
                    </ul>
						<div class="tab-content">
							<div class="tab-pane active" id="general_settings">
								<div class="control-group">
									<label class="control-label" for="Title">Resume Title</label>
										<div class="controls">
											<input type="hidden" id="general_uid" name="data[uid]" value="<?php echo $this->Session->read('User.uid');?>"  />
											<input type="text" id="general_resume_title" name="data[resume_title]" value="<?php echo $this->Session->read('User.resume_title');?>"  />
										</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Description">Description</label>
										<div class="controls">
										<textarea id="general_resume_desc" rows="3" name="data[resume_desc]" style="width:350px;"><?php echo $this->Session->read('User.resume_desc');?></textarea>
										</div>
								</div>
								<div class="control-group">
									<div class="controls">										
										<button type="submit" id="general_settings_edit"  class="btn btn-primary">Save</button>
										<span class="help-inline" id="general_success"></span>
									</div>
								</div>
							</div>
							
							<div class="tab-pane" id="privacy_settings">
								
								<div class="well well-small" style="width:500px;"><span>Publish my resume on the web</span>
									   <div class="switch pull-right" id="publish_resume">
									   	<input type="hidden" id="publish_uid" name="data[uid]" value="<?php echo $this->Session->read('User.uid');?>"  />
									   	<input type="checkbox" id="publish_resume_box" value="1" <?php if($this->Session->read('User.webpage_view')== 1) echo 'checked="checked"';?> />
									</div>
									<span class="help-inline" id="publish_resume_box_success"></span>
								</div>
								<div class="well well-small" style="width:500px;"><span>Protect my resume with a password</span>
										<div class="switch pull-right" id="protect_resume">
										<input type="hidden" id="protect_uid" name="data[uid]" value="<?php echo $this->Session->read('User.uid');?>"  />
									   	<input type="checkbox" id="protect_resume_box" value="1" <?php if($this->Session->read('User.set_password')== 1) echo 'checked="checked"';?> />
										</div>
										
										<div class="controls" id="password_block" <?php if($this->Session->read('User.set_password') != 1) echo 'style="display:none;"';?>>
										<input type="text" id="protect_pwd" name="data[protect_pwd]" style="margin:2px;" value="<?php if($this->Session->read('User.set_password') == 1) echo $this->Session->read('User.resume_password');?>"  />										
										<button type="submit" id="password_block_btn"  class="btn btn-primary">Save</button>
										</div>
										<span class="help-inline" id="password_block_success"></span>
								
								</div>
								<div class="well well-small" style="width:500px;">
										<span>Broadcast your resume on search engines</span>
										<div class="switch pull-right" id="broadcast_resume">
										<input type="hidden" id="broadcast_uid" name="data[uid]" value="<?php echo $this->Session->read('User.uid');?>"  />
									   	<input type="checkbox" id="broadcast_resume_box" value="1" <?php if($this->Session->read('User.broad_resume')== 1) echo 'checked="checked"';?> />
										</div>
										<span class="help-inline" id="broadcast_resume_success"></span>
								</div>
								
							</div>
						</div>
					
				</div>
            </div>
        </div>
 <?php } } else {?> 
   <div class="row resume-navigations">
   <?php echo  $this->html->link($this->html->image('logo-small.png',array('border'=>0,'alt'=>'logo','width'=>'150','height'=>'40','class'=>'brand span2 pull-left')),array('controller'=>'pages','action'=>'index'),array('escape'=>false)); ?>
      
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
                <a class="brand  pull-left" href="#"><?php echo $new['User']['firstname'];?></a>
                <nav class="navbar pull-right">
                    <ul class="nav">
                    <?php 
					//echo $new['User']['rss_feed'];
					$exp=count(ClassRegistry::init('Experience')->find('all',array('conditions'=>array('uid'=>$new['User']['uid']))));
					$int=count(ClassRegistry::init('Interest')->find('all',array('conditions'=>array('uid'=>$new['User']['uid']))));
					$edu=count(ClassRegistry::init('Education')->find('all',array('conditions'=>array('uid'=>$new['User']['uid']))));
					$port=count(ClassRegistry::init('Portimage')->find('all',array('conditions'=>array('uid'=>$new['User']['uid']))));
					$portv=count(ClassRegistry::init('Portvideo')->find('all',array('conditions'=>array('uid'=>$new['User']['uid']))));
					$portd=count(ClassRegistry::init('Portdocument')->find('all',array('conditions'=>array('uid'=>$new['User']['uid']))));
					$portp=count(ClassRegistry::init('Portpresent')->find('all',array('conditions'=>array('uid'=>$new['User']['uid']))));
					$porta=count(ClassRegistry::init('Portaudio')->find('all',array('conditions'=>array('uid'=>$new['User']['uid']))));
					$skill=count(ClassRegistry::init('Skill')->find('all',array('conditions'=>array('uid'=>$new['User']['uid']))));
					$port=$port+$portv+$portd+$portp+$porta;
					//pr($exp);
					?>
                    
                   
                   
                    <?php  
					$dasarray=array('resume');
					if(in_array($this->params['action'],$dasarray)):$current='active';else:$current='';endif;
					 echo '<li class='.$current.'>'.$this->html->link('Home',array('action'=>'.'),array()).'</li>'; 
			        ?>
                    <?php  
					$expe=array('experience');
					if(in_array($this->params['action'],$expe)):$current='active';else:$current='';endif;
					if($exp >=1){ echo '<li class='.$current.'>'.$this->html->link('Experience',array('action'=>'experience'),array()).'</li>' ;} 
			        ?>
                     <?php  
					$blo=array('blog');
					if(in_array($this->params['action'],$blo)):$current='active';else:$current='';endif;
					if(!empty($new['User']['rss_feed'])) {echo '<li class='.$current.'>'.$this->html->link('Blog',array('action'=>'blog'),array()).'</li>'; }
			        ?>
                     <?php  
					$educ=array('educations');
					if(in_array($this->params['action'],$educ)):$current='active';else:$current='';endif;
					 if($edu >=1){echo '<li class='.$current.'>'.$this->html->link('Educations',array('action'=>'educations'),array()).'</li>'; }
			        ?>
                     <?php  
					$inte=array('interest');
					if(in_array($this->params['action'],$inte)):$current='active';else:$current='';endif;
					if($int >=1){echo '<li class='.$current.'>'.$this->html->link('Interest',array('action'=>'interest'),array()).'</li>'; }
			        ?>
                      <?php  
					$ski=array('skill');
					if(in_array($this->params['action'],$ski)):$current='active';else:$current='';endif;
					if($skill >=1){echo '<li class='.$current.'>'.$this->html->link('Skill',array('action'=>'skill'),array()).'</li>'; }
			        ?>
                      <?php  
					$por=array('portfolio');
					if(in_array($this->params['action'],$por)):$current='active';else:$current='';endif;
					if($port >=1){echo '<li class='.$current.'>'.$this->html->link('Portfolio',array('action'=>'portfolio'),array()).'</li>'; }
			        ?>
                    
                    
                         <li><a href="" type="button" data-toggle="modal" data-target="#downloadfile" class=""><span>Downloads</span></a></li>
                         
                         <?php echo $this->Element('downloadfile');?>
                         
                    </ul>
                </nav>
            </div>

            <div class="row resume-body">
            
            <div class="span3 resume-profile-details" >
                    <h1><?php echo $new['User']['firstname']."\t".$new['User']['lastname']?></h1>
                    
                 <!--Info-->
                    <div class="left-col-widget clearfix" id="info" style="display:block;height:85px;
                    ">
                    <?php 
                    if(empty($new['User']['image']))
                    echo $this->Html->image('profile_pic_default.jpg',array('border'=>0,'width'=>'70','height'=>'70','alt'=>'Resume','class'=>'profile-photo'));
                    else
                    echo $this->Html->image('user-images/small/'.$new['User']['image'],array('border'=>0,'width'=>'70','height'=>'70','alt'=>'Resume','class'=>'profile-photo')); ?> 
                    <div class="info">
                    <?php 
                    if(!empty($new['User']['country'])) {echo $cou['Country']['country_name']."<br>";}
                    echo $new['User']['city']."<br>".$new['User']['zipcode']?>  </div>
                    <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?> 
                    <a href="#" class="pull-right edith" style="display:none;" id="edit_in">Edit</a> <?php } } ?>
                    </div>
                 <!--edit info-->
                    <div class="left-col-widget clearfix" id="edit_info" style="display:none;">
                    <div class="profile_image">
                    <?php 
					if(empty($new['User']['image']))
					echo $this->Html->image('profile_pic_default.jpg',array('border'=>0,'width'=>'70','height'=>'70','alt'=>'Resume','class'=>'profile-photo'));
					else
					echo $this->Html->image('user-images/small/'.$new['User']['image'],array('border'=>0,'width'=>'70','height'=>'70','alt'=>'Resume','class'=>'profile-photo'));
					
					//echo $this->Html->image('user-images/small/'.$new['User']['image'],array('border'=>0,'width'=>'70','height'=>'70','alt'=>'Resume','class'=>'profile-photo')); ?> 
                    <a href="" type="button" data-toggle="modal" data-target="#edit_pic" style="float:left">Edit photo</a>
                    </div>
                    <div class="info"> 
                    <div style="float:right">
                    <form class="" name="login" action="<?php echo BASE_URL;?>users/resumeedit" method="post">
                    <input type="hidden" value="<?php echo $new['User']['username']?>" name="data[base]" />
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
                  
                 <!--Contact-->  
                    <div id="edit_cont1" style="display:block">
                        <ul class="left-col-widget unstyled resume-contact"> 
                        
                        <li><i class="icon-envelope icon-white"></i><a><?php echo $new['User']['email']?></a></li>
                        <?php if(!empty($new['User']['phone'])) {?>  <li><i class="icon-phone icon-white"></i><a ><?php echo $new['User']['phone']?></a></li><?php }?>
                        <?php if(!empty($new['User']['skype'])) {?>  <li><i class="icon-skype icon-white"></i><a ><?php echo $new['User']['skype']?></a></li><?php }?>
                        <?php if(!empty($new['User']['yahoo'])) {?>  <li><i class="icon-yahoo icon-white"></i><a ><?php echo $new['User']['yahoo']?></a></li><?php }?>
                        <li><i class="icon-list-alt icon-white"></i><a href="" data-toggle="modal" data-target="#contact_form" class="">Contact Form</a></li>
                        
                        <!--  E-mail Contact form-->
                        <?php echo $this->Element('contactform');?>  
                        
                        
                        <li><i class="icon-white"></i>
                        <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?> <a href="#" class="pull-right  edith" style="display:none" id="edit_cont_in">Edit</a> <?php } } ?>
                        <!--<a href="#" class="pull-right" id="edit_cont_in">Edit</a>--></li>
                        
                        </ul>
                        </div>
                 <!--Edit contact-->
                    <div id="edit_cont" style="display:none">
                    <ul class="left-col-widget unstyled resume-contact"> 
                    
                    <div class="cont_info">
                    <div style="float:">
                    <form class="" name="login" action="<?php echo BASE_URL;?>users/resumeedit" method="post">
                    <input type="hidden" value="<?php echo $new['User']['username']?>" name="data[base]" />
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
                    <td> <input class="text" name="data[skype]" type="text" value="<?php if(!empty($new['User']['skype'])) echo $new['User']['skype'];?>"  /></td>
                    </tr>
                    <tr>
                    <td width="25%" valign="top"> <label for="identity[state]" class="label-value">Yahoo</label></td>
                    <td> <input class="text" name="data[yahoo]" type="text" value="<?php if(!empty($new['User']['yahoo'])) echo $new['User']['yahoo'];?>"  /></td>
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
                 
                 <!--About me-->   
                    <div style="display:block" id="about">
                    <ul class="left-col-widget unstyled"> 
                    <h3>About Me</h3>
                    <li><?php echo $new['User']['about_me']?></li>
                    <li><i class="icon-white"></i>
                    <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?> <a href="#" class="pull-right edith" style="display:none" id="about_in">Edit</a> <?php } } ?>
                    <!-- <a href="#" class="pull-right" id="about_in">Edit</a>-->
                    </li>
                    </ul>
                    </div>
                 <!--Edit About me-->
                    <div style="display:none" id="about1" >
                    <ul class="left-col-widget unstyled"> 
                    <h3>About Me</h3>
                    <div class="cont_info">
                    <form class="" name="login" action="<?php echo BASE_URL;?>users/resumeedit" method="post">
                    <input type="hidden" value="<?php echo $new['User']['username']?>" name="data[base]" />
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
                    
                 <!--Proffessional-->       
                    <div style="display:block" id="pro">
                    <ul class="left-col-widget unstyled"> 
                    <h3>Professional Status</h3>
                    <li><i class="icon-user  icon-white"></i><?php echo "\t".$new['User']['professional']?></li>
                    
                    <li>
                <?php 
                if($new['User']['professional_status']=='Available' || $new['User']['professional_status']=='Looking for an internship' ) { 
                echo '<i class="icon-available icon-white"></i>'."\t".$new['User']['professional_status'];
                }
                if($new['User']['professional_status']=='Just looking around' || $new['User']['professional_status']=='Open to opportunities' ) { 
                echo '<i class="icon-looking  icon-white"></i>'."\t".$new['User']['professional_status'];
                }
                if($new['User']['professional_status']=='Unavailable') { 
                echo '<i class="icon-not-available  icon-white"></i>'."\t".$new['User']['professional_status'];
                }
                
                   ?>
                 </li>
                    
                    <li><?php //echo $new['User']['professional_status']?></li>
                    <li><i class="icon-white"></i>
                    <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?> <a href="#" class="pull-right  edith" style="display:none" id="pro_in">Edit</a> <?php } } ?>
                    </li>
                    </ul>
                    </div>	
                 <!--Edit Proffessional-->
                    <div style="display:none" id="pro1">
                    <ul class="left-col-widget unstyled"> 
                    <h3>Professional</h3>
                    <div class="pro_edit">
                    
                    <form class="" name="login" action="<?php echo BASE_URL;?>users/resumeedit" method="post">
                    <input type="hidden" value="<?php echo $new['User']['username']?>" name="data[base]" />
                    <table width="100%">
                    <tr>
                    <td width="25%" valign="top"><font color="#a1a1a1">Status</font></td>
                    <td> 
                    <select name="data[professional]" class="span2"   id="set_oro">
                    
                    <option value="Employed" <?php if($new['User']['professional']=='Employed')echo 'selected="selected"'; ?>><?php echo __("Employed");?></option>
                    <option value="Unemployed" <?php if($new['User']['professional']=='Unemployed')echo 'selected="selected"'; ?>><?php echo __("Unemployed");?></option>
                    <option value="Student" <?php if($new['User']['professional']=='Student')echo 'selected="selected"'; ?>><?php echo __("Student");?></option>
                   
                    </select>
                    
                    </td>
                    </tr>
                    <tr>
                    <td width="25%" valign="top"><font color="#a1a1a1">Availablity</font></td>
                    <td>  
                    <select class="span2" name="data[professional_status]"  id="set_pro">
                    
                    <option value="Available" <?php if($new['User']['professional_status']=='Available')echo 'selected="selected"'; ?>><?php echo __("Available");?></option>
                    <option value="Looking for an internship" <?php if($new['User']['professional_status']=='Looking for an internship')echo 'selected="selected"'; ?>><?php echo __("Looking for an internship");?></option>
                    <option value="Just looking around" <?php if($new['User']['professional_status']=='Just looking around')echo 'selected="selected"'; ?>><?php echo __("Just looking around");?></option>
                    <option value="Open to opportunities" <?php if($new['User']['professional_status']=='Open to opportunities')echo 'selected="selected"'; ?>><?php echo __("Open to opportunities");?></option>
                    <option value="Unavailable" <?php if($new['User']['professional_status']=='Unavailable')echo 'selected="selected"'; ?>><?php echo __("Unavailable");?></option>
                   
                    </select></td>
                    </tr>
                    
                    
                    </table>
                    <div class='options2' >		
                    <input class="save" type="submit" value="Save" name="proff" />			
                    <a 	href="#">
                    <input class="cancel" type="button" id="pro_out" value="Cancel" />
                    </a>
                    <div class="clear"></div>			
                    </div>
                    </form>
                   
                    </div>
                    </ul>
                    </div>	
                        
                 <!--My links--> 
                    <div style="display:block" id="link">      
                    <ul class="left-col-widget unstyled"> 
                    <h3>My Links</h3>
                    <?php 
					if(!empty($links)){
					foreach ($links as $link){?>
					<a href="<?php  echo $link['Mylink']['im_link']?>" target="_blank">
                        <li>
                        <?php 
                        if($link['Mylink']['im_type']=='Facebook') { 
                        echo '<i class="icon-facebook icon-white"></i>'."\t".$link['Mylink']['im_type'];
                        }
                        else  if($link['Mylink']['im_type']=='Twitter') { 
                        echo '<i class="icon-twitter icon-white"></i>'."\t".$link['Mylink']['im_type'];
                        }
                        else if($link['Mylink']['im_type']=='Linkedin'){ 
                        echo '<i class="icon-linkedin  icon-white"></i>'."\t".$link['Mylink']['im_type'];
                        }
                        ?>
                        </li>
					</a>
                    <?php } }?>
                    <li><i class="icon-white"></i>
                    <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?> <a href="#" class="pull-right  edith" style="display:none" id="link_in">Edit</a> <?php } } ?>
                    </li>
                    </ul>
                    </div>
                 <!--Edit my links-->  
                    <div style="display:none" id="link1">      
                    <ul class="left-col-widget unstyled"> 
                    <h3>My Links</h3>
					<form name="mylink_edit" method="post" action="<?php echo BASE_URL;?>users/edit_mylinks">
                    <?php 
					if(!empty($links)){
					foreach ($links as $linkss){?>
                        <li>
                     
                    <select name="data[im_type][]" class="span2"  id="set_typ">                    
                    <option value="Facebook" <?php if($linkss['Mylink']['im_type']=='Facebook')echo 'selected="selected"'; ?>><?php echo __("Facebook");?></option>
                    <option value="Twitter" <?php if($linkss['Mylink']['im_type']=='Twitter')echo 'selected="selected"'; ?>><?php echo __("Twitter");?></option>
                    <option value="Linkedin" <?php if($linkss['Mylink']['im_type']=='Linkedin')echo 'selected="selected"'; ?>><?php echo __("Linkedin");?></option>                    
                    </select>
					
					<input type="text"  class="span2" name="data[im_link][]" id="set_link" value="<?php echo $linkss['Mylink']['im_link'];?>" />
					<input type="hidden" name="data[mlid][]" value="<?php echo $linkss['Mylink']['mlid'];?>" id="ml_id" />
                        
                        </li>
					
                    <?php  } 
					}?>
					<div class='options2' >		
                    <input class="save" type="submit" value="Save" name="proff" />			
                    <a 	href="#">
                    <input class="cancel" type="button" id="link_out" value="Cancel" />
                    </a>
                    <div class="clear"></div>			
                    </div>
					</form>
                    </ul>
                    </div>
            </div>
            
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
                        <?php 
                        if(empty($new['User']['image']))
                        echo $this->Html->image('profile_pic_default.jpg',array('border'=>0,'width'=>'','height'=>'','alt'=>'Resume','class'=>'pull-left img-polaroid'));
                        else
                        echo $this->Html->image('user-images/small/'.$new['User']['image'],array('border'=>0,'alt'=>'Resume','width'=>'70','height'=>'70','class'=>'profile-photo','style'=>'border:1px solid #ccc')); ?> 
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
           <?php //echo $this->Element('downloadfile');?>
            <!-- Professional Experience -->
            
            <?php echo $this->Element('exp');?>
            
            <!--Skills-->
            <?php echo $this->Element('skills');?> 
            
            <!--Education    -->   
            <?php echo $this->Element('education');?>   
            
            <!--Interests-->
            <?php echo $this->Element('interests');?>
            
            
            <!--  Photo + Basic info-->
            <?php echo $this->Element('userphoto');?>  
            
            
            <!-- About me-->
            
            <?php echo $this->Element('about-me');?>
            
            <!--Contact-->
            
            <?php echo $this->Element('usercontact');?>
            
            
            <!-- My Links-->
            <?php echo $this->Element('my-links');?>
            <!--Blog-->
            <?php echo $this->Element('blogs');?>
            
            <!-- Portfolio Photo-->
            <?php echo $this->Element('portphoto');?>
            
            <!-- Portfolio Video-->
            <?php echo $this->Element('portvideo');?>
            
            <!-- Portfolio audio-->
            <?php echo $this->Element('portaudio');?>
            
            <!-- Portfolio pdf-->
            <?php echo $this->Element('portpdf');?>
            
            <!-- Portfolio presentation-->
            <?php echo $this->Element('portpresentation');?>
            
            <?php echo $this->Element('recommentme');?>

    <script>
	
	$('.templateimg').click(function(){
		
		var id=$(this).attr("id");
		//alert(id);
		$.ajax({
					type: "POST",
					url : "<?php echo BASE_URL?>users/changetemplate/"+id,
					success: function(msg){
						if(msg == 'success'){
							//alert('working');
							location.reload();
						} else {
							alert('something problem occurs in your action please try again.');
						}
					}
			});
	});
	
	
	</script>