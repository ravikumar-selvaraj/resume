<?php
/**
 * Bake Template for Controller action generation.
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
 * @package       Cake.Console.Templates.default.actions
 * @since         CakePHP(tm) v 1.3
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 if(!empty($admin))
 $check = "\$this->checkadmin();\n";
?>

/**
 * <?php echo $admin ?>index method
 *
 * @return void
 */
	public function <?php echo $admin ?>index() {
    	<?php echo $check; ?>
		$this-><?php echo $currentModelName ?>->recursive = 0;
		$this->set('<?php echo $pluralName ?>', $this-><?php echo $currentModelName; ?>->findAll());
	}

/**
 * <?php echo $admin ?>view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin ?>view($id = null) {
    	<?php echo $check; ?>
		$this-><?php echo $currentModelName; ?>->id = $id;
		if (!$this-><?php echo $currentModelName; ?>->exists()) {
			throw new NotFoundException(__('Invalid <?php echo strtolower($singularHumanName); ?>'));
		}
		$this->set('<?php echo $singularName; ?>', $this-><?php echo $currentModelName; ?>->read(null, $id));
	}

<?php $compact = array(); ?>
/**
 * <?php echo $admin ?>add method
 *
 * @return void
 */
	public function <?php echo $admin ?>add() {
    	<?php echo $check; ?>
		if ($this->request->is('post')) {
			$this-><?php echo $currentModelName; ?>->create();
			if ($this-><?php echo $currentModelName; ?>->save($this->request->data)) {
<?php if ($wannaUseSession): ?>
				$this->Session->setFlash("<div class='success msg'>The <?php echo strtolower($singularHumanName); ?> has been saved</div>",'');
				$this->redirect(array('action' => 'index'));
<?php else: ?>
				$this->flash(__('<?php echo ucfirst(strtolower($currentModelName)); ?> saved.'), array('action' => 'index'));
<?php endif; ?>
			} else {
<?php if ($wannaUseSession): ?>
				$this->Session->setFlash("<div class='error msg'>The <?php echo strtolower($singularHumanName); ?> could not be saved. Please, try again.</div>",'');
<?php endif; ?>
			}
		}
<?php
	foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
		foreach ($modelObj->{$assoc} as $associationName => $relation):
			if (!empty($associationName)):
				$otherModelName = $this->_modelName($associationName);
				$otherPluralName = $this->_pluralName($associationName);
				echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
				$compact[] = "'{$otherPluralName}'";
			endif;
		endforeach;
	endforeach;
	if (!empty($compact)):
		echo "\t\t\$this->set(compact(".join(', ', $compact)."));\n";
	endif;
?>
	}

<?php $compact = array(); ?>
/**
 * <?php echo $admin ?>edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin; ?>edit($id = null) {
    	<?php echo $check; ?>
		$this-><?php echo $currentModelName; ?>->id = $id;
		if (!$this-><?php echo $currentModelName; ?>->exists()) {
			throw new NotFoundException(__('Invalid <?php echo strtolower($singularHumanName); ?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this-><?php echo $currentModelName; ?>->save($this->request->data)) {
<?php if ($wannaUseSession): ?>
				$this->Session->setFlash("<div class='success msg'>The <?php echo strtolower($singularHumanName); ?> has been saved</div>",'');
				$this->redirect(array('action' => 'index'));
<?php else: ?>
				$this->flash(__('The <?php echo strtolower($singularHumanName); ?> has been saved.'), array('action' => 'index'));
<?php endif; ?>
			} else {
<?php if ($wannaUseSession): ?>
				$this->Session->setFlash("<div class='error msg'>The <?php echo strtolower($singularHumanName); ?> could not be saved. Please, try again.</div>",'');
<?php endif; ?>
			}
		} else {
			$this->request->data = $this-><?php echo $currentModelName; ?>->read(null, $id);
		}
<?php
		foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
			foreach ($modelObj->{$assoc} as $associationName => $relation):
				if (!empty($associationName)):
					$otherModelName = $this->_modelName($associationName);
					$otherPluralName = $this->_pluralName($associationName);
					echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
					$compact[] = "'{$otherPluralName}'";
				endif;
			endforeach;
		endforeach;
		if (!empty($compact)):
			echo "\t\t\$this->set(compact(".join(', ', $compact)."));\n";
		endif;
	?>
	}

/**
 * <?php echo $admin ?>delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin; ?>delete($id = null) {
    	<?php echo $check; ?>
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this-><?php echo $currentModelName; ?>->id = $id;
		if (!$this-><?php echo $currentModelName; ?>->exists()) {
			throw new NotFoundException(__('Invalid <?php echo strtolower($singularHumanName); ?>'));
		}
		if ($this-><?php echo $currentModelName; ?>->delete()) {
<?php if ($wannaUseSession): ?>
			$this->Session->setFlash("<div class='success msg'><?php echo ucfirst(strtolower($singularHumanName)); ?> deleted.</div>",'');
			$this->redirect(array('action' => 'index'));
<?php else: ?>
			$this->flash(__('<?php echo ucfirst(strtolower($singularHumanName)); ?> deleted'), array('action' => 'index'));
<?php endif; ?>
		}
<?php if ($wannaUseSession): ?>
		$this->Session->setFlash("<div class='error msg'><?php echo ucfirst(strtolower($singularHumanName)); ?> was not deleted.</div>",'');
<?php else: ?>
		$this->flash(__('<?php echo ucfirst(strtolower($singularHumanName)); ?> was not deleted'), array('action' => 'index'));
<?php endif; ?>
		$this->redirect(array('action' => 'index'));
	}
 
<?php  if(!empty($admin)) { ?>    
/**
 * <?php echo $admin ?>actions method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin; ?>actions() {
    	<?php echo $check; ?>        
        if($this->request->is('post')){
			if($this->request->data['status']=='Active'){			
				$this-><?php echo $currentModelName; ?>->updateAll(array('status'=>"'Active'"),array('<?php echo $primaryKey; ?>'=>$this->request->data['action']));
				$this->Session->setFlash("<div class='success msg'>Successfully activated.</div>",'');
			}
			else if($this->request->data['status']=='Inactive'){			
				$this-><?php echo $currentModelName; ?>->updateAll(array('status'=>"'Inactive'"),array('<?php echo $primaryKey; ?>'=>$this->request->data['action']));
				$this->Session->setFlash("<div class='success msg'>Successfully inactivated.</div>",'');
			}
			else if($this->request->data['status']=='Trash'){			
				$this-><?php echo $currentModelName; ?>->updateAll(array('status'=>"'Trash'"),array('<?php echo $primaryKey; ?>'=>$this->request->data['action']));
				$this->Session->setFlash("<div class='success msg'>Successfully trashed.</div>",'');
			}
			else if($this->request->data['status']=='Delete'){				
				$this-><?php echo $currentModelName; ?>->deleteAll(array('<?php echo $primaryKey; ?>'=>$this->request->data['action']),false,false);
				$this->Session->setFlash("<div class='success msg'>Successfully deleted.</div>",'');
			}
			$this->redirect(array('action' => 'index'));
		}
	}
    
<?php } ?>
