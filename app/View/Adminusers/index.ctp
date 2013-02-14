<div class="adminusers index">
	<h2><?php echo __('Adminusers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('aid'); ?></th>
			<th><?php echo $this->Paginator->sort('adminname'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('createddate'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($adminusers as $adminuser): ?>
	<tr>
		<td><?php echo h($adminuser['Adminuser']['aid']); ?>&nbsp;</td>
		<td><?php echo h($adminuser['Adminuser']['adminname']); ?>&nbsp;</td>
		<td><?php echo h($adminuser['Adminuser']['username']); ?>&nbsp;</td>
		<td><?php echo h($adminuser['Adminuser']['password']); ?>&nbsp;</td>
		<td><?php echo h($adminuser['Adminuser']['email']); ?>&nbsp;</td>
		<td><?php echo h($adminuser['Adminuser']['createddate']); ?>&nbsp;</td>
		<td><?php echo h($adminuser['Adminuser']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $adminuser['Adminuser']['aid'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $adminuser['Adminuser']['aid'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $adminuser['Adminuser']['aid']), null, __('Are you sure you want to delete # %s?', $adminuser['Adminuser']['aid'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Adminuser'), array('action' => 'add')); ?></li>
	</ul>
</div>
