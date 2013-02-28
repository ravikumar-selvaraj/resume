<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit User'); ?></legend>
	<?php
		echo $this->Form->input('uid');
		echo $this->Form->input('user_key');
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('gender');
		echo $this->Form->input('phone');
		echo $this->Form->input('im');
		echo $this->Form->input('city');
		echo $this->Form->input('zipcode');
		echo $this->Form->input('image');
		echo $this->Form->input('country');
		echo $this->Form->input('resume_title');
		echo $this->Form->input('resume_desc');
		echo $this->Form->input('webpage_view');
		echo $this->Form->input('resume_password');
		echo $this->Form->input('set_password');
		echo $this->Form->input('professional');
		echo $this->Form->input('professional_status');
		echo $this->Form->input('about_me');
		echo $this->Form->input('rss_feed');
		echo $this->Form->input('social_links');
		echo $this->Form->input('newsletter');
		echo $this->Form->input('career_newsletter');
		echo $this->Form->input('status');
		echo $this->Form->input('created_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.uid')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.uid'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
