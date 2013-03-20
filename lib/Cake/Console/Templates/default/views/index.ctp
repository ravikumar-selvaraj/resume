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
App::import('Model', $modelClass);
$model = new $modelClass();
$types = $model->getColumnTypes();
//print_r($types);
?>
<div class="content">
    <div class="cont-container">
    	<div class="addnew"><?php echo "<?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($singularVar)) . "'), array('controller' => '{$pluralVar}', 'action' => 'add')); ?>"; ?></div>
        <h2><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
        <?php echo "<?php echo \$this->Form->create('{$modelClass}', array('action' => 'actions','id'=>'myForm')); ?>\n"; ?>
        <table cellpadding="0" cellspacing="0" id="example" class="table gtable">
        <thead>
        <tr>
            <th width="30" class="notsort"><?php echo "<?php echo __('<input type=\"checkbox\" id=\"checkAllAuto\" name=\"action[]\" value=\"0\" class=\"validate[minCheckbox[1]] checkbox\" />'); ?>"; ?></th>
            <th width="30" class="notsort"><?php echo "<?php echo __('#'); ?>"; ?></th>
        <?php  foreach ($fields as $field): if($types[$field]!='integer') { ?>
            <th><div id="sort"><?php echo $field; ?><div id="sorticon"></div></div></th>
        <?php } endforeach; ?>
        </tr>
        </thead>
        <tbody>
        <?php
        echo "<?php
		\$i = 1;
        foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
        echo "\t<tr>\n";		
            echo "\t\t<td><input type=\"checkbox\" name=\"action[]\" value=\"<?php echo h(\${$singularVar}['{$modelClass}']['{$fields[0]}']); ?>\" rel=\"action\" /></td>\n";
            echo "\t\t<td><?php echo h(\$i); ?></td>\n";
			$f = 0;
            foreach ($fields as $field) {
                $isKey = false;
                if (!empty($associations['belongsTo'])) {
                    foreach ($associations['belongsTo'] as $alias => $details) {
                        if ($field === $details['foreignKey']) {
                            $isKey = true;
                            echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                            break;
                        }
                    }
                }
                if ($isKey !== true) {
					if($types[$field]!='integer'){
						if($f==0){
                    		echo "\t\t<td width=\"130\"><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?><br>";
                    		echo "<ul class=\"actions\">\n";
                    		echo "<li><?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>&nbsp;|&nbsp;</li>\n";
                    		echo "<li><?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>&nbsp;|&nbsp;</li>\n";
                    		echo "<li><?php echo \$this->Html->link(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class'=>'confirdel')); ?></li>\n";
                    		echo "</ul>\n";
                    		echo "</td>\n";
						}
						else
                    		echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?></td>\n";
						$f++;
					}
                }
            }
        echo "\t</tr>\n";
		echo "";
        echo "<?php \$i++; endforeach; ?>\n";
        ?>
        </tbody>
        </table>
        <?php echo "<?php echo \$this->Form->end(); ?>\n"; ?>
	</div>
</div>