<?php
App::uses('AppController', 'Controller');
/**
 * Careers Controller
 *
 * @property Career $Career
 * @property SessionComponent $Session
 */
class CareersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session','Image');
	public $layout = 'admin';
	public $paginate = array('limit'=>5);


/**
 * index method
 *
 * @return void
 */
 
 	public function checkadmin(){
		$check=$this->Session->read('Adminlogin');
		if(empty($check) && $check !='True'){			
			$this->redirect(array('controller'=>'adminpanel','action'=>'index'));
		}
	}
	
	public function index() {
		$this->checkadmin();
		$this->Career->recursive = 0;
		$this->set('careers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Career->exists($id)) {
			throw new NotFoundException(__('Invalid career'));
		}
		$options = array('conditions' => array('Career.' . $this->Career->primaryKey => $id));
		$this->set('career', $this->Career->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Career->create();
			if ($this->Career->save($this->request->data)) {
				$this->Session->setFlash(__('The career has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The career could not be saved. Please, try again.'));
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
		if (!$this->Career->exists($id)) {
			throw new NotFoundException(__('Invalid career'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Career->save($this->request->data)) {
				$this->Session->setFlash(__('The career has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The career could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Career.' . $this->Career->primaryKey => $id));
			$this->request->data = $this->Career->find('first', $options);
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
		$this->Career->id = $id;
		if (!$this->Career->exists()) {
			throw new NotFoundException(__('Invalid career'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Career->delete()) {
			$this->Session->setFlash(__('Career deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Career was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->checkadmin();
		$this->Career->recursive = 0;
		$this->set('careers', $this->paginate());
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
		if (!$this->Career->exists($id)) {
			throw new NotFoundException(__('Invalid career'));
		}
		$options = array('conditions' => array('Career.' . $this->Career->primaryKey => $id));
		$this->set('careers', $this->Career->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	
	
	public function admin_add() {
		$this->checkadmin();
		if ($this->request->is('post')) {
			if(!empty($this->request->data)){ 
			//pr( $this->request->data);exit;				
				if($this->request->data['image']['name'] !=''){
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],573,380,150,150, "career-image");	
				}
				$this->Career->save($this->request->data);
				$this->Session->setFlash(__('The Career has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
 				$this->Session->setFlash(__('The Career could not be saved. Please, try again.'));
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
		if (!$this->Career->exists($id)) {
			throw new NotFoundException(__('Invalid career'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if(!empty($this->request->data)){ 
				//
				if($this->request->data['image']['name'] !=''){
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],573,380,150,150, "career-image");	
				}
				else
				{
				$options = array('conditions' => array('Career.' . $this->Career->primaryKey => $id));
				$edit=$this->Career->find('first', $options);
				$this->request->data['image']=$edit['Career']['image'];
				}
				//pr($this->request->data);exit;
				$this->Career->save($this->request->data);
				$this->Session->setFlash(__('The Career has been updated'));
				$this->redirect(array('action' => 'index'));
			}
			 else {
				$this->Session->setFlash(__('The career could not be updated. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Career.' . $this->Career->primaryKey => $id));
			$this->request->data = $this->Career->find('first', $options);
			$this->set('careers', $this->Career->find('first', $options));
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
	/*public function admin_delete($id = null) {
		
		$this->Career->id = $id;
		if (!$this->Career->exists()) {
			throw new NotFoundException(__('Invalid career'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		if ($this->Career->delete()) {
			$this->Session->setFlash(__('Career deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Career was not deleted'));
		$this->redirect(array('action' => 'index'));
	}*/
	public function admin_delete($id = null) {
		$this->checkadmin();
		$this->layout = '';
		$this->Career->id = $id;
		$this->Career->delete(array('bid'=>$id));
		$this->Session->setFlash(__('Career deleted'));
		$this->redirect(array('action' => 'index'));
		$this->render(false);
	}
}
