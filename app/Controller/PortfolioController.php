<?php
App::uses('AppController', 'Controller');
/**
 * Blogs Controller
 *
 * @property Blog $Blog
 * @property sessionComponent $session
 */
class PortfolioController extends AppController {
	
	public $layout = 'resume';
	public $components = array('Session','Image');
	public $uses = array('Portimage','Portvideo','Portaudio','Portdocument','Portpresent','Portfolio','User');
	
	public function portphoto(){
		$this->checkuser();
		if($this->request->is('post')){
			if($this->request->data['image']['name'] !=''){
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],573,380,150,150, "portfolio-images");	
				}
				 
			$this->request->data['uid'] = $this->Session->read('User.uid');
			$this->request->data['key'] = $this->str_rand();
			$this->Portimage->save($this->request->data);
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			$this->Session->setFlash(__('Portfolio image added successfully'));
			 $this->Session->write(array('submenu'=>'content'));
				 $this->Session->write(array('addcontentsubmenus'=>'portfolio'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function portvideo(){
		$this->checkuser();
		if($this->request->is('post')){
			$width = '/width="[0-9]*"/';
			$height = '/height="[0-9]*"/';
			$video_code = preg_replace(array($width, $height), array('width="380"','height="315"'), $this->request->data['video_code']);
			$this->request->data['video_code'] = $video_code;
			$this->request->data['uid'] = $this->Session->read('User.uid');
			$this->request->data['key'] = $this->str_rand();
			$this->Portvideo->save($this->request->data);
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			$this->Session->setFlash(__('Portfolio video added successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function portaudio(){
		$this->checkuser();
		if($this->request->is('post')){
			$this->request->data['uid'] = $this->Session->read('User.uid');
			move_uploaded_file($this->request->data['audio_file']['tmp_name'],'files/portfolio-audios/'.$this->request->data['audio_file']['name']);
			$this->request->data['audio_file'] = $this->request->data['audio_file']['name'];
			$this->request->data['key'] = $this->str_rand();
			$this->Portaudio->save($this->request->data);
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			$this->Session->setFlash(__('Portfolio audio added successfully'));
			 $this->Session->write(array('submenu'=>'content'));
				 $this->Session->write(array('addcontentsubmenus'=>'portfolio'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function portdocument(){
		$this->checkuser();
		if($this->request->is('post')){
			$this->request->data['uid'] = $this->Session->read('User.uid');
			move_uploaded_file($this->request->data['document_file']['tmp_name'],'files/portfolio-documents/'.$this->request->data['document_file']['name']);
			$this->request->data['document_file'] = $this->request->data['document_file']['name'];
			$this->request->data['key'] = $this->str_rand();
			$this->Portdocument->save($this->request->data);
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			$this->Session->setFlash(__('Portfolio documents added successfully'));
			 $this->Session->write(array('submenu'=>'content'));
				 $this->Session->write(array('addcontentsubmenus'=>'portfolio'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function portpresent(){
		$this->checkuser();
		if($this->request->is('post')){
			$this->request->data['uid'] = $this->Session->read('User.uid');
			$this->request->data['key'] = $this->str_rand();
			$this->Portpresent->save($this->request->data);
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			$this->Session->setFlash(__('Portfolio presentation added successfully'));
			 $this->Session->write(array('submenu'=>'content'));
				 $this->Session->write(array('addcontentsubmenus'=>'portfolio'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function portfolios() {
		$this->checkuser();
		if($this->request->is('post')){
			//pr($this->request->data); die;
			if(isset($this->request->data['image'])) {
			if($this->request->data['image']['name'] !=''){
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],573,380,150,150, "portfolio-images");	
				}
			}
			if(isset($this->request->data['audio'])) {
				move_uploaded_file($this->request->data['audio']['tmp_name'],'files/portfolio-audios/'.$this->request->data['audio']['name']);
				$this->request->data['audio'] = $this->request->data['audio']['name'];
			}
			if(isset($this->request->data['video'])){
				$width = '/width="[0-9]*"/';
				$height = '/height="[0-9]*"/';
				$video_code = preg_replace(array($width, $height), array('width="250"','height="200"'), $this->request->data['video']);
				$this->request->data['video'] = $video_code;
			}
			if(isset($this->request->data['presentation'])){
				$this->request->data['presentation'] = $this->request->data['presentation'];
			}
			if(isset($this->request->data['document'])){
				move_uploaded_file($this->request->data['document']['tmp_name'],'files/portfolio-documents/'.$this->request->data['document']['name']);
				$this->request->data['document'] = $this->request->data['document']['name'];
			}
			$this->request->data['uid'] = $this->Session->read('User.uid');
			$this->request->data['key'] = $this->str_rand();
			$this->Portfolio->save($this->request->data);
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			$this->Session->setFlash(__('Portfolio  added successfully'));
			 $this->Session->write(array('submenu'=>'content'));
				 $this->Session->write(array('addcontentsubmenus'=>'portfolio'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function edit_portfolios() {
		$this->checkuser();
		//pr($this->request->data);exit;
		if($this->request->is('post') || $this->request->is('put')){
			
		$port_details = $this->Portfolio->find('first',array('conditions'=>array('pid'=>$this->request->data['pid'])));
				 
			if(isset($this->request->data['image'])) {
				if($this->request->data['image']['name'] !=''){
					$this->Image->delete_image($port_details['Portfolio']['image'],"portfolio-images");
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],573,380,150,150, "portfolio-images");
				} 
			else {
				
				$this->request->data['image'] = $port_details['Portfolio']['image'];
			}
			}
			if(isset($this->request->data['video'])){
				$width = '/width="[0-9]*"/';
				$height = '/height="[0-9]*"/';
				$video_code = preg_replace(array($width, $height), array('width="250"','height="200"'), $this->request->data['video']);
				$this->request->data['video'] = $video_code;
			} else {
				$this->request->data['video'] = $port_details['Portfolio']['video'];
			}
			
			if(isset($this->request->data['presentation'])){
				$this->request->data['presentation'] = $this->request->data['presentation'];
			} else {
				$this->request->data['presentation'] = $port_details['Portfolio']['presentation'];
			}
			if(isset($this->request->data['audio'])) {
				if($this->request->data['audio']['name']!=''){					
				 move_uploaded_file($this->request->data['audio']['tmp_name'],'files/portfolio-audios/'.$this->request->data['audio']['name']);
				$this->request->data['audio'] = $this->request->data['audio']['name'];
				}else {
				$this->request->data['audio'] = $port_details['Portfolio']['audio'];
			}
			 }
			if(isset($this->request->data['document'])){
				if($this->request->data['document']['name'] !=''){
				move_uploaded_file($this->request->data['document']['tmp_name'],'files/portfolio-documents/'.$this->request->data['document']['name']);
				$this->request->data['document'] = $this->request->data['document']['name'];
				}else {
				$this->request->data['document'] = $port_details['Portfolio']['document'];
			}
			} 
			$this->Portfolio->save($this->request->data);
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			$this->Session->setFlash(__('Portfolio  updated successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
			
			//pr($this->request->data); die;
		}
	}
}
