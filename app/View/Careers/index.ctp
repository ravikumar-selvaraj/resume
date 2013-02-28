<div class="row app-header">
            <div class="container ">
                <h1>Career Advice</h1>
            </div>
        </div>

        <div class="container main-body">
            <div class="row dashboard">
			
                <section class="left-col pull-left span9">
                    <!-- Blog Posts -->
					<?php foreach($careers as $career) { ?>
                    <article class="row article">
                        <div class="span9">
                            <div class="row">
                                <div class="span9">
                                    <h4><a href="#"><?php echo $career['Career']['title'];?></a></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span2">
                                    <a href="#" class="thumbnail">
									<?php echo $this->Html->image('career-image/small/'.$career['Career']['image']);?>
                                        <!--<img src="http://placehold.it/260x180" alt="">-->
                                    </a>
                                </div>
                                <div class="span7">
                                    <p><?php echo substr($career['Career']['content'],0,500);?></p>
                                    <p><a class="btn" href="blog-article.html">Read more</a></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span8">
                                    <p></p>
                                    <p>
                                        <i class="icon-user"></i> by <a href="#">John</a>
                                        | <i class="icon-calendar"></i> Sept 16th, 2012
                                        | <i class="icon-comment"></i> <a href="#">3 Comments</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <hr><?php } ?>
						<div class="pagination pull-right">
						<ul>
							<li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
							<li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
							<li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
						</ul>
						</div>
                </section>
				
				

                <section class="right-col span3">
                        <div class="well tags">
                              <h5>Tags</h5>
                              <a href="index"><span class="label label-info"><i class="icon-tag icon-white"></i> All</span></a>
                              <a href="#"><span class="label label-info"><i class="icon-tag icon-white"></i> Find a job</span></a>
                              <a href="#"><span class="label label-info"><i class="icon-tag icon-white"></i> Get a great resume</span></a>
                              <a href="#"><span class="label label-info"><i class="icon-tag icon-white"></i> Manage your career</span></a>
                        </div>

                        <div class="well search">
                            <h5>Search</h5>
                            <form class="form-search">
                                <div class="input-append">
                                    <input type="text" class="span2 search-query">
                                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                </section>
            </div>
			
        </div>
		
		