<?php
App::uses('AppController', 'Controller');
/**
 * Settings Controller
 *
 * @property Setting $Setting
 */
class SettingsController extends AppController {
	
	public $helpers = array('Session');
	public $layout = 'admin';
	public $paginate = array('limit'=>5);

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session','Image');

/**
 * admin_index method
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
		if ($this->request->is('post')) {
			if(!empty($this->request->data)){ 				
				if($this->request->data['logo']['name'] !=''){
					$this->request->data['logo'] = $this->Image->upload_image_and_thumbnail($this->request->data['logo'],573,380,150,150, "site-logo");	
				} else {
					$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => 1));
					$data = $this->Setting->find('first', $options);
					$this->request->data['logo'] = $data['Setting']['logo'];
				}
				$this->Setting->save($this->request->data);
				$this->Session->setFlash(__('The settings has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
 				$this->Session->setFlash(__('The settings could not be saved. Please, try again.'));
			}
		}
			$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => 1));
			$this->request->data = $this->Setting->find('first', $options);
	}

}