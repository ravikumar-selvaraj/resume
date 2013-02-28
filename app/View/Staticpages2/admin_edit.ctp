<div class="content">
  <div class="header">
    <h1 class="page-title">Edit Static pages</h1>
  </div>
  <ul class="breadcrumb">
    <li><a href="<?php echo BASE_URL;?>admin">Home</a> <span class="divider">/</span></li>
    <li><a href="<?php echo BASE_URL;?>admin/staticpages">Static pages</a> <span class="divider">/</span></li>
    <li class="active">Edit Static pages</li>
  </ul>
  <div class="container-fluid">
    <div class="row-fluid">
      <?php 
			if(!empty($_SESSION['Message']['flash'])) { ?>
      <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><?php echo $_SESSION['Message']['flash']['message'];?> </strong> </div>
      <?php } ?>
      <div class="well">
        <div class="tab-pane active in" id="home"> <?php echo $this->Form->create('Staticpage'); ?>
          <fieldset>
            <legend><?php echo __('Admin Edit Staticpage'); ?></legend>
            <?php
				//echo $this->Form->input('sta_title');
				//echo $this->Form->input('sta_id');
				echo $this->Form->input('sta_name');
				// echo $this->Form->input('sta_link');
				//echo $this->Form->input('sta_type');
				echo $this->Form->input('sta_url');
				echo $this->Form->input('sta_title');
				echo $this->Form->input('sta_metakeyword');
				echo $this->Form->input('sta_metadescription');
				echo $this->Form->input('sta_content');
				//echo $this->Form->input('status', array('class' => 'chzn-select', 'options' => $languageOptions,'selected' =>'opt5', 'label' => false, 'div' => array('class' =>'formRight noSearch')));
	?>
          <label>Status</label>
						<select name="data[status]" id="status" class="validate[required] input-xlarge">
						  <option value="Active" <?php if($this->request->data['Staticpage']['status'] == 'Active') echo 'selected="selected"';;?>>Active</option>
						  <option value="Inactive"  <?php if($this->request->data['Staticpage']['status'] == 'Inactive') echo 'selected="selected"';?>>Inactive</option>
					</select>
          </fieldset>
          <?php //echo $this->Form->end(__('Submit')); ?>
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
