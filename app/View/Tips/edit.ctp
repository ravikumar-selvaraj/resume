<div class="tips form">
<?php echo $this->Form->create('Tip'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tip'); ?></legend>
	<?php
		echo $this->Form->input('tid');
		echo $this->Form->input('tip_title');
		echo $this->Form->input('tip_content');
		echo $this->Form->input('created_date');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tip.tid')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tip.tid'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tips'), array('action' => 'index')); ?></li>
	</ul>
</div>
