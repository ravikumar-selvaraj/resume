<div class="row app-header">
            <div class="container ">
                <h1><a href="<?php echo BASE_URL;?>blogs"><?php echo __("Features");?></a> / <?php echo __("View");?></h1>
            </div>
        </div>

        <div class="container main-body">
            <div class="row dashboard">
                <section class="left-col pull-left span9">
                    <!-- Blog Posts -->
                    <div class="row">
                        <article class="span9 article">
                            <div class="row">
                                <div class="span9">
                                    <h4><a href="#"><?php echo $feature['Feature']['title'];?></a></h4>
                                    <div class="row">
                                        <div class="span8">
                                           <p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span2">
                                    <a href="#" class="thumbnail">
                                        <?php echo $this->Html->image('feature-images/big/'.$feature['Feature']['image']);?>
                                    </a>
                                </div>
                                <div class="span7">
                                    <p><?php echo $feature['Feature']['description'];?></p>
									<p><a class="btn btn-info" href="<?php echo BASE_URL;?>"><?php echo __("Create your resume");?></a></p>
                                    
                                 </div>
                            </div>
                        </article>
                    </div>
                    <hr>
                </section>

                
            </div>
        </div>