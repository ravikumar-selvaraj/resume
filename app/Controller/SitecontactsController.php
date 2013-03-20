<?php
App::uses('AppController', 'Controller');
/**
 * Sitecontacts Controller
 *
 * @property Sitecontact $Sitecontact
 */
class SitecontactsController extends AppController {
	
	public $components = array('Recaptcha.Recaptcha');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout= 'webpage'; 
		if ($this->request->is('post')) {
			if ($this->Recaptcha->verify()) {
			$this->Sitecontact->create();
				if ($this->Sitecontact->save($this->request->data)) {
					$this->Session->setFlash(__('Your message sent successfully, admin will contact you soon'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The Contact could not be saved. Please, try again.'));
				}
			} else { 
				$this->Session->setFlash(__('The Captcha code mismatch.'));
			}
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sitecontact->exists($id)) {
			throw new NotFoundException(__('Invalid sitecontact'));
		}
		$options = array('conditions' => array('Sitecontact.' . $this->Sitecontact->primaryKey => $id));
		$this->set('sitecontact', $this->Sitecontact->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sitecontact->create();
			if ($this->Sitecontact->save($this->request->data)) {
				$this->Session->setFlash(__('The sitecontact has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sitecontact could not be saved. Please, try again.'));
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
		if (!$this->Sitecontact->exists($id)) {
			throw new NotFoundException(__('Invalid sitecontact'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Sitecontact->save($this->request->data)) {
				$this->Session->setFlash(__('The sitecontact has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sitecontact could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sitecontact.' . $this->Sitecontact->primaryKey => $id));
			$this->request->data = $this->Sitecontact->find('first', $options);
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
		$this->Sitecontact->id = $id;
		if (!$this->Sitecontact->exists()) {
			throw new NotFoundException(__('Invalid sitecontact'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Sitecontact->delete()) {
			$this->Session->setFlash(__('Sitecontact deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sitecontact was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		
		$this->checkadmin();
		$this->layout = 'admin';
		$this->Sitecontact->recursive = 0;
		//$this->set('contact',  $this->Sitecontact->findAll(array('sids'=>'3')));
		$this->set('contact', $this->Sitecontact->find('all'));
	}
	 public function checkadmin(){
		$check=$this->Session->read('Adminlogin');
		if(empty($check) && $check !='True'){			
			$this->redirect(array('controller'=>'adminpanel','action'=>'index','admin'=>false));
		}
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
		$this->layout = 'admin';
		$this->Sitecontact->updateAll(array('view'=>'1'),array("cid"=>$this->params['pass']['0']));	
		if (!$this->Sitecontact->exists($id)) {
			throw new NotFoundException(__('Invalid sitecontact'));
		}
	
		$options = array('conditions' => array('Sitecontact.' . $this->Sitecontact->primaryKey => $id));
		$contact = $this->Sitecontact->find('first', $options);
		$this->set('sitecontact', $contact);
		
		if ($this->request->is('post') || $this->request->is('put')) 
		{
			$d=date('Y-m-d H:i:s');
			$this->request->data['reply_date']=$d;
			
				if ($this->Sitecontact->save($this->request->data)) 
				{
					$values = array($contact['Sitecontact']['subject'],$contact['Sitecontact']['email'],$this->data['replymessage'],$contact['Sitecontact']['name']);
					$this->emailoptions(11, $values);
					$this->Session->setFlash(__('successfully sent message'));
					$this->redirect(array('action' => 'index'));
			} 
		}
	}
	

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Sitecontact->create();
			if ($this->Sitecontact->save($this->request->data)) {
				$this->Session->setFlash(__('The sitecontact has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sitecontact could not be saved. Please, try again.'));
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
		if (!$this->Sitecontact->exists($id)) {
			throw new NotFoundException(__('Invalid sitecontact'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Sitecontact->save($this->request->data)) {
				$this->Session->setFlash(__('The sitecontact has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sitecontact could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sitecontact.' . $this->Sitecontact->primaryKey => $id));
			$this->request->data = $this->Sitecontact->find('first', $options);
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
		$this->Sitecontact->id = $id;
		$this->Sitecontact->delete(array('cid'=>$id));
		$this->Session->setFlash(__('Succssfully deleted'));
		$this->redirect(array('action' => 'index'));
		$this->render(false);
	}
	
}
