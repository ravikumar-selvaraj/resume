<div class="staticpages form">
<?php echo $this->Form->create('Staticpage'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Staticpage'); ?></legend>
	<?php
		echo $this->Form->input('sid');
		echo $this->Form->input('name');
		echo $this->Form->input('parent');
		echo $this->Form->input('place');
		echo $this->Form->input('position');
		echo $this->Form->input('link');
		echo $this->Form->input('title');
		echo $this->Form->input('metakeyword');
		echo $this->Form->input('metadescription');
		echo $this->Form->input('content');
		echo $this->Form->input('status');
		echo $this->Form->input('createddate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Staticpages'), array('action' => 'index')); ?></li>
	</ul>
</div>
