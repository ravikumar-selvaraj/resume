
<div class="content">        
        <div class="header">            
            <h1 class="page-title">New staticpages</h1>
        </div>        
                <ul class="breadcrumb">
					<li><a href="<?php echo BASE_URL;?>staticpages">Home</a> <span class="divider">/</span></li>
					<li><a href="<?php echo BASE_URL;?>admin/staticpages">Blogs</a> <span class="divider">/</span></li>
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
<?php echo $this->Form->create('Staticpage'); ?>
	<fieldset>
		<legend><?php echo __('Add Staticpage'); ?></legend>
	<?php
	
		echo $this->Form->input('sta_title');
		echo $this->Form->input('sta_name');
		echo $this->Form->input('sta_link');
		echo $this->Form->input('sta_type');
		echo $this->Form->input('sta_url');
		echo $this->Form->input('sta_title');
		echo $this->Form->input('sta_metakeyword');
		echo $this->Form->input('sta_metadescription');
		echo $this->Form->input('sta_content');
		echo $this->Form->input('status', array('class' => 'chzn-select', 'options' => array('opt1' => 'Select Status', 'opt2' => 'Active', 'opt3' => 'Inactive', 'opt4' => 'Trash'), 'label' => false, 'div' => array('class' => 'formRight noSearch')));
	   
	    ?>
	
	</fieldset>
<?php echo $this->Form->button(__('Submit', true), array('div' => false,'class'=>'btn btn-primary')).'&nbsp;'?>
<?php echo $this->Form->button('Reset', array('type'=>'reset','div' => false,'class'=>'btn'))?>
<?php echo $this->Form->end(); ?>
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