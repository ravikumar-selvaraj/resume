
<?php 
	$app = explode('app', $_SERVER['PHP_SELF']);
	$url = explode($app[0], $_SERVER['REQUEST_URI']);
 //echo $_SESSION['User']['username'] ;
if(isset($_SESSION['User']['uid'])) {
?>
        <!-- RESUME NAV BAR -->
        <div class="row resume-navigations">
         <?php echo  $this->html->link($this->html->image('logo-small.png',array('border'=>0,'alt'=>'logo','width'=>'150','height'=>'40','class'=>'brand cv-logo pull-left')),array('controller'=>'pages','action'=>'index'),array('escape'=>false)); ?>
           <!-- <a href="#" class="brand span3 pull-left"><img src="<?php echo Router::url('/'); ?>/img/logo-small.png" alt=""></a>-->
        
			
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
                                <li><a href="" data-toggle="modal" data-target="#skills" type="button" >Skills</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#education" class="">Education</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#interests" class="">Interests</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#basic" class="">Photo + Basic info</a></li>
                               <?php if(empty($new['User']['about_me'])) {?>
                                <li><a href="" type="button" data-toggle="modal" data-target="#aboutme" class="">About me</a></li>
                                <?php } else {?>
                                  <li><a>About me</a></li>
                                 <?php } ?>
                                <li><a href="" type="button" data-toggle="modal" data-target="#contacts" class="">Contact</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#mylink" class="">My Links</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#blogs" class="">Blog</a></li>
                            </ul>
                        </div>

                        <!-- Portfolio -->
                        <div id="proff-exp" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                        <div class="tab-pane proff-exp-btn" id="profile">
                        <ul class="unstyled inline">
                       
                               <li><a href="" type="button" data-toggle="modal" data-target="#port_photo" class="">Photo</a></li>
                                <li><a href="" data-toggle="modal" data-target="#port_video" type="button" class="">Video</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#port_audio" class="">Audio</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#port_pdf" class="">Word/Pdf</a></li>
                             	<li><a href="" type="button" data-toggle="modal" data-target="#port_presentation" class="">Presentation</a></li>
                            </ul></div>
                            <!--Import-->
                        <div class="tab-pane proff-exp-btn" id="messages"><ul class="unstyled inline">
                      
                               <li><a href="<?php echo BASE_URL;?>linkedin" type="button"  class="">Linked In</a></li>
                               <!-- <li><a href="" data-toggle="modal" data-target="#port_viadeo" type="button" class="">Viadeo</a></li>-->
                               
                            </ul></div>
                            
                            
                          
                            
                            
                      <!--  <div class="tab-pane" id="settings">Setting Under Construction</div>-->
                    </div>
                </div>
                <div class="tab-pane" id="design">Under Construction</div>
                <div class="tab-pane" id="share">Under Construction</div>
                <div class="tab-pane" id="recommend">Under Construction</div>
                <div class="tab-pane" id="settings">Under Construction</div>
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
                         <li><?php echo $this->html->link('Contact',array('action'=>'#'));?> </li>
                    </ul>
                </nav>
            </div>

            <div class="row resume-body">
            
            <div class="span3 resume-profile-details" >
                    <h1><?php echo $new['User']['firstname']."\t".$new['User']['lastname']?></h1>
                     <div class="left-col-widget clearfix" id="info" style="display:block">
                    <?php 
					if(empty($new['User']['image']))
					echo $this->Html->image('profile_pic_default.jpg',array('border'=>0,'width'=>'70','height'=>'70','alt'=>'Resume','class'=>'profile-photo'));
					else
					echo $this->Html->image('user-images/small/'.$new['User']['image'],array('border'=>0,'width'=>'70','height'=>'70','alt'=>'Resume','class'=>'profile-photo')); ?> 
                       
                        <div class="info">
                         <?php 
						
						if(!empty($new['User']['country'])) {echo $cou['Country']['country_name']."<br>";}
						 echo $new['User']['city']."<br>".$new['User']['zipcode']?>  </div>
                        <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?> <a href="#" class="pull-right" id="edit_in">Edit</a> <?php } } ?>
                    </div>
                  <!--  edit info-->
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
                    <form class="" name="login" action="<?php echo BASE_URL;?>users/test" method="post">
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
                    
                    <div id="edit_cont1" style="display:block">
                    <ul class="left-col-widget unstyled resume-contact"> 
                    
                        <li><i class="icon-envelope icon-white"></i><a><?php echo $new['User']['email']?></a></li>
                        <?php if(!empty($new['User']['phone'])) {?>  <li><i class="icon-envelope icon-white"></i><a ><?php echo $new['User']['phone']?></a></li><?php }?>
                          <?php if(!empty($new['User']['im'])) {?>    <li><i class="icon-envelope icon-white"></i><a ><?php echo $new['User']['im']?></a></li><?php }?>
                        <li><i class="icon-list-alt icon-white"></i><a href="" data-toggle="modal" data-target="#contact_form" class="">Contact Form</a></li>
                        
                         <!--  E-mail Contact form-->
                      <?php echo $this->Element('contactform');?>  
                      
                      
                      <li><i class="icon-white"></i>
                        <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?> <a href="#" class="pull-right" id="edit_cont_in">Edit</a> <?php } } ?>
                       <!--<a href="#" class="pull-right" id="edit_cont_in">Edit</a>--></li>
                  
                     </ul>
                    </div>
                    <!--Edit contact-->
                     <div id="edit_cont" style="display:none">
                      <ul class="left-col-widget unstyled resume-contact"> 
                       
                       <div class="cont_info">
                        <div style="float:">
                    <form class="" name="login" action="<?php echo BASE_URL;?>users/test" method="post">
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
                    <li><i class="icon-white"></i>
                      <?php  if(isset($_SESSION['User']['uid'])) { if(($_SESSION['User']['username']==Configure::read('userpage'))) { ?> <a href="#" class="pull-right" id="about_in">Edit</a> <?php } } ?>
                      <!-- <a href="#" class="pull-right" id="about_in">Edit</a>-->
                      </li>
                    </ul>
                    </div>
                    <!--Edit About me-->
                     <div style="display:none" id="about1" >
                    <ul class="left-col-widget unstyled"> 
                    <h3>About Me</h3>
                    <div class="cont_info">
                    <form class="" name="login" action="<?php echo BASE_URL;?>users/test" method="post">
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

    