<div class="sitecontacts form">
<?php echo $this->Form->create('Sitecontact'); ?>
	<fieldset>
		<legend><?php echo __('Add Sitecontact'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Sitecontacts'), array('action' => 'index')); ?></li>
	</ul>
</div>
