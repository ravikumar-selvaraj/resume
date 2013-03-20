<?php echo $this->html->script(array('ckeditor/ckeditor'));?>
<div class="content">        
        <div class="header">            
            <h1 class="page-title">Edit Feature</h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="#">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo BASE_URL;?>admin/features">Features</a> <span class="divider">/</span></li>
					<li class="active">Edit Feature</li>
				</ul>

        <div class="container-fluid">
            <div class="row-fluid">
			
			
			<div class="well">
				
					  <div class="tab-pane active in" id="home">
					<form action="" name="blog" id="myblog" method="post" enctype="multipart/form-data">
					<input type="hidden" name="data[fid]" value="<?php echo $this->request->data['Feature']['fid'];?>" />
					<input name="data[lan]" type="hidden" value="<?php echo $this->params['pass'][0];?>" />
						<label>Language</label>
						<select name="data[lan1]" id="lan" class="validate[required] input-xlarge" onchange="MM_jumpMenu(this.value);">
						  <option value="<?php echo BASE_URL;?>admin/features/edit/eng/<?php echo $this->params['pass'][1];?>" <?php if($this->params['pass'][0] == 'eng') echo 'selected="selected"';;?>>English</option>
						  <option value="<?php echo BASE_URL;?>admin/features/edit/spa/<?php echo $this->params['pass'][1];?>" <?php if($this->params['pass'][0] == 'spa') echo 'selected="selected"';?>>Spanish</option>
						</select>
						
						<label>Title</label>
						<input type="text" name="data[title]" id="title" value="<?php echo $this->request->data['Feature']['title'];?>" class="validate[required] input-xlarge">
						<?php if($this->request->data['Feature']['image'] !='') { ?>
						<label>Old image</label>
						<?php echo $this->html->image('feature-images/small/'.$this->request->data['Feature']['image'],array('border'=>0,'alt'=>h($this->request->data['Feature']['title']))); ?>
						<?php $opt = 'optional';} else $opt = 'required'; ?>
						<label>Image</label>
						<input type="file" name="data[image]" id="image" class="validate[<?php echo $opt;?>,custom[image]] input-xlarge">
						<label>Content</label>
						<textarea name="data[description]" id="content" rows="5" class="validate[required] input-xlarge "><?php echo $this->request->data['Feature']['description'];?></textarea>
						<label>Status</label>
						<select name="data[status]" id="status" class="validate[required] input-xlarge">
						  <option value="Active" <?php if($this->request->data['Feature']['status'] == 'Active') echo 'selected="selected"';;?>>Active</option>
						  <option value="Inactive"  <?php if($this->request->data['Feature']['status'] == 'Inactive') echo 'selected="selected"';?>>Inactive</option>
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