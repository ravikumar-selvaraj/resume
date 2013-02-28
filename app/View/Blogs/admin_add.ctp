<?php echo $this->html->script(array('ckeditor/ckeditor'));?>
<div class="content">        
        <div class="header">            
            <h1 class="page-title">New Blog</h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="#">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo BASE_URL;?>admin/blogs">Blogs</a> <span class="divider">/</span></li>
					<li class="active">New Blog</li>
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
					<form action="" name="blog" id="myblog" method="post" enctype="multipart/form-data">
						<label>Title</label>
						<input type="text" name="data[title]" id="title" value="" class="validate[required] input-xlarge">
						<label>Image</label>
						<input type="file" name="data[image]" id="image" class="validate[required,custom[image]] input-xlarge">
						<label>Content</label>
						<textarea name="data[content]" id="content" rows="5" class="validate[required] input-xlarge ckeditor"></textarea>
						<label>Status</label>
						<select name="data[status]" id="status" class="validate[required] input-xlarge">
						  <option value="Active">Active</option>
						  <option value="Inactive">Inactive</option>
					</select>
					<div class="btn-toolbar">
				<button class="btn btn-primary"><i class="icon-save"></i> Save</button>
				<a href="#myModal" data-toggle="modal" class="btn">Delete</a>
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