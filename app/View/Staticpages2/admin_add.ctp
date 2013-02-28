<?php echo $this->html->script(array('ckeditor/ckeditor'));?>
<div class="content">        
        <div class="header">            
            <h1 class="page-title">New staticpages</h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="<?php echo BASE_URL;?>staticpages">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo BASE_URL;?>admin/staticpages">Staticpages</a> <span class="divider">/</span></li>
					<li class="active">New staticpages</li>
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
						<label>Name</label>
						<input type="text" name="data[sta_name]" id="sta_name" value="" class="validate[required] input-xlarge">
                        <label>URL</label>
						<input type="text" name="data[sta_url]" id="sta_url" value="" class="validate[required] input-xlarge">
						<label>Title</label>
						<input type="text" name="data[sta_title]" id="sta_title" value="" class="validate[required] input-xlarge">
                        <label>Meta Keyword</label>
						<input type="text" name="data[sta_metakeyword]" id="sta_metakeyword" value="" class="validate[required] input-xlarge">
                        <label>Meta Description</label>
						<input type="text" name="data[sta_metadescription]" id="sta_metadescription" value="" class="validate[required] input-xlarge">
						<label>Content</label>
						<textarea name="data[sta_content]" id="content" rows="5" class="validate[required] input-xlarge ckeditor"></textarea>
						<label>Status</label>
						<select name="data[status]" id="status" class="validate[required]">
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

                 
                    <footer>
                        <hr>
                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                        

                        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>