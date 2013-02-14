<?php
App::uses('AppController', 'Controller');
/**
 * Staticpages Controller
 *
 * @property Staticpage $Staticpage
 */
class StaticpagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
 
    public $layout = 'admin';
	public $components = array('Session','Image');
	public $helpers = array('Session');
    public $paginate = array('limit'=>5);
   
  public function checkadmin(){
		$check=$this->Session->read('Adminlogin');
		if(empty($check) && $check !='True'){			
			$this->redirect(array('controller'=>'staticpages','action'=>'index'));
		}
	}
		  
	public function index() {
		$this->checkadmin();
		$this->Staticpage->recursive = 0;
		$this->set('staticpages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->checkadmin();
		if (!$this->Staticpage->exists($id)) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		$options = array('conditions' => array('Staticpage.' . $this->Staticpage->primaryKey => $id));
		$this->set('staticpage', $this->Staticpage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->checkadmin();
		//print_r($this->request);
		if ($this->request->is('post')) {
			$this->Staticpage->create();
			if ($this->Staticpage->save($this->request->data)) {
				$this->Session->setFlash(__('The staticpage has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staticpage could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->checkadmin();
		if (!$this->Staticpage->exists($id)) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Staticpage->save($this->request->data)) {
				$this->Session->setFlash(__('The staticpage has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staticpage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Staticpage.' . $this->Staticpage->primaryKey => $id));
			$this->request->data = $this->Staticpage->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->checkadmin();
		$this->Staticpage->id = $id;
		if (!$this->Staticpage->exists()) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Staticpage->delete()) {
			$this->Session->setFlash(__('Staticpage deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Staticpage was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
 

	
	public function admin_index() {
		$this->checkadmin();
		//$this->layout='mani';
		$this->Staticpage->recursive = 0;
		$this->set('staticpages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->checkadmin();
		//$this->layout='mani';
		if (!$this->Staticpage->exists($id)) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		$options = array('conditions' => array('Staticpage.' . $this->Staticpage->primaryKey => $id));
		$this->set('staticpage', $this->Staticpage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->checkadmin();
		//$this->layout='mani';
		if ($this->request->is('post')) {
			$this->Staticpage->create();
			if ($this->Staticpage->save($this->request->data)) {
				$this->Session->setFlash(__('The staticpage has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staticpage could not be saved. Please, try again.'));
			}
		}
		//for drop down
		//$this->set('languageOptions', array('opt1' => 'Choose Language', 'opt2' => 'Kannada', 'opt3' => 'Telugu', 'opt4' => 'Tamil'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->checkadmin();
		//$this->layout='mani';
		$this->Staticpage->sta_id = $id;
		if (!$this->Staticpage->exists($id)) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if ($this->Staticpage->save($this->request->data)) {
				
				$this->Session->setFlash(__('The staticpage has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staticpage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Staticpage.' . $this->Staticpage->primaryKey => $id));
			$this->request->data = $this->Staticpage->find('first', $options);
		}
		$this->set('languageOptions', array('opt1' => 'Choose Status', 'opt2' => 'Active', 'opt3' => 'Inactive', 'opt4' => 'Trash'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->checkadmin();
		$this->Staticpage->id = $id;
		if (!$this->Staticpage->exists()) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Staticpage->delete()) {
			$this->Session->setFlash(__('Staticpage deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Staticpage was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}