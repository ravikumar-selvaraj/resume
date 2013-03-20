        <div class="row app-header">
            <div class="container ">
            <h1>  <?php echo $this->html->link(__("Dashboard"),array('action'=>'dashboard'));?>
              
                / <?php echo __("Latest CV");?></h1>
            </div>
        </div>

        <div class="container">
            <div class="row dashboard">
                <section class="left-col pull-left span9">

                    <!-- New users -->
                    <div class="box-container row clearfix ">
                        <ul class="media-list new-users">
                        <?php foreach($new as $new) {
							?>
                            <li class="media">
                                <a class="pull-left" href="#">
                                <?php if(empty($new['User']['image'])) { ?>
                    <img src="<?php echo Router::url('/'); ?>img/page/profile_pic_mini.jpg" alt="CVomg - The best way to show yourself" height="30" width="30"> <?php } else { ?>
                     <img src="<?php echo Router::url('/'); ?>img/user-images/small/<?php echo $new['User']['image']; ?>" height="30" width="30">
                    <?php } ?> 
                                  <!--<img class="media-object img-polaroid" src="<?php echo Router::url('/'); ?>img/profile_pic_mini.jpg">-->
                                </a>
                                <a href="<?php echo BASE_URL?><?php echo $new['User']['username'];?>">
                                    <div class="media-body">
                                        <h5 class="media-heading"><?php echo $new['User']['firstname']."\t".$new['User']['lastname'];?></h5>
                                        <small class="muted"><?php echo $new['User']['professional']?></small><br>
                                        <span class="designation"><?php echo $new['User']['resume_title']?></span> 
                                    </div>
                                </a>
                            </li>
                            <?php } ?>
                         
                        </ul>
                        <div class="pagination pagination-centered pagination ">
                            <ul>
                                <li><?php echo $this->Paginator->prev('« ' . __(''), array(), null, array('class' => 'prev disabled'));?></li>
                                <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
                                <li><?php echo $this->Paginator->next(__('»') . '', array(), null, array('class' => 'next disabled'));?></li>
                            </ul>
                        </div>                        
                    
                    </div>
                </section>

                 
				<section class="right-col span3">
                    <div class="newsletter right-box">
                        <h2><?php echo __("Stay informed");?></h2>
                      <form action="" name="campaign" id="mycampaign" method="post" enctype="multipart/form-data">
                          <fieldset>
                            <strong><?php echo __("I want to receive the");?>: </strong>
                            <label class="checkbox">
                              <input type="checkbox" <?php if($user['User']['career_newsletter']==1) echo 'checked="checked"' ;?> name="data[career_newsletter]"> <?php echo __("Career Guide newsletter");?>
                            </label>

                            <label class="checkbox">
                              <input type="checkbox" <?php if($user['User']['newsletter']==1) echo 'checked="checked"' ;?> name="data[newsletter]"> <?php echo __("CVOMG newsletter");?> 
                            </label>
                            <button type="submit" class="btn" name="save"><?php echo __("Save");?></button>
                          </fieldset>
                        </form>
                       <!-- <a href="">Edit my subscription</a>-->
                    </div>
                </section>
				<?php if(!empty($tips)) { ?>
					<section class="right-col span3">
                    <div class="tip-advice right-box">
                        <h2><?php echo __("Tips & Advice");?></h2>
                       <!-- Tips & Advice -->
                        <div id="tip-advice" class="carousel slide tip-advice clearfix">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
							<?php $i = 0;
							 foreach($tips as $tip) { ?>
                                <div class="<?php if($i == 0) echo "active";?> item">
                                    <h5><?php echo $tip['Tip']['tip_title'];?></h5>
                                    <p><?php echo $tip['Tip']['tip_content'];?></p>
                                </div>
								<?php $i++; } ?>
								</div>
                                <!-- Carousel nav -->
                            <a class="pull-right" href="#tip-advice" data-slide="next"><?php echo __("next");?></a>
                        
                    </div>
					</div>
                </section>
				<?php } ?>
            </div>
        </div>