<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="content">
    <div class="cont-container">
    	<div class="backmgnt"><?php echo "<?php echo \$this->Html->link(__('List " . $pluralHumanName . "'), array('action' => 'index')); ?>"; ?></div>
        <h2>&nbsp;</h2>
		<?php echo "<?php echo \$this->Form->create('{$modelClass}',array('id'=>'myForm','type' => 'file')); ?>\n"; ?>
        <fieldset>
            <legend><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></legend>
            <dl class="inline">
    		<?php
            echo "\t<?php\n";
            foreach ($fields as $field) {
                if (strpos($action, 'add') !== false && $field == $primaryKey) {
                    continue;
                } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                    echo "\t\techo \$this->Form->input('{$field}',array('div'=>false,'error'=>false,'label' => array('text'=>'{$field}<span class=\"required\">*</span>'), 'before' => '<dt>', 'after' => '</dd>', 'between' => '</dt><dd>', 'class'=>'validate[required]'));\n";
                }
            }
            if (!empty($associations['hasAndBelongsToMany'])) {
                foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                    echo "\t\techo \$this->Form->input('{$assocName}');\n";
                }
            }
            echo "\t?>\n";
    		?>
			<?php echo "\t<?php\t\techo \$this->Form->submit(__('Submit'),array('div'=>false, 'before' => '<dt><label></label></dt><dd>', 'after' => '</dd>'));\t?>\n"; ?>
            </dl>
        </fieldset>
			<?php
                echo "<?php echo \$this->Form->end(); ?>\n";
            ?>
	</div>
</div>