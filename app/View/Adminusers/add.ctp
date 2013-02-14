<div class="adminusers form">
<?php echo $this->Form->create('Adminuser'); ?>
	<fieldset>
		<legend><?php echo __('Add Adminuser'); ?></legend>
	<?php
		echo $this->Form->input('adminname');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		echo $this->Form->input('createddate');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Adminusers'), array('action' => 'index')); ?></li>
	</ul>
</div>
