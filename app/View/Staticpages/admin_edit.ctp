<?php echo $this->html->script(array('ckeditor/ckeditor'));?>
<div class="content">        
        <div class="header">            
            <h1 class="page-title">Edit Staticpage</h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="#">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo BASE_URL;?>admin/staticpages">Staticpages</a> <span class="divider">/</span></li>
					<li class="active">Edit Staticpage</li>
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
					 <input type="hidden" value="<?php echo $this->request->data['Staticpage']['sta_id']; ?>" name="data[sta_id]" />
					<input name="data[lan]" type="hidden" value="<?php echo $this->params['pass'][0];?>" />
						 <label>Language</label>
						<select name="data[lan1]" id="lan" class="validate[required] input-xlarge" onchange="MM_jumpMenu(this.value);">
						  <option value="<?php echo BASE_URL;?>admin/staticpages/edit/eng/<?php echo $this->params['pass'][1];?>" <?php if($this->params['pass'][0] == 'eng') echo 'selected="selected"';;?>>English</option>
						  <option value="<?php echo BASE_URL;?>admin/staticpages/edit/spa/<?php echo $this->params['pass'][1];?>" <?php if($this->params['pass'][0] == 'spa') echo 'selected="selected"';?>>Spanish</option>
						</select>
						<label>Name</label>
						<input type="text" name="data[sta_name]" id="sta_name" value="<?php echo $this->request->data['Staticpage']['sta_name'];?>" class="validate[required] input-xlarge">
                        <!--<label>URL</label>
						<input type="text" name="data[sta_url]" id="sta_url" value="" class="validate[required] input-xlarge">-->
						<label>Title</label>
						<input type="text" name="data[sta_title]" id="sta_title" value="<?php echo $this->request->data['Staticpage']['sta_title'];?>" class="validate[required] input-xlarge">
                        <label>Meta Keyword</label>
						<input type="text" name="data[sta_metakeyword]" id="sta_metakeyword" value="<?php echo $this->request->data['Staticpage']['sta_metakeyword'];?>" class="validate[required] input-xlarge">
                        <label>Meta Description</label>
						<input type="text" name="data[sta_metadescription]" id="sta_metadescription" value="<?php echo $this->request->data['Staticpage']['sta_metadescription'];?>" class="validate[required] input-xlarge">
						<label>Content</label>
						<textarea name="data[sta_content]" id="content" rows="5" class="validate[required] input-xlarge ckeditor"><?php echo $this->request->data['Staticpage']['sta_content'];?></textarea>
						<label>Status</label>
						<select name="data[status]" id="status" class="validate[required]">
						  <option value="Active"<?php if($this->request->data['Staticpage']['status'] == 'Active') echo 'selected="selected"';?>>Active</option>
						  <option value="Inactive" <?php if($this->request->data['Staticpage']['status'] == 'Inactive') echo 'selected="selected"';?>>Inactive</option>
					</select>
					<div class="btn-toolbar">
				<button class="btn btn-primary"><i class="icon-save"></i> Save</button>
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