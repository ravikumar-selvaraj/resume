<div class="sitecontacts view">
<h2><?php  echo __('Sitecontact'); ?></h2>
	<dl>
		<dt><?php echo __('Cid'); ?></dt>
		<dd>
			<?php echo h($sitecontact['Sitecontact']['cid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($sitecontact['Sitecontact']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($sitecontact['Sitecontact']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($sitecontact['Sitecontact']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($sitecontact['Sitecontact']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo h($sitecontact['Sitecontact']['subject']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($sitecontact['Sitecontact']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($sitecontact['Sitecontact']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('View'); ?></dt>
		<dd>
			<?php echo h($sitecontact['Sitecontact']['view']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reply'); ?></dt>
		<dd>
			<?php echo h($sitecontact['Sitecontact']['reply']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Replymessage'); ?></dt>
		<dd>
			<?php echo h($sitecontact['Sitecontact']['replymessage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($sitecontact['Sitecontact']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sitecontact'), array('action' => 'edit', $sitecontact['Sitecontact']['cid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sitecontact'), array('action' => 'delete', $sitecontact['Sitecontact']['cid']), null, __('Are you sure you want to delete # %s?', $sitecontact['Sitecontact']['cid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sitecontacts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sitecontact'), array('action' => 'add')); ?> </li>
	</ul>
</div>
