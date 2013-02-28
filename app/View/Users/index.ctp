<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('uid'); ?></th>
			<th><?php echo $this->Paginator->sort('user_key'); ?></th>
			<th><?php echo $this->Paginator->sort('firstname'); ?></th>
			<th><?php echo $this->Paginator->sort('lastname'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('im'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('zipcode'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('resume_title'); ?></th>
			<th><?php echo $this->Paginator->sort('resume_desc'); ?></th>
			<th><?php echo $this->Paginator->sort('webpage_view'); ?></th>
			<th><?php echo $this->Paginator->sort('resume_password'); ?></th>
			<th><?php echo $this->Paginator->sort('set_password'); ?></th>
			<th><?php echo $this->Paginator->sort('professional'); ?></th>
			<th><?php echo $this->Paginator->sort('professional_status'); ?></th>
			<th><?php echo $this->Paginator->sort('about_me'); ?></th>
			<th><?php echo $this->Paginator->sort('rss_feed'); ?></th>
			<th><?php echo $this->Paginator->sort('social_links'); ?></th>
			<th><?php echo $this->Paginator->sort('newsletter'); ?></th>
			<th><?php echo $this->Paginator->sort('career_newsletter'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created_date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['uid']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['user_key']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['gender']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['phone']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['im']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['city']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['zipcode']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['image']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['country']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['resume_title']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['resume_desc']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['webpage_view']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['resume_password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['set_password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['professional']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['professional_status']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['about_me']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['rss_feed']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['social_links']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['newsletter']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['career_newsletter']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['status']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created_date']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['uid'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['uid'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['uid']), null, __('Are you sure you want to delete # %s?', $user['User']['uid'])); ?>
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
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
	</ul>
</div>
