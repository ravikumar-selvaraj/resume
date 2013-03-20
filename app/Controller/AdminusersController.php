<?php
App::uses('AppController', 'Controller');
/**
 * Adminusers Controller
 *
 * @property Adminuser $Adminuser
 */
class AdminusersController extends AppController {
	
	public $layout = 'admin';
	public $components = array('Session','Image');
	public $helpers = array('Session');
/**
 * index method
 *
 * @return void
 */
 
	public function checkadmin(){
		$check=$this->Session->read('Adminlogin');
		if(empty($check) && $check !='True'){			
			$this->redirect(array('controller'=>'adminpanel','action'=>'index','admin'=>false));
		}
	}
 
	public function index() {
		$this->checkadmin();
		$this->Adminuser->recursive = 0;
		$this->set('adminusers', $this->paginate());
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
		if (!$this->Adminuser->exists($id)) {
			throw new NotFoundException(__('Invalid adminuser'));
		}
		$options = array('conditions' => array('Adminuser.' . $this->Adminuser->primaryKey => $id));
		$this->set('adminuser', $this->Adminuser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->checkadmin();
		if ($this->request->is('post')) {
			
			$this->Adminuser->create();
			if ($this->Adminuser->save($this->request->data)) {
				$this->Session->setFlash(__('The adminuser has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The adminuser could not be saved. Please, try again.'));
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
		if (!$this->Adminuser->exists($id)) {
			throw new NotFoundException(__('Invalid adminuser'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Adminuser->save($this->request->data)) {
				$this->Session->setFlash(__('The adminuser has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The adminuser could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Adminuser.' . $this->Adminuser->primaryKey => $id));
			$this->request->data = $this->Adminuser->find('first', $options);
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
		$this->Adminuser->id = $id;
		if (!$this->Adminuser->exists()) {
			throw new NotFoundException(__('Invalid adminuser'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Adminuser->delete()) {
			$this->Session->setFlash(__('Adminuser deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Adminuser was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->checkadmin();
		//$this->layout = 'admin';
		$this->Adminuser->recursive = 0;
		//$this->set('adminusers', $this->paginate());
		$this->set('adminusers', $this->Adminuser->find('all'));
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
		if (!$this->Adminuser->exists($id)) {
			throw new NotFoundException(__('Invalid adminuser'));
		}
		$options = array('conditions' => array('Adminuser.' . $this->Adminuser->primaryKey => $id));
		$this->set('adminuser', $this->Adminuser->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->checkadmin();
		if ($this->request->is('post')) {
			$d=date('Y-m-d H:i:s');
			
			$this->request->data['createddate']=$d;
			//pr($this->request->data('createddate'));
			
			//pr($this->request->data);exit;
			$check_email = $this->Adminuser->find('first',array('conditions'=>array('email'=>$this->request->data('email'))));
			if(empty($check_email)){
				$check_username = $this->Adminuser->find('first',array('conditions'=>array('username'=>$this->request->data('username'))));
				if(empty($check_username)) {
					$this->Adminuser->create();
					if ($this->Adminuser->save($this->request->data)) {
						$this->Session->setFlash(__('The adminuser has been saved'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The adminuser could not be saved. Please, try again.'));
					}
				} else { 
					$this->Session->setFlash(__('The given username already exist.'));
				}
			} else {
				$this->Session->setFlash(__('The given email-id already exist.'));
			}
		}
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
		if (!$this->Adminuser->exists($id)) {
			throw new NotFoundException(__('Invalid adminuser'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Adminuser->save($this->request->data)) {
				$this->Session->setFlash(__('The adminuser has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The adminuser could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Adminuser.' . $this->Adminuser->primaryKey => $id));
			$this->request->data = $this->Adminuser->find('first', $options);
		}
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
		$this->layout = '';
		$this->Adminuser->id = $id;
		$this->Adminuser->delete(array('bid'=>$id));
		$this->Session->setFlash(__('User deleted successfully'));
		$this->redirect(array('action' => 'index'));
		$this->render(false);
	}
	
	
	public function admin_myaccount($id = null) {
		$this->checkadmin();
		if (!$this->Adminuser->exists($id)) {
			throw new NotFoundException(__('Invalid adminuser'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Adminuser->save($this->request->data)) {
				$this->Session->setFlash(__('The adminuser has been saved'));
				$this->redirect(array('action' => 'myaccount/'.$this->params['pass'][0]));
			} else {
				$this->Session->setFlash(__('The adminuser could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Adminuser.' . $this->Adminuser->primaryKey => $id));
			$this->request->data = $this->Adminuser->find('first', $options);
		}
	}
	
	public function admin_changepassword($id = null) {
		$this->checkadmin();
		
		if (!$this->Adminuser->exists($id)) {
			throw new NotFoundException(__('Invalid adminuser'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
				$pass = $this->Adminuser->read(null, $id);
				//pr($pass);exit;
			if($pass['Adminuser']['password']==$this->request->data['old'])
			{
			if ($this->Adminuser->save($this->request->data)) {
				$this->Session->setFlash(__('The password has been changed'));
				$this->redirect(array('action' => 'changepassword/'.$this->params['pass'][0]));
			} else {
				$this->Session->setFlash(__('The password could not be changed. Please, try again.'));
			}
			}
			else
			{
				$this->Session->setFlash(__('The old password is wrong. Please, try again.'));
				$this->redirect(array('action' => 'changepassword/'.$this->params['pass'][0]));
			}
		} else {
			$options = array('conditions' => array('Adminuser.' . $this->Adminuser->primaryKey => $id));
			$this->request->data = $this->Adminuser->find('first', $options);
			 $this->set('adminuser', $this->Adminuser->find('first', $options));
		}
	}
}
