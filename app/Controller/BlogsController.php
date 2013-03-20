<?php
App::uses('AppController', 'Controller');
/**
 * Blogs Controller
 *
 * @property Blog $Blog
 * @property sessionComponent $session
 */
class BlogsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Session');
	public $layout = 'admin';
	public $paginate = array('limit'=>5);
	public $uses = array('Blog','User');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session','Image');

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
		$this->Blog->recursive = 0;
		if($this->Session->read('Config.language') == '')
		$this->Session->write('Config.language',Configure::read('Config.language'));
		
		if($this->request->is('post')){
			$this->paginate = array('conditions' => array('title LIKE ' =>"%".$this->request->data('search')."%",'lan'=>$this->Session->read('Config.language'),'status'=>'Active'),'limit' =>5);
			$this->set('blogs', $this->paginate());
		} else {
			$this->paginate = array('conditions' => array('lan'=>$this->Session->read('Config.language'),'status'=>'Active'),'limit' =>5);
			$this->set('blogs', $this->paginate());
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
		$this->layout = 'webpage';
		$options = array('conditions' => array('key' => $id));
		$this->set('blog', $this->Blog->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->checkadmin();
		if ($this->request->is('post')) {
			$this->Blog->create();
			if ($this->Blog->save($this->request->data)) {
				$this->Session->setFlash(__('The blog has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The blog could not be saved. Please, try again.'));
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
		if (!$this->Blog->exists($id)) {
			throw new NotFoundException(__('Invalid blog'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Blog->save($this->request->data)) {
				$this->Session->setFlash(__('The blog has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The blog could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Blog.' . $this->Blog->primaryKey => $id));
			$this->request->data = $this->Blog->find('first', $options);
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
		$this->Blog->id = $id;
		if (!$this->Blog->exists()) {
			throw new NotFoundException(__('Invalid blog'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Blog->delete()) {
			$this->Session->setFlash(__('Blog deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Blog was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->checkadmin();
		$this->Blog->recursive = 0;
		//$this->set('blogs', $this->paginate());
		$this->set('blogs', $this->Blog->find('all',array('conditions'=>array('lan'=>'eng'))));
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
		$this->set('blogs', $this->Blog->find('first', $options));
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
				if($this->request->data['image']['name'] !=''){
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],573,380,150,150, "blog-images");	
				}
				$str = explode("&",$this->request->data['title']);
					$link='';
				foreach($str as $str){
					$link .=$str;
				}
				$this->request->data['key'] = $this->str_rand();
				$this->request->data['link'] = strtolower(str_replace(' ','_',$link));
				$content = $this->request->data['content'];
				$this->Blog->save($this->request->data);
				$last_id = $this->Blog->getInsertID();
				
				
				$this->request->data = '';
				
				$details = $this->Blog->find('first',array('conditions'=>array('bid'=>$last_id)));
				if($details['Blog']['lan'] == 'eng')				
				$this->request->data['lan'] = 'spa';
				else 
				$this->request->data['lan'] = 'eng';
				$this->request->data['link'] = $details['Blog']['link'];
				$this->request->data['key'] = $this->str_rand();
				$this->Blog->saveAll($this->request->data);
				
				
				$users = $this->User->find('all',array('conditions'=>array('newsletter'=>1,'status'=>'Active')));
				foreach($users as $user){
					if($user['User']['email'] !=''){
						$link = BASE_URL.'pages/blog_newsletter_deactive/'.$user['User']['user_key'];
						$options = array($user['User']['firstname'],$user['User']['email'],$content,$link);
						$this->emailoptions(12,$options);
					}
				}
				
				
				$this->Session->setFlash(__('The blog has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
 				$this->Session->setFlash(__('The blog could not be saved. Please, try again.'));
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
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],573,380,150,150, "blog-images");	
				} else {
					$options = array('conditions' => array('lan'=>$lan,'link'=>$link));
					$data = $this->Blog->find('first', $options);
					$this->request->data['image'] = $data['Blog']['image'];
				}
				//pr($this->request->data); die;
			if ($this->Blog->save($this->request->data)) {
				$this->Session->setFlash(__('The blog has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The blog could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('lan'=>$lan,'link'=>$link));
			$this->request->data = $this->Blog->find('first', $options);
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
		$this->Blog->id = $id;
		$this->Blog->delete(array('bid'=>$id));
		$this->Blog->id = $id + 1;
		$this->Blog->deleteAll(array('bid'=>$id +1));
		$this->Session->setFlash(__('Blog deleted'));
		$this->redirect(array('action' => 'index'));
		$this->render(false);
	}
}
