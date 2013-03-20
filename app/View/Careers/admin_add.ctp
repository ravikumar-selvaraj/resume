<?php echo $this->html->script(array('ckeditor/ckeditor'));?>
<div class="content">        
        <div class="header">            
            <h1 class="page-title">New Career Advice</h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="#">Home</a> <span class="divider">/</span></li>
					<li><a href=".">Careers List</a> <span class="divider">/</span></li>
					<li class="active">New Career</li>
				</ul>

        <div class="container-fluid">
            <div class="row-fluid">
			
			<div class="well">
				
					  <div class="tab-pane active in" id="home">
					<form action="" name="career" id="mycareer" method="post" enctype="multipart/form-data">
					<input type="hidden" value="eng" name="data[lan]" />
					<!--<label>Language</label>
						<select name="data[lan]" id="lan" class="validate[required] input-xlarge">
						  <option value="eng">English</option>
						  <option value="spa">Spanish</option>
						</select>-->
                    <label>Title</label>
						<input type="text" name="data[title]" id="title" value="" class="validate[required] input-xlarge">
                    <label>Category</label>
						<select name="data[category]" id="category" class="validate[required] input-xlarge">
						  <option value="Find job">Find job</option>
						  <option value="Get a great resume">Get a great resume</option>
                          <option value="Manage your career">Manage your career</option>
					</select>
					
					<label>Tags</label>
					<select name="data[tag][]" id="tag" multiple="multiple" class="validate[required] input-xlarge">
					<?php foreach($tags as $tag){?>
					<option value="<?php echo $tag['Tag']['tag_name'];?>"><?php echo $tag['Tag']['tag_name'];?></option>
					<?php } ?>
					</select>
						
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