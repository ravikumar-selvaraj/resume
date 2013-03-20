<div class="row app-header">
            <div class="container ">
                <h1><a href="<?php echo BASE_URL;?>blogs"><?php echo __("Blogs");?></a> / <?php echo __("View");?></h1>
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
                                    <h4><a href="#"><?php echo $blog['Blog']['title'];?></a></h4>
                                    <div class="row">
                                        <div class="span8">
                                           <p>
                                                 <i class="icon-calendar"></i> <?php echo date('M dS, Y',strtotime($blog['Blog']['created_date']));?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span2">
                                    <a href="#" class="thumbnail">
                                        <?php echo $this->Html->image('blog-images/big/'.$blog['Blog']['image']);?>
                                    </a>
                                </div>
                                <div class="span7">
                                    <p><?php echo $blog['Blog']['content'];?>
                                    </p>
                                    
                                 </div>
                                  <div class="span9">
								 <p> <div id="disqus_thread"></div>
										<script type="text/javascript">
                                            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                                            var disqus_shortname = 'cvomg'; // required: replace example with your forum shortname
                                    
                                            /* * * DON'T EDIT BELOW THIS LINE * * */
                                            (function() {
                                                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                                dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                            })();
                                        </script> <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript></p>
                                        </div>
                                       
  											 <!-- <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>-->
    
                               
								
                            </div>
                        </article>
                    </div>
                    <hr>
                </section>

                <section class="right-col span3">
                        <!--<div class="well tags">
                              <h5>Tags</h5>
                              <a href="<?php echo BASE_URL;?>careers"><span class="label label-info"><i class="icon-tag icon-white"></i> All</span></a>
                              <a href="<?php echo BASE_URL;?>careers/index/find"><span class="label label-info"><i class="icon-tag icon-white"></i> Find a job</span></a>
                              <a href="<?php echo BASE_URL;?>careers/index/resume"><span class="label label-info"><i class="icon-tag icon-white"></i> Get a great resume</span></a>
                              <a href="<?php echo BASE_URL;?>careers/index/career"><span class="label label-info"><i class="icon-tag icon-white"></i> Manage your career</span></a>
                        </div>-->

                        <div class="well search">
                           <h5><?php echo __("Search by title");?></h5>
                            <form class="form-search" action="<?php echo BASE_URL;?>blogs" method="post">
                                <div class="input-append">
                                    <input type="text" name="search" class="span2 search-query">
                                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                </section>
            </div>
        </div>