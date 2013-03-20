<div class="row app-header">
            <div class="container ">
                <h1><?php echo __("Career Advice");?></h1>
            </div>
        </div>

        <div class="container main-body">
            <div class="row dashboard">
			
                <section class="left-col pull-left span9">
                    <!-- Blog Posts -->
					<?php 
					if(!empty($careers)) {
					foreach($careers as $career) {
						if($career['Career']['title'] !='') {
						 ?>
                    <article class="row article">
                        <div class="span9">
                            <div class="row">
                                <div class="span9">
                                    <h4><a href="<?php echo BASE_URL;?>careers/view/<?php echo $career['Career']['key'];?>"><?php echo $career['Career']['title'];?></a></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span2">
                                    <a href="<?php echo BASE_URL;?>careers/view/<?php echo $career['Career']['key'];?>" class="thumbnail">
									<?php echo $this->Html->image('career-image/small/'.$career['Career']['image']);?>
                                        <!--<img src="http://placehold.it/260x180" alt="">-->
                                    </a>
                                </div>
                                <div class="span7">
                                    <p><?php echo substr(strip_tags($career['Career']['content']),0,500);?></p>
                                    
									<p><a class="btn" href="<?php echo BASE_URL;?>careers/view/<?php echo $career['Career']['key'];?>"><?php echo __("Read more");?></a></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span8">
                                    <p></p>
                                    <p>
                                         <i class="icon-calendar"></i> <?php echo date('M dS, Y',strtotime($career['Career']['created_date']));?>
                                        <!--| <i class="icon-comment"></i> <a href="<?php //echo BASE_URL;?>careers/view/<?php //echo $career['Career']['key'];?>">3 Comments</a>-->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <hr><?php } }?>
						<div class="pagination pull-right">
						<ul>
							<li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
							<li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
							<li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
						</ul>
						</div>
						<?php } else { ?>
						<article class="row article">
							<div class="row">
									<div class="span9">
										<h4><?php echo __("No record found");?></h4>
									</div>
								</div>
						</article>
						<?php } ?>
                </section>
				
				

                <section class="right-col span3">
                        <div class="well tags">
                              <h5><?php echo __("Tags");?></h5>
                              <a href="<?php echo BASE_URL;?>careers"><span class="label label-info"><i class="icon-tag icon-white"></i> <?php echo __("All");?></span></a>
                              <a href="<?php echo BASE_URL;?>careers/index/find"><span class="label label-info"><i class="icon-tag icon-white"></i> <?php echo __("Find a job");?></span></a>
                              <a href="<?php echo BASE_URL;?>careers/index/resume"><span class="label label-info"><i class="icon-tag icon-white"></i> <?php echo __("Get a great resume");?></span></a>
                              <a href="<?php echo BASE_URL;?>careers/index/career"><span class="label label-info"><i class="icon-tag icon-white"></i> <?php echo __("Manage your career");?></span></a>
                        </div>

                        <div class="well search">
                            <h5><?php echo __("Search by title");?></h5>
                            <form class="form-search" action="" method="post">
                                <div class="input-append">
                                    <input type="text" name="search" class="span2 search-query">
                                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
						
						<div class="well">
                            <h5><?php echo __("Most popular posts");?></h5>
							<?php foreach($populars as $popular) {
								if($popular['Career']['title'] !='') {
								 ?>
                            <div class="popular-post clearfix">
                                <h6><?php echo $popular['Career']['title'];?></h6>
                                <?php echo $this->Html->image('career-image/small/'.$popular['Career']['image'],array('class'=>'pull-left','alt'=>'df','width'=>50,'height'=>50));?>
                                <p> <?php echo substr($popular['Career']['content'],0,200);?> </p>
								<a href="<?php echo BASE_URL;?>careers/view/<?php echo $popular['Career']['key'];?>">Read more</a>
                            </div>
                             <?php } }?>
                        </div>

                          <div id="tags" class="well">
                            <h5><?php echo __("Tag Clouds");?></h5>
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
		
		