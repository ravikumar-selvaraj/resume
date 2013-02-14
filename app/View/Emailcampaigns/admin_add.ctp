<?php echo $this->html->script(array('ckeditor/ckeditor'));?>
<div class="content">        
        <div class="header">            
            <h1 class="page-title">New Career Advice</h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="index.html">Home</a> <span class="divider">/</span></li>
					<li><a href=".">Email Campaign List</a> <span class="divider">/</span></li>
					<li class="active">New Career</li>
				</ul>

        <div class="container-fluid">
            <div class="row-fluid">
			
			<div class="well">
				
					  <div class="tab-pane active in" id="home">
					<form action="" name="campaign" id="mycampaign" method="post" enctype="multipart/form-data">
                        <label>Name</label>
						<input type="text" name="data[name]" id="name" value="" class="validate[required] input-xlarge">
                        <label>Subject</label>
						<input type="text" name="data[subject]" id="subject" value="" class="validate[required] input-xlarge">
						<label>From</label>
						<input type="text" name="data[from]" id="from" class="validate[required] input-xlarge">
						<label>Reply</label>
                        <input type="text" name="data[reply]" id="reply" class="validate[required] input-xlarge">
						<label>To</label>
                        <input type="text" name="data[to]" id="to" class="validate[required] input-xlarge">
                        <label>Message</label>
                        <textarea name="data[message]" id="message" rows="5" class="validate[required] input-xlarge ckeditor"></textarea>
                     
                        <label>Option</label>
                        <textarea name="data[option]" id="option" rows="5" class="validate[required] input-xlarge"></textarea>
                       
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