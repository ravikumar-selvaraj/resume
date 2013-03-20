<div class="content">        
        <div class="header">            
            <h1 class="page-title">New Tag</h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="<?php echo BASE_URL;?>adminpanel">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo BASE_URL;?>tags">Tags List</a> <span class="divider">/</span></li>
					<li class="active">Edit Tag</li>
				</ul>

        <div class="container-fluid">
            <div class="row-fluid">
			
			<div class="well">
				
					  <div class="tab-pane active in" id="home">
					<form action="" name="career" id="mycareer" method="post" enctype="multipart/form-data">
					<input type="hidden" name="data[tid]" value="<?php echo $tags['Tag']['tid'];?>"  />
					<input name="data[lan]" type="hidden" value="<?php echo $this->params['pass'][0];?>" />
						<label>Language</label>
						<select name="data[lan1]" id="lan" class="validate[required] input-xlarge" onchange="MM_jumpMenu(this.value);">
						  <option value="<?php echo BASE_URL;?>admin/tags/edit/eng/<?php echo $this->params['pass'][1];?>" <?php if($this->params['pass'][0] == 'eng') echo 'selected="selected"';;?>>English</option>
						  <option value="<?php echo BASE_URL;?>admin/tags/edit/spa/<?php echo $this->params['pass'][1];?>" <?php if($this->params['pass'][0] == 'spa') echo 'selected="selected"';?>>Spanish</option>
						</select>
                    <label>Tag name</label>
						<input type="text" name="data[tag_name]" id="title" value="<?php echo $tags['Tag']['tag_name'];?>" class="validate[required] input-xlarge">
                    
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