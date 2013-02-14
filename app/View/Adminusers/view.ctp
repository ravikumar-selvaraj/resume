<div class="adminusers view">
<h2><?php  echo __('Adminuser'); ?></h2>
	<dl>
		<dt><?php echo __('Aid'); ?></dt>
		<dd>
			<?php echo h($adminuser['Adminuser']['aid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adminname'); ?></dt>
		<dd>
			<?php echo h($adminuser['Adminuser']['adminname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($adminuser['Adminuser']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($adminuser['Adminuser']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($adminuser['Adminuser']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createddate'); ?></dt>
		<dd>
			<?php echo h($adminuser['Adminuser']['createddate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($adminuser['Adminuser']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Adminuser'), array('action' => 'edit', $adminuser['Adminuser']['aid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Adminuser'), array('action' => 'delete', $adminuser['Adminuser']['aid']), null, __('Are you sure you want to delete # %s?', $adminuser['Adminuser']['aid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Adminusers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Adminuser'), array('action' => 'add')); ?> </li>
	</ul>
</div>
