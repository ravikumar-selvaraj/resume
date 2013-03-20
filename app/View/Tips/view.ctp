<div class="tips view">
<h2><?php  echo __('Tip'); ?></h2>
	<dl>
		<dt><?php echo __('Tid'); ?></dt>
		<dd>
			<?php echo h($tip['Tip']['tid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tip Title'); ?></dt>
		<dd>
			<?php echo h($tip['Tip']['tip_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tip Content'); ?></dt>
		<dd>
			<?php echo h($tip['Tip']['tip_content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
			<?php echo h($tip['Tip']['created_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($tip['Tip']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tip'), array('action' => 'edit', $tip['Tip']['tid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tip'), array('action' => 'delete', $tip['Tip']['tid']), null, __('Are you sure you want to delete # %s?', $tip['Tip']['tid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tips'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tip'), array('action' => 'add')); ?> </li>
	</ul>
</div>
