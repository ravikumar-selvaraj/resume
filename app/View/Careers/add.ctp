<div class="careers form">
<?php echo $this->Form->create('Career'); ?>
	<fieldset>
		<legend><?php echo __('Add Career'); ?></legend>
	<?php
		echo $this->Form->input('category');
		echo $this->Form->input('title');
		echo $this->Form->input('content');
		echo $this->Form->input('image');
		echo $this->Form->input('status');
		echo $this->Form->input('created_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Careers'), array('action' => 'index')); ?></li>
	</ul>
</div>
