<?php
App::uses('AppController', 'Controller');
/**
 * Tips Controller
 *
 * @property Tip $Tip
 */
class TipsController extends AppController {

public $layout = 'admin';
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tip->recursive = 0;
		$this->set('tips', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tip->exists($id)) {
			throw new NotFoundException(__('Invalid tip'));
		}
		$options = array('conditions' => array('Tip.' . $this->Tip->primaryKey => $id));
		$this->set('tip', $this->Tip->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tip->create();
			if ($this->Tip->save($this->request->data)) {
				$this->Session->setFlash(__('The tip has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tip could not be saved. Please, try again.'));
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
		if (!$this->Tip->exists($id)) {
			throw new NotFoundException(__('Invalid tip'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tip->save($this->request->data)) {
				$this->Session->setFlash(__('The tip has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tip could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tip.' . $this->Tip->primaryKey => $id));
			$this->request->data = $this->Tip->find('first', $options);
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
		$this->Tip->id = $id;
		if (!$this->Tip->exists()) {
			throw new NotFoundException(__('Invalid tip'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tip->delete()) {
			$this->Session->setFlash(__('Tip deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tip was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Tip->recursive = 0;
		$this->set('tips', $this->Tip->find('all',array('conditions'=>array('lan'=>'eng'))));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($lan = null,$link = null) {
		$options = array('conditions' => array('lan'=>$lan,'link'=>$link));
		$this->set('tips', $this->Tip->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (!empty($this->request->data)) {
				$str = explode("&",$this->request->data['tip_title']);
					$link='';
				foreach($str as $str){
					$link .=$str;
				}
				$this->request->data['link'] = strtolower(str_replace(' ','_',$link));
				$this->Tip->save($this->request->data);
				$this->request->data = '';
				
				$last_id = $this->Tip->getInsertID();
				$details = $this->Tip->find('first',array('conditions'=>array('tid'=>$last_id)));
				if($details['Tip']['lan'] == 'eng')				
				$this->request->data['lan'] = 'spa';
				else 
				$this->request->data['lan'] = 'eng';
				$this->request->data['link'] = $details['Tip']['link'];
				$this->Tip->saveAll($this->request->data);				
				$this->Session->setFlash(__('The tip has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tip could not be saved. Please, try again.'));
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
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tip->save($this->request->data)) {
				$this->Session->setFlash(__('The tip has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tip could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('lan'=>$lan,'link'=>$link));
			$this->request->data = $this->Tip->find('first', $options);
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
		$this->Tip->id = $id;
		$this->Tip->delete(array('tid'=>$id));
		$this->Tip->id = $id + 1;
		$this->Tip->deleteAll(array('tid'=>$id + 1));
		$this->Session->setFlash(__('Tip deleted'));
		$this->redirect(array('action' => 'index'));
		$this->render(false);
	}
}
