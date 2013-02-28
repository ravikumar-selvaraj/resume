 

        <!-- Body Content -->
        <div class="row app-header">
            <div class="container ">
                <h1>Dashboard</h1>
            </div>
        </div>

 
        <div class="container">
            <div class="row dashboard">
                <section class="left-col pull-left span9">
                    
                    <!-- Resume Profile -->
                    <div class="box-container row clearfix">
                        <h2>My Resume</h2>
                        <div class="resume-cont clearfix">
                         <?php 
							if(empty($user['User']['image']))
							echo $this->Html->image('profile_pic_default.jpg',array('border'=>0,'width'=>'','height'=>'','alt'=>'Resume','class'=>'pull-left img-polaroid'));
							else
							echo $this->Html->image('user-images/small/'.$user['User']['image'],array('border'=>0,'width'=>'','height'=>'','alt'=>'Resume','class'=>'pull-left img-polaroid')); ?>
                             
                           
                            <div class="span7 resume_head">
                 <h3><?php echo $this->Html->link(''.$user['User']['firstname']."\t".$user['User']['lastname']."-".$user['User']['resume_title'].'',array('controller'=>'','action'=>$user['User']['username'])); ?></h3>
                              <?php /*?>  <h3><a href=""> <?php echo $user['User']['firstname']."\t".$user['User']['lastname'];?> - <?php echo $user['User']['resume_title'];?></a></h3><?php */?>
                                <small class="muted">Last updated:<?php echo date("F  j,Y", strtotime($_SESSION['User']['created_date']));?></small>  
                                <div class="progress progress-striped progress-danger active">
                                    <div class="bar" style="width:  <?php echo $_SESSION['percentage'].'%';?>;">Resume Completion  <?php echo $_SESSION['percentage'];?>%</div>
                                </div>
                                
                                <a href="<?php echo BASE_URL?><?php echo $user['User']['username'];?>" style="text-decoration:none;color:#fff;">
                                 <button class="btn btn-inverse " type="button">Update </button></a>
                                 <a href="<?php echo BASE_URL.$user['User']['username'];?> " style="text-decoration:none;color:#fff;"> 
                                 <button class="btn btn-success" type="button">Review my resume </button></a>
                            </div>
                        </div>
                        <div class="clear completeion-tips ">
                           <?php if($_SESSION['percentage'] != 100) {?> <h5>To improve your resume, you can:</h5> <?php }?>
                            <ul class="unstyled ">
                          <?php //echo $edu;?> 
							<?php if(empty($user['User']['image'])){?> <li class=" alert-info">Add a picture<i class="icon-info-sign pull-right"></i></li> <?php }?> 
                            <?php if($exp <3){?> <li class=" alert-info">Add at least three experiences<i class="icon-info-sign pull-right"></i></li> <?php } ?> 
                            <?php if($skill <3){?> <li class=" alert-info">Add at least three skills<i class="icon-info-sign pull-right"></i></li> <?php } ?> 
                            <?php if($int ==0) {?> <li class=" alert-info">Add Interest<i class="icon-info-sign pull-right"></i></li> <?php } ?> 
                            <?php if($edu ==0){?> <li class=" alert-info">Add Education<i class="icon-info-sign pull-right"></i></li> <?php }?> 
                            <?php if($port==0){?> <li class=" alert-info">Add Portfolio<i class="icon-info-sign pull-right"></i></li> <?php }?> 
                                

                            </ul>
                        </div>
                    </div>

                    <!-- Traffic status -->
                     <div class="box-container row clearfix">
                        <h2>Traffic status</h2>
                 
                        
						<!--<div id="charting" style="min-width: 400px; height: 450px; margin: 0 auto"></div>-->
							
                     </div>
				

                    <!-- New User -->
                    <div class="box-container row clearfix ">
                        <h2>New users</h2>
                       
                        <ul class="media-list new-users">
                        <?php foreach($new as $new)
						{ ?>
                            <li class="media">
                                <a class="pull-left" href="#">
                                <?php if(empty($new['User']['image'])) { ?>
                                    <img src="<?php echo Router::url('/'); ?>img/page/profile_pic_mini.jpg" alt="CVomg - The best way to show yourself" height="30" width="30"> <?php } else { ?>
                                     <img src="<?php echo Router::url('/'); ?>img/user-images/small/<?php echo $new['User']['image']; ?>" height="30" width="30">
                                    <?php } ?> 
                                  <!--<img class="media-object img-polaroid" src="<?php //echo Router::url('/'); ?>img/profile_pic_mini.jpg">-->
                                </a>
                                <a href="<?php echo BASE_URL?><?php echo $new['User']['username'];?>">
                                    <div class="media-body">
                                        <h5 class="media-heading">
										 <?php //echo $this->html->link(''.$new['User']['firstname']."\t".$new['User']['lastname'].'',array('controller'=>'users','action'=>$new['User']['username'])) ?>
										<?php echo $new['User']['firstname']."\t".$new['User']['lastname']?></h5>
                                        <small class="muted"><?php echo $new['User']['professional']?></small><br>
                                        <span class="designation"><?php echo $new['User']['resume_title']?></span> 
                                    </div>
                                </a>
                            </li>
							<?php }?>
                                
                        </ul>
                        <?php echo $this->html->link('View complete list',array('action'=>'userlist'),array('class'=>'pull-right'));?>
                       
                    </div>
                </section>

                 <section class="right-col span3">
                    <div class="newsletter right-box">
                        <h2>Stay informed</h2>
                      <form action="" name="campaign" id="mycampaign" method="post" enctype="multipart/form-data">
                          <fieldset>
                            <strong>I want to receive the: </strong>
                            <label class="checkbox">
                              <input type="checkbox" <?php if($user['User']['career_newsletter']==1) echo 'checked="checked"' ;?> name="data[career_newsletter]"> Career Guide newsletter
                            </label>

                            <label class="checkbox">
                              <input type="checkbox" <?php if($user['User']['newsletter']==1) echo 'checked="checked"' ;?> name="data[newsletter]"> CVOMG newsletter 
                            </label>
                            <button type="submit" class="btn" name="save">Save</button>
                          </fieldset>
                        </form>
                       <!-- <a href="">Edit my subscription</a>-->
                    </div>
                </section>
            </div>
        </div>

   
        
   
