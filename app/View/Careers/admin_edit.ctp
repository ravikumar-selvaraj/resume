<?php echo $this->html->script(array('ckeditor/ckeditor'));?>
<div class="content">        
        <div class="header">            
            <h1 class="page-title">Edit Career Advice</h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="#">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo BASE_URL.'admin/careers'?>">Careers List</a> <span class="divider">/</span></li>
					<li class="active">New Career</li>
				</ul>

        <div class="container-fluid">
            <div class="row-fluid">
			
			<div class="well">
				
					  <div class="tab-pane active in" id="home">
					<form action="" name="career" id="mycareer" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo h($careers['Career']['cid']); ?>" name="data[cid]" />
                    <label>Title</label>
						<input type="text" name="data[title]" id="title" value="<?php echo h($careers['Career']['title']); ?>" class="validate[required] input-xlarge">
                    <label>Category</label>
						<select name="data[category]" id="category" class="validate[required] input-xlarge">
						  <option value="Find job"  <?php if($careers['Career']['category']=='Find job')echo 'selected="selected"'; ?>>Find job</option>
						  <option value="Get a great resume"  <?php if($careers['Career']['category']=='Get a great resume')echo 'selected="selected"'; ?>>Get a great resume</option>
                          <option value="Manage your career"  <?php if($careers['Career']['category']=='Manage your career')echo 'selected="selected"'; ?>>Manage your career</option>
					</select>
						<label>Old Image</label><?php echo $this->html->image('career-image/small/'.$careers['Career']['image'],array('border'=>0,'alt'=>h($careers['Career']['title']))); ?>
						<label>Image</label>
						<input type="file" name="data[image]" id="image" class="validate[optional,custom[image]] input-xlarge">
						<label>Content</label>
						<textarea name="data[content]" id="content" rows="5" value="" class="validate[required] input-xlarge ckeditor"><?php echo h($careers['Career']['content']); ?></textarea>
						<label>Status</label>
						<select name="data[status]" id="status" class="validate[required] input-xlarge">
                        
                         <option value="Active" <?php if($careers['Career']['status']=='Active')echo 'selected="selected"'; ?>>Active</option>
                        <option value="Inactive" <?php if($careers['Career']['status']=='Inactive')echo 'selected="selected"'; ?>>Inactive</option>
						  
					</select>
                    
					<div class="btn-toolbar">
				<button class="btn btn-primary"><i class="icon-save"></i> Save</button>
				
			  	<div class="btn-group"> </div>
			</div>
					</form>
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