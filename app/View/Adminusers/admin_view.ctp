
<div class="content">        
        <div class="header">            
            <h1 class="page-title">View User</h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="<?php echo BASE_URL;?>adminpanel">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo BASE_URL;?>admin/adminusers">Users</a> <span class="divider">/</span></li>
					<li class="active">View User</li>
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
											<label class="control-label">Adminname :</label>
											<div class="controls"> <?php echo h($adminuser['Adminuser']['adminname']); ?></div>
										</div>
										<div class="control-group">
											<label class="control-label">Username :</label>
											<div class="controls"> <?php echo h($adminuser['Adminuser']['username']); ?>	</div>
										</div>
										<div class="control-group">
											<label class="control-label">Email :</label>
											<div class="controls"><?php echo h($adminuser['Adminuser']['email']); ?></div>
										</div>
										<div class="control-group">
											<label class="control-label">Status :</label>
											<div class="controls"><?php echo h($adminuser['Adminuser']['status']); ?></div>
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
