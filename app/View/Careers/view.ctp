<div class="row app-header">
            <div class="container ">
                <h1><a href="<?php echo BASE_URL;?>careers"><?php echo __("Career Advice");?></a> / <?php echo __("View");?></h1>
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
                                    <h4><a href="#"><?php echo $career['Career']['title'];?></a></h4>
                                    <div class="row">
                                        <div class="span8">
                                            <p>
                                                 <i class="icon-calendar"></i> <?php echo date('M dS, Y',strtotime($career['Career']['created_date']));?>
                                                <!--| <i class="icon-comment"></i> <a href="#">3 Comments</a>-->
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span2">
                                    <a href="#" class="thumbnail">
                                        <?php echo $this->Html->image('career-image/big/'.$career['Career']['image']);?>
                                    </a>
                                </div>
                                <div class="span7">
                                    <p><?php echo $career['Career']['content'];?>
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
                                        </script> 
                                        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript></p>
                                        </div>
								
                               							
                            </div>
                        </article>
                    </div>
                    <hr>
                </section>

                <section class="right-col span3">
                        						
						<div class="well tags">
                              <h5><?php echo __("Tags");?></h5>
                              <a href="<?php echo BASE_URL;?>careers"><span class="label label-info"><i class="icon-tag icon-white"></i> <?php echo __("All");?></span></a>
                              <a href="<?php echo BASE_URL;?>careers/index/find"><span class="label label-info"><i class="icon-tag icon-white"></i> <?php echo __("Find a job");?></span></a>
                              <a href="<?php echo BASE_URL;?>careers/index/resume"><span class="label label-info"><i class="icon-tag icon-white"></i> <?php __("Get a great resume");?></span></a>
                              <a href="<?php echo BASE_URL;?>careers/index/career"><span class="label label-info"><i class="icon-tag icon-white"></i> <?php __("Manage your career");?></span></a>
                        </div>

                        <div class="well search">
                            <h5>Search by title</h5>
                            <form class="form-search" action="<?php echo BASE_URL;?>careers/index" method="post">
                                <div class="input-append">
                                    <input type="text" name="search" class="span2 search-query">
                                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
						
						<div class="well">
                            <h5><?php echo __("Most popular posts");?></h5>
							<?php foreach($populars as $popular) { ?>
                            <div class="popular-post clearfix">
                                <h6><?php echo $popular['Career']['title'];?></h6>
                                <?php echo $this->Html->image('career-image/small/'.$popular['Career']['image'],array('class'=>'pull-left','alt'=>'df','width'=>50,'height'=>50));?>
                                <p> <?php echo substr($popular['Career']['content'],0,200);?> </p>
								<a href="<?php echo BASE_URL;?>careers/view/<?php echo $popular['Career']['key'];?>">Read more</a>
                            </div>
                             <?php } ?>
                        </div>

                          <div id="tags" class="well">
                            <h5>Tag Clouds</h5>
                            <ul class="unstyled">
							<?php foreach($tags as $tag){ 
								$count = ClassRegistry::init('Career')->find('count',array('conditions'=>array('tag LIKE'=>"%".$tag['Tag']['tag_name']."%")));
								$count = $count+1;
								if($count > 5)
								$count = 5;
							?>							
                                <li class="tag<?php echo $count;?>"><a href="<?php echo BASE_URL;?>careers/index/tags/<?php echo $tag['Tag']['tag_name'];?>"><?php echo $tag['Tag']['tag_name'];?></a></li> 
                                <?php } ?>
                            </ul>
                        </div>
                </section>
            </div>
        </div>