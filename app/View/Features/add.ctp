<div class="content">
    <div class="cont-container">
    	<div class="backmgnt"><?php echo $this->Html->link(__('List Features'), array('action' => 'index')); ?></div>
        <h2>&nbsp;</h2>
		<?php echo $this->Form->create('Feature',array('id'=>'myForm','type' => 'file')); ?>
        <fieldset>
            <legend><?php echo __('Add Feature'); ?></legend>
            <dl class="inline">
    			<?php
		echo $this->Form->input('title',array('div'=>false,'error'=>false,'label' => array('text'=>'title<span class="required">*</span>'), 'before' => '<dt>', 'after' => '</dd>', 'between' => '</dt><dd>', 'class'=>'validate[required]'));
		echo $this->Form->input('description',array('div'=>false,'error'=>false,'label' => array('text'=>'description<span class="required">*</span>'), 'before' => '<dt>', 'after' => '</dd>', 'between' => '</dt><dd>', 'class'=>'validate[required]'));
		echo $this->Form->input('image',array('div'=>false,'error'=>false,'label' => array('text'=>'image<span class="required">*</span>'), 'before' => '<dt>', 'after' => '</dd>', 'between' => '</dt><dd>', 'class'=>'validate[required]'));
		echo $this->Form->input('key',array('div'=>false,'error'=>false,'label' => array('text'=>'key<span class="required">*</span>'), 'before' => '<dt>', 'after' => '</dd>', 'between' => '</dt><dd>', 'class'=>'validate[required]'));
		echo $this->Form->input('lan',array('div'=>false,'error'=>false,'label' => array('text'=>'lan<span class="required">*</span>'), 'before' => '<dt>', 'after' => '</dd>', 'between' => '</dt><dd>', 'class'=>'validate[required]'));
		echo $this->Form->input('link',array('div'=>false,'error'=>false,'label' => array('text'=>'link<span class="required">*</span>'), 'before' => '<dt>', 'after' => '</dd>', 'between' => '</dt><dd>', 'class'=>'validate[required]'));
		echo $this->Form->input('status',array('div'=>false,'error'=>false,'label' => array('text'=>'status<span class="required">*</span>'), 'before' => '<dt>', 'after' => '</dd>', 'between' => '</dt><dd>', 'class'=>'validate[required]'));
		echo $this->Form->input('created_date',array('div'=>false,'error'=>false,'label' => array('text'=>'created_date<span class="required">*</span>'), 'before' => '<dt>', 'after' => '</dd>', 'between' => '</dt><dd>', 'class'=>'validate[required]'));
	?>
				<?php		echo $this->Form->submit(__('Submit'),array('div'=>false, 'before' => '<dt><label></label></dt><dd>', 'after' => '</dd>'));	?>
            </dl>
        </fieldset>
			<?php echo $this->Form->end(); ?>
	</div>
</div>