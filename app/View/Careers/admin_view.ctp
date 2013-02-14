
<div class="content">        
        <div class="header">            
            <h1 class="page-title">View Blog</h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="<?php echo BASE_URL;?>admin">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo BASE_URL;?>admin/careers">Careers</a> <span class="divider">/</span></li>
					<li class="active">View Careers</li>
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
											<div class="controls"> <?php echo h($careers['Career']['title']); ?>	</div>
										</div>
                                        <div class="control-group">
											<label class="control-label">Category :</label>
											<div class="controls"> <?php echo h($careers['Career']['category']); ?>	</div>
										</div>
										<div class="control-group">
											<label class="control-label">Content :</label>
											<div class="controls"> <?php echo h($careers['Career']['content']); ?>	</div>
										</div>
										<div class="control-group">
											<label class="control-label">Image :</label>
											<div class="controls"><?php echo $this->html->image('career-image/small/'.$careers['Career']['image'],array('border'=>0,'alt'=>h($careers['Career']['title']))); ?></div>
										</div>
										<div class="control-group">
											<label class="control-label">Status :</label>
											<div class="controls"><?php echo h($careers['Career']['status']); ?></div>
										</div>
									</div>
									
								</form>
							</div>
						</div>
					  </div>
					  
				  </div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
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
