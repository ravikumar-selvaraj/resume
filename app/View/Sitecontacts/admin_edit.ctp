<div class="sitecontacts form">
<?php echo $this->Form->create('Sitecontact'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Sitecontact'); ?></legend>
	<?php
		echo $this->Form->input('cid');
		echo $this->Form->input('name');
		echo $this->Form->input('company');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('subject');
		echo $this->Form->input('message');
		echo $this->Form->input('date');
		echo $this->Form->input('view');
		echo $this->Form->input('reply');
		echo $this->Form->input('replymessage');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Sitecontact.cid')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Sitecontact.cid'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sitecontacts'), array('action' => 'index')); ?></li>
	</ul>
</div>
