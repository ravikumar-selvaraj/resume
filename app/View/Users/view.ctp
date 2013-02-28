<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Uid'); ?></dt>
		<dd>
			<?php echo h($user['User']['uid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Key'); ?></dt>
		<dd>
			<?php echo h($user['User']['user_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($user['User']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($user['User']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($user['User']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Im'); ?></dt>
		<dd>
			<?php echo h($user['User']['im']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($user['User']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zipcode'); ?></dt>
		<dd>
			<?php echo h($user['User']['zipcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($user['User']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($user['User']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resume Title'); ?></dt>
		<dd>
			<?php echo h($user['User']['resume_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resume Desc'); ?></dt>
		<dd>
			<?php echo h($user['User']['resume_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Webpage View'); ?></dt>
		<dd>
			<?php echo h($user['User']['webpage_view']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resume Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['resume_password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Set Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['set_password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Professional'); ?></dt>
		<dd>
			<?php echo h($user['User']['professional']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Professional Status'); ?></dt>
		<dd>
			<?php echo h($user['User']['professional_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('About Me'); ?></dt>
		<dd>
			<?php echo h($user['User']['about_me']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rss Feed'); ?></dt>
		<dd>
			<?php echo h($user['User']['rss_feed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Social Links'); ?></dt>
		<dd>
			<?php echo h($user['User']['social_links']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Newsletter'); ?></dt>
		<dd>
			<?php echo h($user['User']['newsletter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Career Newsletter'); ?></dt>
		<dd>
			<?php echo h($user['User']['career_newsletter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($user['User']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
			<?php echo h($user['User']['created_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['uid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['uid']), null, __('Are you sure you want to delete # %s?', $user['User']['uid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
