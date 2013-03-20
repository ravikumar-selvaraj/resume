
<div class="content">        
        <div class="header">            
            <h1 class="page-title">View Feature</h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="#">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo BASE_URL;?>admin/features">Features</a> <span class="divider">/</span></li>
					<li class="active">View Feature</li>
				</ul>

        <div class="container-fluid">
            <div class="row-fluid">
			
			<div class="well">
				
					  <div class="tab-pane active in" id="home">
					  <div class="widget-box">
							<div class="widget-title">
							</div>
							<div class="widget-content nopadding">
								<form id="form-wizard" class="form-horizontal ui-formwizard" method="post" novalidate="novalidate" _lpchecked="1">
									<div id="form-wizard-1" class="step ui-formwizard-content" style="display: block;">
										<div class="control-group">
											<label class="control-label">Title :</label>
											<div class="controls"> <?php echo h($feature['Feature']['title']); ?></div>
										</div>
										<div class="control-group">
											<label class="control-label">Content :</label>
											<div class="controls"> <?php echo h($feature['Feature']['description']); ?>	</div>
										</div>
										<div class="control-group">
											<label class="control-label">Image :</label>
											<div class="controls"><?php echo $this->html->image('feature-images/small/'.$feature['Feature']['image'],array('border'=>0,'alt'=>h($feature['Feature']['title']))); ?></div>
										</div>
										<div class="control-group">
											<label class="control-label">Status :</label>
											<div class="controls"><?php echo h($feature['Feature']['status']); ?></div>
										</div>
									</div>
									
								</form>
							</div>
						</div>
					  </div>
					  
				  </div>


                    
                    <footer>
                        <hr>
                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                        

                        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
