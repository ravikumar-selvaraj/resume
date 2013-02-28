        <div class="row app-header">
            <div class="container ">
            <h1>  <?php echo $this->html->link('Dashboard',array('action'=>'dashboard'));?>
              
                / Latest CV</h1>
            </div>
        </div>

        <div class="container">
            <div class="row dashboard">
                <section class="left-col pull-left span9">

                    <!-- New users -->
                    <div class="box-container row clearfix ">
                        <ul class="media-list new-users">
                        <?php foreach($new as $new) {?>
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
                           <!--  <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Lukasz Romanowicz </h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">Planning & Controlling Senior Specialist</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Vicens Roig </h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation"> Travel & Congress Manager</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Darius  Harris</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation"> Online Resume</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Antoine RAVIN</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">EMEA Support Executive</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Jacob Bodur</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">MSc Graduate in Finance</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Jacob Bodur</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">MSc Graduate in Finance</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Jacob Bodur</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">MSc Graduate in Finance</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Jacob Bodur</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">MSc Graduate in Finance</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Jacob Bodur</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">MSc Graduate in Finance</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Jacob Bodur</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">MSc Graduate in Finance</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Jacob Bodur</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">MSc Graduate in Finance</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Jacob Bodur</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">MSc Graduate in Finance</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Jacob Bodur</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">MSc Graduate in Finance</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="<?php echo Router::url('/'); ?>img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Jacob Bodur</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">MSc Graduate in Finance</span> 
                                    </div>
                                </a>
                            </li>-->
                        </ul>
                        <div class="pagination pagination-centered pagination ">
                            <ul>
                                <li><?php echo $this->Paginator->prev('« ' . __(''), array(), null, array('class' => 'prev disabled'));?></li>
                                <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
                                <li><?php echo $this->Paginator->next(__('»') . '', array(), null, array('class' => 'next disabled'));?></li>
                            </ul>
                        </div>
                        
                       <!-- <div class="pagination pagination-centered pagination ">
                            <ul>
                <li class="disabled"><a href="#">«</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
             </ul>
                        </div>-->
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
                    </div>
                </section>
            </div>
        </div>