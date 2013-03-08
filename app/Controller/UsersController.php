<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
	
	
		public $name = 'Users';
		public $helpers = array('Session','Html');
		public $layout = 'resume';
		public $uses = array('User','Country','Skill','Education','Experience','Interest','Mylink','Portimage','Portvideo','Portdocument','Portaudio','Portpresent','Contact','Profileview','Userdashboard','Recommentation','Recomment');
		//public $paginate = array('limit'=>1);
		public $components = array('Lastrss','RequestHandler','Session','Image');
	
/**
 * index method
 */
 

 /* @return void
 */
 public function admin_view($id = null) {
		$this->layout = 'admin';
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('users', $this->User->find('first', $options));
		$edu = $this->Education->find('all', array('conditions' => array('Education.uid' =>$id)));
		$this->set('edu', $edu);
		$exp = $this->Experience->find('all', array('conditions' => array('Experience.uid' =>$id)));
		$this->set('exp', $exp);
		$interest = $this->Interest->find('all', array('conditions' => array('Interest.uid' =>$id)));
		$this->set('interests', $interest);
		$portimage = $this->Portimage->find('all', array('conditions' => array('Portimage.uid' =>$id)));
		$this->set('portimage', $portimage);
		$portvideo = $this->Portvideo->find('all', array('conditions' => array('Portvideo.uid' =>$id)));
		$this->set('portvideo', $portvideo);
		$portaudio = $this->Portaudio->find('all', array('conditions' => array('Portaudio.uid' =>$id)));
		$this->set('portaudio', $portaudio);
		$portdocument = $this->Portdocument->find('all', array('conditions' => array('Portdocument.uid' =>$id)));
		$this->set('portdocument', $portdocument);
		$portpresent = $this->Portpresent->find('all', array('conditions' => array('Portpresent.uid' =>$id)));
		$this->set('portpresent', $portpresent);
		
	}
    public function checkadmin(){
		$check=$this->Session->read('Adminlogin');
		if(empty($check) && $check !='True'){			
			$this->redirect(array('controller'=>'adminpanel','action'=>'index','admin'=>false));
		}
	}
	public function index() {
	
	}
	public function errorpage()
	{
		$this->layout='webpage';
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
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
		$this->User->recursive = 0;
		$this->set('users', $this->User->find('all'));
		//$this->set('users', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'admin';
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
		$this->layout = 'admin';
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		$this->User->delete(array('uid'=>$id));
		$this->Session->setFlash(__('User deleted'));
		$this->redirect(array('action' => 'index'));
		$this->render(false);
	}
	
	public function general_settings() {
		$this->layout = '';
		$this->request->data['uid'] = $_REQUEST['uid'];
		$this->request->data['resume_title'] = $_REQUEST['resume_title'];
		$this->request->data['resume_desc'] = $_REQUEST['resume_desc'];
		if($this->User->save($this->request->data)){
			$user_details = $this->User->find('first',array('conditions'=>array('uid'=>$this->request->data['uid'])));
			$this->Session->delete('User');
			$this->Session->write($user_details);
			echo "success";
		}
		else
		echo "failed";
		$this->render(false);
	}
	
	function viewpdfdup()
	{
		$this->layout = ''; 
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		$this->set('new', $new);
		$edu =$this->Education->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('edu', $edu);
		$exp =$this->Experience->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('exp', $exp);

	}
	
	public function resume()
	{
		
		$this->set('county', $this->Country->find('all'));
		
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		$this->set('new', $new);
		
		$links =$this->Mylink->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('links', $links);
		
		
		
		$exp =$this->Experience->find('all', array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('exp', $exp);
		
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
		
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		$skills =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('skill', $skills);
		
		$int =$this->Interest->find('all', array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('int', $int);
		
		$edu =$this->Education->find('all', array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('edu', $edu);
		
		$portimg =$this->Portimage->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('portimg', $portimg);
		
		$portvid =$this->Portvideo->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('portvid', $portvid);
		
		$portaud =$this->Portaudio->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('portaud', $portaud);
		
		$portpre = $this->Portpresent->find('all', array('conditions' => array('Portpresent.uid' =>$new['User']['uid'])));
		
		$this->set('portpre', $portpre);	
		
		$portdoc =$this->Portdocument->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('portdoc', $portdoc);
		
		$recmd =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recmd', $recmd);
		
		$co=count($portdoc);
		$co+=count($portvid);
		$co+=count($portimg);
		$co+=count($portaud);
		$c=$this->set('c',$co);
	    //unset($_SESSION['views']);exit;
		if(!isset($_SESSION['views']))
		{
		$_SESSION['views']=array();
		}
		if(!in_array($new['User']['uid'],$_SESSION['views']))
		{
		$_SESSION['views'][]=$new['User']['uid'];
		$this->request->data['uid']=$new['User']['uid'];
		$this->Profileview->save($this->request->data);
		}
		//unset($_SESSION['views']);
		//echo $new['User']['uid'];exit;
		
		
	 
	}
	
	function cimage(){
		$this->layout='';
		$eid=$_REQUEST['eid'];
		$exp =$this->Experience->find('first', array('conditions' => array('eid'=>$eid)));
		$this->set('exp', $exp);
	}
	
	public function blog()
	{
		//echo "dfd";die;
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		$this->set('new', $new);
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		$items = $this->Lastrss->feed($new['User']['rss_feed']); // Get feed
		//pr($items); die;
		$this->set("items",$items['items']);
		//
		//$this->render(false);
	}
	
	
	
	
	public function resumeedit()
	{
		
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		
		if(isset($_REQUEST['save']))
		{
		$this->request->data['uid']=$new['User']['uid'];
		//pr($this->request->data);exit;
		$this->User->save($this->request->data);
		$this->redirect(array('controller'=>'','action'=>$this->request->data['base']));
		
		}
		
		if(isset($_REQUEST['contact']))
		{
		$this->request->data['uid']=$new['User']['uid'];
		//pr($this->request->data);exit;
		$this->User->save($this->request->data);
		$this->redirect(array('controller'=>'','action'=>$this->request->data['base']));
		
		}
		
		if(isset($_REQUEST['about']))
		{
		$this->request->data['uid']=$new['User']['uid'];
		//pr($this->request->data);exit;
		$this->User->save($this->request->data);
		$this->redirect(array('controller'=>'','action'=>$this->request->data['base']));
		
		}
		
		if(isset($_REQUEST['proff']))
		{
		$this->request->data['uid']=$new['User']['uid'];
		//pr($this->request->data);exit;
		$this->User->save($this->request->data);
		$this->redirect(array('controller'=>'','action'=>$this->request->data['base']));
		
		}

	}
	
	
	public function editphoto()
	{
		$id=$_SESSION['User']['uid'];
		$this->User->uid = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {	
		 if(!empty($this->request->data)){
			 $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
					$data = $this->User->find('first', $options);
			if($this->request->data['image']['name'] !=''){
				$this->Image->delete_image($data['User']['image'],"user-images");
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],100,100,80,80, "user-images");	
				} else {
						
					$this->request->data['image'] = $data['User']['image'];
				}
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The blog has been saved'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
			} 
			else {
				$this->Session->setFlash(__('The blog could not be saved. Please, try again.'));
			}
		 
			}
		} else {
			$this->Session->setFlash(__('The blog could not be saved. Please, try again.'));
		}
	}
	
	public function userphoto()
	{
		$id=$_SESSION['User']['uid'];
		$this->User->uid = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {	
		 if(!empty($this->request->data)){
			if($this->request->data['image']['name'] !=''){
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],100,100,80,80, "user-images");	
				} else {
						$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
					$data = $this->User->find('first', $options);
					$this->request->data['image'] = $data['User']['image'];
				}
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The basic information has been saved'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
			} 
			else {
				$this->Session->setFlash(__('The blog could not be saved. Please, try again.'));
			}
		 
			}
		} else {
			$this->Session->setFlash(__('The blog could not be saved. Please, try again.'));
		}
	}
	
	
	public function usercontact()
	{
		//pr($this->request->data);exit;
		$id=$_SESSION['User']['uid'];
		$this->User->uid = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {	
		 if(!empty($this->request->data)){
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The basic information has been saved'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
			} 
			else {
				$this->Session->setFlash(__('The blog could not be saved. Please, try again.'));
			}
			}
		} else {
			$this->Session->setFlash(__('The blog could not be saved. Please, try again.'));
		}
	}
	
	
	
	public function exp()
	
	{
	       if(!empty($this->request->data)){
			$resp = implode(',',$this->request->data['resp']);
					$this->request->data['uid'] = $this->Session->read('User.uid');
					$this->request->data['key'] = $this->str_rand();
					$this->request->data['responsibility'] = $resp;
					$this->Experience->save($this->request->data);
			$this->Session->setFlash(__('Professional Details Added Successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function skills() {
		//$this->checkuser();	
		if(!empty($this->request->data)){
			$skills = implode(',',$this->request->data['skill']);
					$this->request->data['uid'] = $this->Session->read('User.uid');
					$this->request->data['key'] = $this->str_rand();
					$this->request->data['skills'] = $skills;
					$this->Skill->save($this->request->data);
			$this->Session->setFlash(__('Skills Added Successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function education() {
		if($this->request->is('post')){
			$extra_curriculars = implode(',',$this->request->data['extra_curricular']);
			$this->request->data['uid'] = $this->Session->read('User.uid');
			$this->request->data['key'] = $this->str_rand();
			$this->request->data['extra_curricular'] = $extra_curriculars;
			$this->Education->save($this->request->data);
			$this->Session->setFlash(__('Education Added Successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function interests() {
		if($this->request->is('post')){
			$interests = implode(',',$this->request->data['interest']);
			$this->request->data['uid'] = $this->Session->read('User.uid');
			$this->request->data['key'] = $this->str_rand();
			$this->request->data['interest'] = $interests;
			$this->Interest->save($this->request->data);
			$this->Session->setFlash(__('Interest Added Successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function aboutme() {
		if($this->request->is('post')){
			$this->request->data['uid'] = $this->Session->read('User.uid');
			$this->User->save($this->request->data);
			$this->Session->setFlash(__('About me Added Successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function mylinks() {
		if($this->request->is('post')){
			$datas = $this->request->data; 
			$i=0;
			foreach($datas['im_type'] as $im_type){
					$this->request->data['uid'] = $this->Session->read('User.uid');
					$this->request->data['im_link'] = $datas['im_link'][$i];
					$this->request->data['key'] = $this->str_rand();
					$this->request->data['im_type'] = $im_type;
					$this->Mylink->saveAll($this->request->data);					
				$i++;
			}	
			$this->Session->setFlash(__('Links Added Successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function edit_mylinks(){
		if($this->request->is('post') || $this->request->is('put')){
			$datas = $this->request->data; 
			$i=0;
			foreach($datas['im_type'] as $im_type){
					$this->request->data['mlid'] = $datas['mlid'][$i];
					$this->request->data['im_link'] = $datas['im_link'][$i];
					$this->request->data['im_type'] = $im_type;
					$this->Mylink->saveAll($this->request->data);					
				$i++;
			}
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));	
		}
		
	}
	
		public function blogs(){
		if($this->request->is('post')){
		$this->request->data['uid'] = $this->Session->read('User.uid');
		$this->User->save($this->request->data);
		$this->Session->setFlash(__('Rss feed added successfully'));
		
	$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));		}
		}

		public function experience()
		{
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		$this->set('new', $new);
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		$exp =$this->Experience->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('exp', $exp);
		$recmd =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recmd', $recmd);

	    }
		public function educations()
		{
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		$this->set('new', $new);
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		$edu =$this->Education->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('edu', $edu);
		$recmd =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recmd', $recmd);
		$recedu23 =$this->Education->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recedu23', $recedu23);
		
		$new1 =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		
		$recedu =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recedu', $recedu);

	    }
		
		public function skill()
		{
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		$this->set('new', $new);
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		$skills =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('skill', $skills);
		$recmd =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recmd', $recmd);

	    }
		
		public function interest()
		{
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		$this->set('new', $new);
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		$int =$this->Interest->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('int', $int);
		$recmd =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recmd', $recmd);
			

	    }
		
		public function portfolio()
		{
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		$this->set('new', $new);
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		$portimg =$this->Portimage->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('portimg', $portimg);
		
		$portvid =$this->Portvideo->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('portvid', $portvid);
		
		$portaud =$this->Portaudio->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('portaud', $portaud);
		
		$portdoc =$this->Portdocument->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('portdoc', $portdoc);
		
		$portpre = $this->Portpresent->find('all', array('conditions' => array('Portpresent.uid' =>$new['User']['uid'])));
		$this->set('portpre', $portpre);	
		$recmd =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recmd', $recmd);

	    }
		
		public function contactform()
		{
		if($this->request->is('post')){
			$this->request->data['uid'] = $this->Session->read('User.uid');
			$this->Contact->save($this->request->data);
			$message='Post permission,<br><br>
			CVomg<br>
			=============================================<br> 
			
			<strong>Content<br><br>
			------------------------------------------------------------------------------------<br/>				
			Regards,<br>
			CVomg team.<br><br>';
			/*$this->smtpoptions();
			$this->mailsend($message,'Contract Management Tool : Daily report','manikandan@aparajayah.com','manikandan@aparajayah.com','default');
			$this->Session->setFlash(__('About me Added Successfully'));*/
			$options = array($this->request->data['to'],$this->request->data['to'],$message);
			$this->smtpoptions($options);
		    $this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}

	    }
		
		public function uploadimage(){
		$this->layout='';
		$this->render(false);
		$image= $this->Image->upload_image_and_thumbnail($_FILES['file'], 800,800,180,180, "users");
	    $this->request->data['eid'] = $this->params['pass']['0'];
		$this->request->data['logo'] = $image;
		$this->Experience->save($this->request->data);
		echo "{ msg: 'success',id:'".$this->params['pass']['0']."' }";
		
	}
		
	public function delimage() {
		$this->layout='';$this->render(false);
		$val=$_REQUEST['id'];		
		if(isset($_REQUEST['id'])){
			$new=$this->Experience->find(array('eid'=>$_REQUEST['id']));
			$this->Image->delete_image($new['Experience']['logo'],"users");
			$this->Experience->updateAll(array('logo'=>"''"),array('eid'=>$new['Experience']['eid']));
		}
		echo "done";
		
	}
	function imgcheck(){
		$this->layout='';
		$this->render(false);
		$val=$_REQUEST['eid'];		
		if(isset($_REQUEST['eid'])){
			$new=$this->Experience->find(array('eid'=>$_REQUEST['eid']));
			echo $new['Experience']['logo'];
		}else{
			echo "";
		}
	}
	
	public function edit_resume()
	{
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);
		if(isset($_REQUEST['exp']))
		{
		if(!empty($this->request->data)){
			pr($this->request->data);exit;
		        $pic =$this->Experience->find('first', array('conditions' => array('eid'=>$this->request->data['eid'])));
				$this->set('pic', $pic);
				if($this->request->data['logo']!='')
				{
				$this->request->data['logo'] = $this->request->data['logo'];
				}
				else {
				$this->request->data['logo'] = $pic['Experience']['logo'];
				}
				$this->Experience->save($this->request->data);
				
				$this->Session->setFlash(__('Photo updated successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
		}
		
		if(isset($_REQUEST['edu']))
		{
		if(!empty($this->request->data)){
			$extra_curriculars = implode(',',$this->request->data['extra_curricular']);
			$this->request->data['extra_curricular'] = $extra_curriculars;
			$this->Education->save($this->request->data);
			$this->Session->setFlash(__('Education Updated Successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
		}
		
		if(isset($_REQUEST['skill']))
		{
		if(!empty($this->request->data)){
		
		
		}
		}
		if(isset($_REQUEST['int']))
		{
		if(!empty($this->request->data)){
		
		pr($this->request->data);exit;
		}
		}
	}
	
	public function edit_portfolio()
	{
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);
		
		if(isset($_REQUEST['photo']))
		{
			if(!empty($this->request->data))
				{
				$pic =$this->Portimage->find('first', array('conditions' => array('piid'=>$this->request->data['piid'])));
				$this->set('pic', $pic);
				if($this->request->data['image']['name'] !='')
				{
				$this->Image->delete_image($pic['Portimage']['image'],"portfolio-images");
				$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],573,380,150,150, "portfolio-images");	
				}
				else {
				$this->request->data['image'] = $pic['Portimage']['image'];
				}
				$this->Portimage->save($this->request->data);
				$this->Session->setFlash(__('Photo updated successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
				}
		}
		if(isset($_REQUEST['video']))
		{
			if(!empty($this->request->data))
				{
				$width = '/width="[0-9]*"/';
				$height = '/height="[0-9]*"/';
				$video_code = preg_replace(array($width, $height), array('width="380"','height="315"'), $this->request->data['video_code']);
				$this->request->data['video_code'] = $video_code;
				$this->Portvideo->save($this->request->data);
				$this->Session->setFlash(__('Video updated successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
					
				}
		}
		if(isset($_REQUEST['audio']))
		{
			if(!empty($this->request->data))
				{
				$aud =$this->Portaudio->find('first', array('conditions' => array('paid'=>$this->request->data['paid'])));
				$this->set('aud', $aud);
				if($this->request->data['audio_file']['name'] !='')	
				{
				//pr($this->request->data);exit;	
				//$this->Image->delete_image($aud['Portaudio']['audio_file'],"portfolio-audios");
				move_uploaded_file($this->request->data['audio_file']['tmp_name'],'files/portfolio-audios/'.$this->request->data['audio_file']['name']);
			    $this->request->data['audio_file'] = $this->request->data['audio_file']['name'];
				}
				
				else
				{
					  $this->request->data['audio_file'] = $aud['Portaudio']['audio_file'];
				//pr($this->request->data);exit;
				}
				$this->Portaudio->save($this->request->data);
				$this->Session->setFlash(__('Audio updated successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
					
				}
		}


	}
	
	function viewpdf()
	{
		$this->layout = 'pdf'; 
		$new =$this->User->find(array('username'=>$this->Session->read('User.username')));
		$this->set('new', $new);
		$edu =$this->Education->findAll(array('uid'=>$new['User']['uid']));
		$this->set('edu', $edu);
		$exp =$this->Experience->findAll(array('uid'=>$new['User']['uid']));
		$this->set('exp', $exp);
		$skills =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('skill', $skills);
		$int =$this->Interest->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('int', $int);
		
	}
	function viewpdf2()
	{
		$this->layout = 'pdf'; 
		$new =$this->User->find(array('username'=>$this->Session->read('User.username')));
		$this->set('new', $new);
		$edu =$this->Education->findAll(array('uid'=>$new['User']['uid']));
		$this->set('edu', $edu);
		$exp =$this->Experience->findAll(array('uid'=>$new['User']['uid']));
		$this->set('exp', $exp);
		$skills =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('skill', $skills);
		$int =$this->Interest->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('int', $int);

	}
	
	function viewdoc()
	{
		$new =$this->User->find(array('username'=>$this->Session->read('User.username')));
		$this->set('new', $new);
		$edu =$this->Education->findAll(array('uid'=>$new['User']['uid']));
		$this->set('edu', $edu);
		$exp =$this->Experience->findAll(array('uid'=>$new['User']['uid']));
		$this->set('exp', $exp);
		$skills =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('skill', $skills);
		$int =$this->Interest->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('int', $int);
		$this->layout = 'docu'; 
		//$this->render();
		
	}
	function viewdoc2()
	{
		$new =$this->User->find(array('username'=>$this->Session->read('User.username')));
		$this->set('new', $new);
		$edu =$this->Education->findAll(array('uid'=>$new['User']['uid']));
		$this->set('edu', $edu);
		$exp =$this->Experience->findAll(array('uid'=>$new['User']['uid']));
		$this->set('exp', $exp);
		$skills =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('skill', $skills);
		$int =$this->Interest->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('int', $int);
		$this->layout = 'docu'; 
		//$this->render();

	}
	
	function viewodt()
	{
		$new =$this->User->find(array('username'=>$this->Session->read('User.username')));
		$this->set('new', $new);
		$edu =$this->Education->findAll(array('uid'=>$new['User']['uid']));
		$this->set('edu', $edu);
		$exp =$this->Experience->findAll(array('uid'=>$new['User']['uid']));
		$this->set('exp', $exp);
		$skills =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('skill', $skills);
		$int =$this->Interest->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('int', $int);
		$this->layout = 'odtcv'; 
		//$this->render();
		
	}
	function viewodt2()
	{
		$new =$this->User->find(array('username'=>$this->Session->read('User.username')));
		$this->set('new', $new);
		$edu =$this->Education->findAll(array('uid'=>$new['User']['uid']));
		$this->set('edu', $edu);
		$exp =$this->Experience->findAll(array('uid'=>$new['User']['uid']));
		$this->set('exp', $exp);
		$skills =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('skill', $skills);
		$int =$this->Interest->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('int', $int);
		$this->layout = 'odtcv'; 
		//$this->render();

	}
	
	public function edit_experiance(){
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);	
		if(!empty($this->request->data)){
		        $pic =$this->Experience->find('first', array('conditions' => array('eid'=>$this->request->data['eid'])));
				$this->set('pic', $pic);
				if($this->request->data['logo']!='')
				$this->request->data['logo'] = $this->request->data['logo'];
				else
				$this->request->data['logo'] = $pic['Experience']['logo'];
				$resp = implode(',',$this->request->data['resp']);
					$this->request->data['responsibility'] = $resp;
				$this->Experience->save($this->request->data);
				$this->Session->setFlash(__('Photo updated successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function edit_education(){
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);
		if(!empty($this->request->data)){
			$extra_curriculars = implode(',',$this->request->data['extra_curricular']);
			$this->request->data['extra_curricular'] = $extra_curriculars;
			$this->Education->save($this->request->data);
			$this->Session->setFlash(__('Education Updated Successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function edit_interests(){
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);
		//pr($this->request->data);exit;
		if(!empty($this->request->data)){
			$interests = implode(',',$this->request->data['interest']);
			$this->request->data['interest'] = $interests;
			$this->Interest->save($this->request->data);
			$this->Session->setFlash(__('Interest Updated Successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function edit_skills(){
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);
		if(!empty($this->request->data)){
			$skills = implode(',',$this->request->data['skill']);
			$this->request->data['skills'] = $skills;
			$this->Skill->save($this->request->data);
			$this->Session->setFlash(__('Skills Updated Successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function edit_port_photo(){
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);
		if(!empty($this->request->data)){
			$pic =$this->Portimage->find('first', array('conditions' => array('piid'=>$this->request->data['piid'])));
			$this->set('pic', $pic);
			if($this->request->data['image']['name'] !=''){
				$this->Image->delete_image($pic['Portimage']['image'],"portfolio-images");
				$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],573,380,150,150, "portfolio-images");
			} else {
				$this->request->data['image'] = $pic['Portimage']['image'];
			}
				$this->Portimage->save($this->request->data);
				$this->Session->setFlash(__('Photo updated successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}	

	public function edit_port_video(){
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);
		if(!empty($this->request->data)){
			$width = '/width="[0-9]*"/';
			$height = '/height="[0-9]*"/';
			$video_code = preg_replace(array($width, $height), array('width="380"','height="315"'), $this->request->data['video_code']);
			$this->request->data['video_code'] = $video_code;
			$this->Portvideo->save($this->request->data);
			$this->Session->setFlash(__('Video updated successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function edit_port_audio(){
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);
		if(!empty($this->request->data)){
			$aud =$this->Portaudio->find('first', array('conditions' => array('paid'=>$this->request->data['paid'])));
			$this->set('aud', $aud);
			if($this->request->data['audio_file']['name'] !=''){
				move_uploaded_file($this->request->data['audio_file']['tmp_name'],'files/portfolio-audios/'.$this->request->data['audio_file']['name']);
				 $this->request->data['audio_file'] = $this->request->data['audio_file']['name'];
			}else{
				$this->request->data['audio_file'] = $aud['Portaudio']['audio_file'];
			}
				$this->Portaudio->save($this->request->data);
				$this->Session->setFlash(__('Audio updated successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
					
		}
	}
	
	public function edit_port_document(){
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);
		
		if($this->request->is('post')){
			$docu =$this->Portdocument->find('first', array('conditions' => array('pdid'=>$this->request->data['pdid'])));
			//	pr($this->request->data);exit;
			move_uploaded_file($this->request->data['document_file']['tmp_name'],'files/portfolio-documents/'.$this->request->data['document_file']['name']);
			if(!empty($this->request->data['document_file']['name']))
			$this->request->data['document_file'] = $this->request->data['document_file']['name'];
			else
			$this->request->data['document_file'] = $docu['Portdocument']['document_file'];
			$this->Portdocument->save($this->request->data);
			$this->Session->setFlash(__('Portfolio  documents updated successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	public function edit_port_presentation(){
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);
		if($this->request->is('post')){
			$this->Portpresent->save($this->request->data);
			$this->Session->setFlash(__('Portfolio presentation updated successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}
	
	
	public function resume_sample()
	{
		
		$this->set('county', $this->Country->find('all'));
		
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);
		
		$links =$this->Mylink->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('links', $links);
		
		
		
		$exp =$this->Experience->find('all', array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('exp', $exp);
		
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
		
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		$skills =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('skill', $skills);
		
		$int =$this->Interest->find('all', array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('int', $int);
		
		$edu =$this->Education->find('all', array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('edu', $edu);
		
		$portimg =$this->Portimage->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('portimg', $portimg);
		
		$portvid =$this->Portvideo->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('portvid', $portvid);
		
		$portaud =$this->Portaudio->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('portaud', $portaud);
		
		$portpre = $this->Portpresent->find('all', array('conditions' => array('Portpresent.uid' =>$new['User']['uid'])));
		
		$this->set('portpre', $portpre);	
		
		$portdoc =$this->Portdocument->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('portdoc', $portdoc);
		
		$recmd =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recmd', $recmd);
		
		$co=count($portdoc);
		$co+=count($portvid);
		$co+=count($portimg);
		$co+=count($portaud);
		$c=$this->set('c',$co);
	    //unset($_SESSION['views']);exit;
		if(!isset($_SESSION['views']))
		{
		$_SESSION['views']=array();
		}
		if(!in_array($new['User']['uid'],$_SESSION['views']))
		{
		$_SESSION['views'][]=$new['User']['uid'];
		$this->request->data['uid']=$new['User']['uid'];
		$this->Profileview->save($this->request->data);
		}
		//unset($_SESSION['views']);
		//echo $new['User']['uid'];exit;
		
		
	 
	}
	
	function resumedelete()
	{
		if($this->request->is('post')){
			$model=$this->request->data['model'];
			$wid=$this->request->data['wid'];
			$did=$this->request->data['did'];
			$rid=$this->request->data['rid'];
			$this->$model->delete(array($wid=>$did));
			$this->Session->setFlash(__('Deleted successfully'));
			$this->redirect(array('controller'=>'','action'=>$rid));	
		
		}
		
	}
	
	function changetemplate(){
		//$template=$_REQUEST['id'];
		$this->layout = '';
		$this->Render(false);
		
			if($this->request->is('ajax')){
				$this->request->data['User']['uid']=$_SESSION['User']['uid'];
				$this->request->data['User']['template']=$this->params['pass'][0];
				$this->User->save($this->request->data);
				echo 'success';
			}else{
				echo 'flop';
			}
	}
	function recommentme()
	 {
		$this->render(false);
		$this->layout=''; 
		$user=$_REQUEST['recid'];
		$skill=$_REQUEST['skill'];
		$edu = $this->Recommentation->find(array('rid' =>$skill));
		$rec = $this->Recomment->find(array('uid' =>$user,'rid'=>$skill));
		if(empty($rec))
		echo $user . $skill ;
		else
		echo "no";
	 }
	
}
