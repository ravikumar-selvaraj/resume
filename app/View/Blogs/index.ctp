<div class="row app-header">
            <div class="container ">
                <h1><?php echo __("Blogs");?></h1>
            </div>
        </div>

        <div class="container main-body">
            <div class="row dashboard">
			
                <section class="left-col pull-left span9">
                    <!-- Blog Posts -->
					<?php 
					if(!empty($blogs)) {
					foreach($blogs as $career) { ?>
                    <article class="row article">
                        <div class="span9">
                            <div class="row">
                                <div class="span9">
                                    <h4><a href="<?php echo BASE_URL;?>blogs/view/<?php echo $career['Blog']['key'];?>"><?php echo $career['Blog']['title'];?></a></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span2">
                                    <a href="<?php echo BASE_URL;?>blogs/view/<?php echo $career['Blog']['key'];?>" class="thumbnail">
									<?php echo $this->Html->image('blog-images/small/'.$career['Blog']['image']);?>
                                        <!--<img src="http://placehold.it/260x180" alt="">-->
                                    </a>
                                </div>
                                <div class="span7">
                                    <p><?php echo substr($career['Blog']['content'],0,500);?></p>
                                    <p><a class="btn" href="<?php echo BASE_URL;?>blogs/view/<?php echo $career['Blog']['key'];?>">Read more</a></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span8">
                                    <p></p>
                                    <p>
                                         <i class="icon-calendar"></i> <?php echo date('M dS, Y',strtotime($career['Blog']['created_date']));?>
                                        <!--| <i class="icon-comment"></i> <a href="<?php echo BASE_URL;?>blogs/view/<?php echo $career['Blog']['key'];?>">3 Comments</a>-->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <hr><?php }?>
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
										<h4>No record found</h4>
									</div>
								</div>
						</article>
						<?php } ?>
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
                            <h5>Search by title</h5>
                            <form class="form-search" action="" method="post">
                                <div class="input-append">
                                    <input type="text" name="search" class="span2 search-query">
                                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                </section>
            </div>
			
        </div>
		
		