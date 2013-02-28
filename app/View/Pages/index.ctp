<div class="row slider_container">
                <!-- MAIN SLIDER -->
                <div id="main_slider" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#main_slider" data-slide-to="0" class="active "></li>
                        <li data-target="#main_slider" data-slide-to="1"></li>
                        <li data-target="#main_slider" data-slide-to="2"></li>
                    </ol>
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item ">
                            <div class="headline span8 ">Create an elegant and effective resume for free</div>
                            <?php if(!isset($_SESSION['User']['uid'])) {?>
                            <button type="button" data-toggle="modal" data-target="#signup" class="slider_btn">Create a cv now</button>
                             <?php } else {?>
                             <a href="<?php echo BASE_URL?>pages/dashboard"> <button type="button"   class="slider_btn">Create a cv now</button></a>
                              <?php }?>
                            <img src="img/page/template_screens.png" alt="">
                        </div>
                        <div class="item">  <div class="headline span8 ">Create an elegant and effective resume for free</div>
                           <?php if(!isset($_SESSION['User']['uid'])) {?>
                            <button type="button" data-toggle="modal" data-target="#signup" class="slider_btn">Create a cv now</button>
                             <?php } else {?>
                             <a href="<?php echo BASE_URL?>pages/dashboard"> <button type="button"   class="slider_btn">Create a cv now</button></a>
                              <?php }?>
                            <img src="img/page/template_screens.png" alt="">
                        </div>
                        <div class="item">  <div class="headline span8 ">Create an elegant and effective resume for free</div>
                            <?php if(!isset($_SESSION['User']['uid'])) {?>
                            <button type="button" data-toggle="modal" data-target="#signup" class="slider_btn">Create a cv now</button>
                             <?php } else {?>
                             <a href="<?php echo BASE_URL?>pages/dashboard"> <button type="button"   class="slider_btn">Create a cv now</button></a>
                              <?php }?>
                            <img src="img/page/template_screens.png" alt="">
                        </div>
                    </div>
                     <!-- Carousel nav -->
                    <a class="carousel-control left" href="#main_slider" data-slide="prev"></a>
                    <a class="carousel-control right" href="#main_slider" data-slide="next"></a>
                </div>
                <div class="shadow"></div>
            </div>
        </header>

        <!-- Body Content -->
        <div class="container">
            <div class="row">
                <section class="samples">
                    <h2>Take a look at these sample resumes</h2>
                    <ul class="thumbnails">
                        <li class="span3">
                            <a href="" class="thumbnail">
                                <img src="img/page/resume.jpg" alt="">
                            </a>
                        </li>

                        <li class="span3">
                            <a href="" class="thumbnail">
                                <img src="img/page/resume.jpg" alt="">
                            </a>
                        </li>

                        <li class="span3">
                            <a href="" class="thumbnail">
                                <img src="img/page/resume.jpg" alt="">
                            </a>
                        </li>

                        <li class="span3">
                            <a href="" class="thumbnail">
                                <img src="img/page/resume.jpg" alt="">
                            </a>
                        </li>
                    </ul>
                </section>
            </div>
        </div>