<?php
App::uses('AppController', 'Controller');
/**
 * Features Controller
 *
 * @property Feature $Feature
 */
class FeaturesController extends AppController {

	
/**
 * Default layout
 *
 * @var array
 * @access public
 */
	public $layout = 'admin';
	public $components = array('Session','Image');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'webpage';
    	$this->Feature->recursive = 0;
		if($this->Session->read('Config.language') == '')
		$this->Session->write('Config.language',Configure::read('Config.language'));
		
		$this->set('features', $this->Feature->findAll(array('lan'=>$this->Session->read('Config.language'))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
    			$this->layout = 'webpage';
		$options = array('conditions' => array('key' => $id));
		$this->set('feature', $this->Feature->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
    			if ($this->request->is('post')) {
			$this->Feature->create();
			if ($this->Feature->save($this->request->data)) {
				$this->Session->setFlash("<div class='success msg'>The feature has been saved</div>",'');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("<div class='error msg'>The feature could not be saved. Please, try again.</div>",'');
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
    			$this->Feature->id = $id;
		if (!$this->Feature->exists()) {
			throw new NotFoundException(__('Invalid feature'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Feature->save($this->request->data)) {
				$this->Session->setFlash("<div class='success msg'>The feature has been saved</div>",'');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("<div class='error msg'>The feature could not be saved. Please, try again.</div>",'');
			}
		} else {
			$this->request->data = $this->Feature->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
    			if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Feature->id = $id;
		if (!$this->Feature->exists()) {
			throw new NotFoundException(__('Invalid feature'));
		}
		if ($this->Feature->delete()) {
			$this->Session->setFlash("<div class='success msg'>Feature deleted.</div>",'');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash("<div class='error msg'>Feature was not deleted.</div>",'');
		$this->redirect(array('action' => 'index'));
	}
 

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
    	$this->checkadmin();
		$this->Feature->recursive = 0;
		$this->set('features', $this->Feature->findAll(array('lan'=>'eng')));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($lan = null,$link = null) {
		$this->checkadmin();
		$options = array('conditions' => array('lan'=>$lan,'link'=>$link));
		$this->set('feature', $this->Feature->find('first', $options));
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
				//pr($this->request->data); die;
					if($this->request->data['image']['name'] !=''){
						$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],415,301,150,150, "feature-images");	
					}
				
				$str = explode("&",$this->request->data['title']);
						$link='';
					foreach($str as $str){
						$link .=$str;
					}
				$this->request->data['key'] = $this->str_rand();
				$this->request->data['link'] = strtolower(str_replace(' ','_',$link));			
				$this->Feature->save($this->request->data);
				$last_id = $this->Feature->getInsertID();
				
				$this->request->data = '';
				$details = $this->Feature->find('first',array('conditions'=>array('fid'=>$last_id)));
				if($details['Feature']['lan'] == 'eng')				
				$this->request->data['lan'] = 'spa';
				else 
				$this->request->data['lan'] = 'eng';
				$this->request->data['link'] = $details['Feature']['link'];
				$this->request->data['key'] = $this->str_rand();
				$this->Feature->saveAll($this->request->data);
				
				$this->Session->setFlash("<div class='success msg'>The feature has been saved</div>",'');
				$this->redirect(array('action' => 'index'));
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
	public function admin_edit($lan = null,$link = null) {
    	$this->checkadmin();
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if($this->request->data['image']['name'] !=''){
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],415,301,150,150, "feature-images");	
				} else {
					$options = array('conditions' => array('lan'=>$lan,'link'=>$link));
					$data = $this->Feature->find('first', $options);
					$this->request->data['image'] = $data['Feature']['image'];
				}
				
			if ($this->Feature->save($this->request->data)) {
				$this->Session->setFlash("<div class='success msg'>The feature has been saved</div>",'');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("<div class='error msg'>The feature could not be saved. Please, try again.</div>",'');
			}
		} else {
			$options = array('conditions' => array('lan'=>$lan,'link'=>$link));
			$this->request->data = $this->Feature->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete1($id = null) {
    	$this->checkadmin();
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Feature->id = $id;
		if (!$this->Feature->exists()) {
			throw new NotFoundException(__('Invalid feature'));
		}
		if ($this->Feature->delete()) {
			$this->Session->setFlash("<div class='success msg'>Feature deleted.</div>",'');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash("<div class='error msg'>Feature was not deleted.</div>",'');
		$this->redirect(array('action' => 'index'));
	}
	
	public function admin_delete($id = null) {
		$this->checkadmin();
		$this->layout = '';
		$this->Feature->id = $id;
		$this->Feature->delete(array('bid'=>$id));
		$this->Feature->id = $id + 1;
		$this->Feature->deleteAll(array('bid'=>$id +1));
		$this->Session->setFlash(__('Feature deleted'));
		$this->redirect(array('action' => 'index'));
		$this->render(false);
	}
 
    
/**
 * admin_actions method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_actions() {
    	$this->checkadmin();
        
        if($this->request->is('post')){
			if($this->request->data['status']=='Active'){			
				$this->Feature->updateAll(array('status'=>"'Active'"),array('fid'=>$this->request->data['action']));
				$this->Session->setFlash("<div class='success msg'>Successfully activated.</div>",'');
			}
			else if($this->request->data['status']=='Inactive'){			
				$this->Feature->updateAll(array('status'=>"'Inactive'"),array('fid'=>$this->request->data['action']));
				$this->Session->setFlash("<div class='success msg'>Successfully inactivated.</div>",'');
			}
			else if($this->request->data['status']=='Trash'){			
				$this->Feature->updateAll(array('status'=>"'Trash'"),array('fid'=>$this->request->data['action']));
				$this->Session->setFlash("<div class='success msg'>Successfully trashed.</div>",'');
			}
			else if($this->request->data['status']=='Delete'){				
				$this->Feature->deleteAll(array('fid'=>$this->request->data['action']),false,false);
				$this->Session->setFlash("<div class='success msg'>Successfully deleted.</div>",'');
			}
			$this->redirect(array('action' => 'index'));
		}
	}
}
