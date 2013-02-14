<div class="staticpages view">
<h2><?php  echo __('Staticpage'); ?></h2>
	<dl>
		<dt><?php echo __('Sid'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['sid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['parent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['place']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metakeyword'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['metakeyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Metadescription'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['metadescription']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createddate'); ?></dt>
		<dd>
			<?php echo h($staticpage['Staticpage']['createddate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Staticpage'), array('action' => 'edit', $staticpage['Staticpage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Staticpage'), array('action' => 'delete', $staticpage['Staticpage']['id']), null, __('Are you sure you want to delete # %s?', $staticpage['Staticpage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Staticpages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staticpage'), array('action' => 'add')); ?> </li>
	</ul>
</div>
