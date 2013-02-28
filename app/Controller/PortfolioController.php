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
	public $uses = array('Portimage','Portvideo','Portaudio','Portdocument','Portpresent');
	
	public function portphoto(){
		if($this->request->is('post')){
			if($this->request->data['image']['name'] !=''){
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],573,380,150,150, "portfolio-images");	
				}
			$this->request->data['uid'] = $this->Session->read('User.uid');
			$this->request->data['key'] = $this->str_rand();
			$this->Portimage->save($this->request->data);
			$this->Session->setFlash(__('Portfolio image added successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function portvideo(){
		if($this->request->is('post')){
			$width = '/width="[0-9]*"/';
			$height = '/height="[0-9]*"/';
			$video_code = preg_replace(array($width, $height), array('width="380"','height="315"'), $this->request->data['video_code']);
			$this->request->data['video_code'] = $video_code;
			$this->request->data['uid'] = $this->Session->read('User.uid');
			$this->request->data['key'] = $this->str_rand();
			$this->Portvideo->save($this->request->data);
			$this->Session->setFlash(__('Portfolio video added successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function portaudio(){
		if($this->request->is('post')){
			$this->request->data['uid'] = $this->Session->read('User.uid');
			move_uploaded_file($this->request->data['audio_file']['tmp_name'],'files/portfolio-audios/'.$this->request->data['audio_file']['name']);
			$this->request->data['audio_file'] = $this->request->data['audio_file']['name'];
			$this->request->data['key'] = $this->str_rand();
			$this->Portaudio->save($this->request->data);
			$this->Session->setFlash(__('Portfolio audio added successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function portdocument(){
		if($this->request->is('post')){
			$this->request->data['uid'] = $this->Session->read('User.uid');
			move_uploaded_file($this->request->data['document_file']['tmp_name'],'files/portfolio-documents/'.$this->request->data['document_file']['name']);
			$this->request->data['document_file'] = $this->request->data['document_file']['name'];
			$this->request->data['key'] = $this->str_rand();
			$this->Portdocument->save($this->request->data);
			$this->Session->setFlash(__('Portfolio audio documents successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function portpresent(){
		if($this->request->is('post')){
			$this->request->data['uid'] = $this->Session->read('User.uid');
			$this->request->data['key'] = $this->str_rand();
			$this->Portpresent->save($this->request->data);
			$this->Session->setFlash(__('Portfolio presentation added successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
}
