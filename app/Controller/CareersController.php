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
	public $uses = array('Career','Tag','User');


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
		$this->layout = 'webpage';
		$this->Career->recursive = 0;
		
		if($this->Session->read('Config.language') == '')
		$this->Session->write('Config.language',Configure::read('Config.language'));
		
		if($this->request->is('post')){
			$this->paginate = array('conditions' => array('title LIKE ' =>"%".$this->request->data('search')."%",'lan'=>$this->Session->read('Config.language'),'status'=>'Active'),'limit' =>5);
			$this->set('careers', $this->paginate());
		}
		if(!empty($this->params['pass'][0]) && $this->params['pass'][0] != 'tags' ){
			$this->paginate = array('conditions' => array('category LIKE ' =>"%".$this->params['pass'][0]."%",'lan'=>$this->Session->read('Config.language'),'status'=>'Active'),'limit' =>5);
			$this->set('careers', $this->paginate());
		}
		else if(!empty($this->params['pass'][0]) && $this->params['pass'][0] == 'tags' ){
			$this->paginate = array('conditions' => array('tag LIKE ' =>"%".$this->params['pass'][1]."%",'lan'=>$this->Session->read('Config.language'),'status'=>'Active'),'limit' =>5);
			$this->set('careers', $this->paginate());
		}
		else{
			$this->paginate = array('conditions' => array('lan'=>$this->Session->read('Config.language'),'status'=>'Active'),'limit' =>5);
			$this->set('careers', $this->paginate());
		}
		
		// for most-popular
		//$this->paginate = array('limit' =>3, 'order' => array('view' => 'desc'));
		$this->set('populars', $this->Career->find('all',array('conditions'=>array('lan'=>$this->Session->read('Config.language'),'status'=>'Active'),'limit'=>3,'order'=>'view desc')));
		$this->set('tags',$this->Tag->find('all',array('conditions'=>array('lan'=>$this->Session->read('Config.language')))));
		
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
		$careers = $this->Career->find('first', $options);
		$this->set('career',$careers);
		
		$this->request->data['cid'] = $careers['Career']['cid'];
		$this->request->data['view'] = $careers['Career']['view'] + 1;
		$this->Career->save($this->request->data);
		$this->set('populars', $this->Career->find('all',array('limit'=>3,'order'=>'view desc')));
		$this->set('tags',$this->Tag->find('all',array('conditions'=>array('lan'=>$this->Session->read('Config.language')))));
		
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
		//$this->set('careers', $this->paginate());
		$this->set('careers', $this->Career->find('all',array('conditions'=>array('lan'=>'eng'))));
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
		$this->set('careers', $this->Career->find('first', $options));
		
		
	}
	

/**
 * admin_add method
 *
 * @return void
 */
	
	
	public function admin_add() {
		$this->checkadmin();
		$this->set('tags',$this->Tag->find('all'));
		if ($this->request->is('post')) {
			if(!empty($this->request->data)){ 
			//pr( $this->request->data);exit;				
				if($this->request->data['image']['name'] !=''){
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],573,380,150,150, "career-image");	
				}
				
				$this->request->data['tag'] = implode(',',$this->request->data['tag']);
				$str = explode("&",$this->request->data['title']);
					$link='';
				foreach($str as $str){
					$link .=$str;
				}
				$this->request->data['key'] = $this->str_rand();
				$this->request->data['link'] = strtolower(str_replace(' ','_',$link));
				$this->Career->save($this->request->data);
				
				$users = $this->User->find('all',array('conditions'=>array('career_newsletter'=>1,'status'=>'Active')));
				foreach($users as $user){
					$link = BASE_URL.'pages/career_newsletter_deactive/'.$user['User']['user_key'];
					$options = array($user['User']['firstname'],$user['User']['email'],$this->request->data['content'],$link);
					$this->emailoptions(13,$options);
				}
				
				
				$this->request->data = '';
				
				$last_id = $this->Career->getInsertID();
				$details = $this->Career->find('first',array('conditions'=>array('cid'=>$last_id)));
				if($details['Career']['lan'] == 'eng')				
				$this->request->data['lan'] = 'spa';
				else 
				$this->request->data['lan'] = 'eng';
				$this->request->data['link'] = $details['Career']['link'];
				$this->request->data['key'] = $this->str_rand();
				$this->Career->saveAll($this->request->data);
				
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
	public function admin_edit($lan = null,$link = null) {
		$this->checkadmin();
		$this->set('tags',$this->Tag->find('all',array('conditions'=>array('lan'=>$lan))));
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if(!empty($this->request->data)){ 
				//
				if($this->request->data['image']['name'] !=''){
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],573,380,150,150, "career-image");	
				}
				else
				{
				$options = array('conditions' => array('lan'=>$lan,'link'=>$link));
				$edit=$this->Career->find('first', $options);
				$this->request->data['image']=$edit['Career']['image'];
				}
				$this->request->data['tag'] = implode(',',$this->request->data['tag']);
				$this->Career->save($this->request->data);
				$this->Session->setFlash(__('The Career has been updated'));
				$this->redirect(array('action' => 'index'));
			}
			 else {
				$this->Session->setFlash(__('The career could not be updated. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('lan'=>$lan,'link'=>$link));
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
		$this->Career->delete(array('cid'=>$id));
		$this->Career->id = $id + 1;
		$this->Career->deleteAll(array('cid'=>$id +1));
		$this->Session->setFlash(__('Career deleted'));
		$this->redirect(array('action' => 'index'));
		$this->render(false);
	}
}
