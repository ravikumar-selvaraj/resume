<?php
App::uses('AppController', 'Controller');
/**
 * Tags Controller
 *
 * @property Tag $Tag
 */
class TagsController extends AppController {

		public $layout = 'admin';
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tag->recursive = 0;
		$this->set('tags', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tag->exists($id)) {
			throw new NotFoundException(__('Invalid tag'));
		}
		$options = array('conditions' => array('Tag.' . $this->Tag->primaryKey => $id));
		$this->set('tag', $this->Tag->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tag->create();
			if ($this->Tag->save($this->request->data)) {
				$this->Session->setFlash(__('The tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tag could not be saved. Please, try again.'));
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
		if (!$this->Tag->exists($id)) {
			throw new NotFoundException(__('Invalid tag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tag->save($this->request->data)) {
				$this->Session->setFlash(__('The tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tag.' . $this->Tag->primaryKey => $id));
			$this->request->data = $this->Tag->find('first', $options);
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
		$this->Tag->id = $id;
		if (!$this->Tag->exists()) {
			throw new NotFoundException(__('Invalid tag'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tag->delete()) {
			$this->Session->setFlash(__('Tag deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->checkadmin();
		$this->Tag->recursive = 0;
		//$this->set('tags', $this->paginate());
		$this->set('tags', $this->Tag->find('all',array('conditions'=>array('lan'=>'eng'))));
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
		if (!$this->Tag->exists($id)) {
			throw new NotFoundException(__('Invalid tag'));
		}
		$options = array('conditions' => array('Tag.' . $this->Tag->primaryKey => $id));
		$this->set('tag', $this->Tag->find('first', $options));
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
				
				$str = explode("&",$this->request->data['tag_name']);
					$link='';
				foreach($str as $str){
					$link .=$str;
				}
				$this->request->data['link'] = strtolower(str_replace(' ','_',$link));
				$this->request->data['key'] = $this->str_rand();
				$this->Tag->save($this->request->data);
				
				$last_id = $this->Tag->getInsertID();
				$this->request->data = '';
				$details = $this->Tag->find('first',array('conditions'=>array('tid'=>$last_id)));
				if($details['Tag']['lan'] == 'eng')				
				$this->request->data['lan'] = 'spa';
				else 
				$this->request->data['lan'] = 'eng';
				$this->request->data['link'] = $details['Tag']['link'];
				$this->request->data['key'] = $this->str_rand();
				$this->Tag->saveAll($this->request->data);
				$this->Session->setFlash(__('The tag has been saved'));
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
			if ($this->Tag->save($this->request->data)) {
				$this->Session->setFlash(__('The tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('lan'=>$lan,'link'=>$link));
			$this->set('tags',$this->Tag->find('first', $options));
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
		//$this->checkadmin();
		$this->layout = '';
		$this->Tag->id = $id;
		$this->Tag->delete(array('tid'=>$id));
		$this->Session->setFlash(__('Tag deleted'));
		$this->redirect(array('action' => 'index'));
		$this->render(false);
	}
}
