<?php
App::uses('AppController', 'Controller');
/**
 * Emailcampaigns Controller
 *
 * @property Emailcampaign $Emailcampaign
 */
class EmailcampaignsController extends AppController {

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
	public function admin_index() {
		$this->checkadmin();
		$this->Emailcampaign->recursive = 0;
		$this->set('emailcampaigns', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		
		if (!$this->Emailcampaign->exists($id)) {
			throw new NotFoundException(__('Invalid emailcampaign'));
		}
		$options = array('conditions' => array('Emailcampaign.' . $this->Emailcampaign->primaryKey => $id));
		$this->set('emailcampaign', $this->Emailcampaign->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		//pr($this->request->data);exit;
		if ($this->request->is('post')) {
			if(!empty($this->request->data)){ 
			$date=date('Y-m-d H:m:s');
			$this->request->data['created_date']=$date;
			//pr($this->request->data);exit;
			$this->Emailcampaign->create();
			if ($this->Emailcampaign->save($this->request->data)) {
				$this->Session->setFlash(__('The emailcampaign has been saved'));
				$this->redirect(array('action' => 'index'));
			}} else {
				$this->Session->setFlash(__('The emailcampaign could not be saved. Please, try again.'));
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
		if (!$this->Emailcampaign->exists($id)) {
			throw new NotFoundException(__('Invalid emailcampaign'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Emailcampaign->save($this->request->data)) {
				$this->Session->setFlash(__('The emailcampaign has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emailcampaign could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Emailcampaign.' . $this->Emailcampaign->primaryKey => $id));
			$this->request->data = $this->Emailcampaign->find('first', $options);
			$this->set('emailcampaign', $this->Emailcampaign->find('first', $options));
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
		$this->Emailcampaign->id = $id;
		$this->Emailcampaign->delete(array('bid'=>$id));
		$this->Session->setFlash(__('Emailcampaign deleted'));
		$this->redirect(array('action' => 'index'));
		$this->render(false);
	}
}
