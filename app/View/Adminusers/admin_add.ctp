<div class="content">        
        <div class="header">            
            <h1 class="page-title">New User</h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="<?php echo BASE_URL;?>adminpanel">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo BASE_URL;?>admin/adminusers">Users</a> <span class="divider">/</span></li>
					<li class="active">New User</li>
				</ul>

        <div class="container-fluid">
            <div class="row-fluid">
			
			<?php 
			if(!empty($_SESSION['Message']['flash'])) { ?>
	 		
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong><?php echo $_SESSION['Message']['flash']['message'];?> </strong>
		</div>
     <?php } ?>
			
			<div class="well">
				
					  <div class="tab-pane active in" id="home">
					<form action="" name="users" id="users" method="post" enctype="multipart/form-data">
						<label>Adminname</label>
						<input type="text" name="data[adminname]" id="adminname" value="<?php echo $this->request->data('adminname');?>" class="validate[required] input-xlarge">
						<label>Username</label>
						<input type="text" name="data[username]" id="username" value="<?php echo $this->request->data('username');?>" class="validate[required] input-xlarge">
						<label>Password</label>
						<input type="password" name="data[password]" id="password"  class="validate[required] input-xlarge"></textarea>
						<label>Email</label>
						<input type="text" name="data[email]" id="email" value="<?php echo $this->request->data('email');?>" class="validate[required,custom[email]] input-xlarge"></textarea>
						<label>Status</label>
						<select name="data[status]" id="status" class="validate[required] input-xlarge">
						  <option value="Active" <?php if($this->request->data('status') == 'Active') echo 'selected="selected"';?>>Active</option>
						  <option value="Inactive" <?php if($this->request->data('status') == 'Inactive') echo 'selected="selected"';?>>Inactive</option>
					</select>
					<div class="btn-toolbar">
				<button class="btn btn-primary"><i class="icon-save"></i> Save</button>
			  	<div class="btn-group"> </div>
			</div>
					</form>
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