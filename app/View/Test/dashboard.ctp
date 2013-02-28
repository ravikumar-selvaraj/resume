

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
                           <img src="<?php echo Router::url('/'); ?>img/page/profile_pic_default.jpg" alt="" class="pull-left img-polaroid">
                            <div class="span7 resume_head">
                                <h3><a href="">John Doe - Proffesional Web design with 3+ Years of experience</a></h3>
                                <small class="muted">Last updated:<?php echo date("F  j,Y", strtotime($_SESSION['User']['created_date']));?></small>  
                                <div class="progress progress-striped progress-danger active">
                                    <div class="bar" style="width:  <?php echo $_SESSION['percentage'].'%';?>;">Resume Completion  <?php echo $_SESSION['percentage'];?>%</div>
                                </div>
                                <button class="btn btn-success pull-right" type="button">Update</button>
                            </div>
                        </div>
                        <div class="clear completeion-tips ">
                            <h5>To improve your resume, you can:</h5>
                            <ul class="unstyled ">
                                <li class=" alert-info"><a href="">Add a picture</a><i class="icon-info-sign pull-right"></i></li>
                                <li class=" alert-info"><a href="">Add at least three experiences</a><i class="icon-info-sign pull-right"></i></li>
                                <li class=" alert-info"><a href="">Add at least three skills</a><i class="icon-info-sign pull-right"></i></li>
                                <li class=" alert-info"><a href="">Add Interest</a><i class="icon-info-sign pull-right"></i></li>
                                <li class=" alert-info"><a href="">Add Education</a><i class="icon-info-sign pull-right"></i></li>
                                <li class=" alert-info"><a href="">Add a small description for your resume</a><i class="icon-info-sign pull-right"></i></li>
                                <li class=" alert-info"><a href="">Use a clear CV title</a><i class="icon-info-sign pull-right"></i></li>

                            </ul>
                        </div>
                    </div>

                    <!-- Traffic status -->
                     <div class="box-container row clearfix">
                        <h2>Traffic status</h2>
                     </div>

                    <!-- Traffic status -->
                    <div class="box-container row clearfix ">
                        <h2>New users</h2>
                        <ul class="media-list new-users">
                            <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="<?php echo Router::url('/'); ?>img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Connor-Davis</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">Research Engineeer</span> 
                                    </div>
                                </a>
                            </li>
                             <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-polaroid" src="<?php echo Router::url('/'); ?>img/profile_pic_mini.jpg">
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
                                  <img class="media-object img-polaroid" src="<?php echo Router::url('/'); ?>img/profile_pic_mini.jpg">
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
                                  <img class="media-object img-polaroid" src="<?php echo Router::url('/'); ?>img/profile_pic_mini.jpg">
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
                                  <img class="media-object img-polaroid" src="<?php echo Router::url('/'); ?>img/profile_pic_mini.jpg">
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
                                  <img class="media-object img-polaroid" src="<?php echo Router::url('/'); ?>img/profile_pic_mini.jpg">
                                </a>
                                <a href="">
                                    <div class="media-body">
                                        <h5 class="media-heading">Jacob Bodur</h5>
                                        <small class="muted">Employed</small><br>
                                        <span class="designation">MSc Graduate in Finance</span> 
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </section>

                 <section class="right-col span3">
                    <div class="newsletter right-box">
                        <h2>Stay informed</h2>
                        <form>
                          <fieldset>
                            <strong>I want to receive the: </strong>
                            <label class="checkbox">
                              <input type="checkbox"> Career Guide newsletter
                            </label>

                            <label class="checkbox">
                              <input type="checkbox"> DoYouBuzz newsletter 
                            </label>
                            <button type="submit" class="btn">Save</button>
                          </fieldset>
                        </form>
                        <a href="">Edit my subscription</a>
                    </div>
                </section>
            </div>
        </div>

      
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
   
