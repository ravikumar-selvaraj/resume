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
		public $uses = array('User','Country','Skill','Education','Experience','Interest','Mylink','Portimage','Portvideo','Portdocument','Portaudio','Portpresent','Contact','Profileview','Userdashboard','Recommentation','Recomment','Portfolio');
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
	
	public  function addrec()
	 {
		 
			$this->render(false); 	
			  if(isset($this->params['data']['recommentsubmit']))
			  {				
				  $i=0;
				  foreach($this->params['data']['resp']  as $resp){
					  if(!empty($this->params['data']['rid'][$i])){
						   $rem['Recommentation']['rid']=$this->params['data']['rid'][$i];
					  }
					  $rem['Recommentation']['skills']=$resp;
					  $rem['Recommentation']['uid']=$this->Session->read('User.uid');					
					  $this->Recommentation->saveAll($rem);
					  $i++;
				  }				
				  $user = $this->Recommentation->find('all',array('conditions'=>array('uid'=>$this->Session->read('User.uid'))));
				  foreach($user as $user)
				  {
					  if(empty($user['Recommentation']['skills']))
					  {
						  $this->Recomment->deleteAll(array('rid'=>$user['Recommentation']['rid']));
					  }
				  }
				   $this->Session->setFlash(__('Recommentations Added Successfully'));
				   $mymsg=$this->Session->read('User.username');
				   $this->Session->write(array('submenu'=>'recomment'));
				  $this->redirect(array('controller'=>'','action'=>$mymsg));
				// $this->redirect(array('controller'=>'','action'=>$msg));
			  }
			  
			
				
			
			 $user= $this->User->find('first',array('conditions'=>array('uid'=>$this->Session->read('User.uid'))));
			  $this->set('user',$user);
	 }

	/*public function editmylinks(){
		$new =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		$this->set('new', $new);
		if($this->request->is('post')){
			pr($this->request->data);exit;
			$i=0;
			
			foreach($this->params['data']['im_type'] as $im_type1){
				if(!empty($this->params['data']['mlid'][$i])){
						   $rem['Mylink']['mlid']=$this->params['data']['mlid'][$i];
					  }
					  
					$this->request->data['im_link'] = $this->params['data']['im_link'][$i];
					$this->request->data['key'] = $this->params['data']['key'][$i];
					$this->request->data['im_type'] = $im_type1;
					$this->Mylink->saveAll($rem);					
				$i++;
			}
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			$this->Session->setFlash(__('Links Updated Successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
	}*/
	

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
			//pr($this->request->data);exit;
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
			//$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			//$this->request->data = $this->User->find('first', $options);
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
	
	public function resume_password(){
	
		if($this->request->is('post')){
		
		$user = $this->User->find('first',array('conditions'=>array('username'=>$this->request->data['user'])));
		
		/*if(in_array($new['User']['uid'],$this->Session->read('user_resume'))){			
			$this->redirect(array('action'=>$user['User']['username']));
		}*/
		if($this->request->data['resume_password'] == $user['User']['resume_password'])
		{					
			if(!($this->Session->read('user_resume'))){
				$this->Session->write('user_resume',array());
			}
			$user_resume=$this->Session->read('user_resume');
			$this->Session->write('user_resume',array_merge($user_resume,array($user['User']['uid'])));								
			$this->redirect(array('controller'=>'','action'=>$this->request->data('user')));	
		}
			//pr($this->request->data('user'));exit;
			//$this->Session->write('user_resume',1);
			//$this->redirect(array('controller'=>'','action'=>$this->request->data('user')));
		}
		
		
	}
	
	public function check_rp() {
		$this->layout = '';
		$user = $this->User->find('first',array('conditions'=>array('username'=>$this->request->data['user'])));
		if($this->request->data['resume_password'] == $user['User']['resume_password'])
		echo 'success';
		else
		echo 'failed';
		$this->render(false);
	}
	
	public function resume()
	{
		//pr($_SERVER['PHP_SELF']);exit;
		//pr($this->Session->read());
		
		$this->set('county', $this->Country->find('all'));
		//$this->Session->delete('user_resume');
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		$this->set('new', $new);
		//echo $this->Session->read('User.username') ;
		//echo Configure::read('userpage');
		//exit;
		if(!$this->Session->read('User.username'))
		{
			if($new['User']['set_password']==1)
			{
				if(!($this->Session->read('user_resume')) || !in_array($new['User']['uid'],$this->Session->read('user_resume'))){	
					$this->redirect(array('action'=>'resume_password'));
				}
			}
		}
		/*else if($this->Session->read('User.username')==Configure::read('userpage'))
		{
			$this->redirect(array('controller'=>'','action'=>$this->request->data('user')));
		}*/
		
		/*if($this->Session->read('user_resume') != 1) {
			if($new['User']['uid'] != $this->Session->read('User.uid')) {
				if($new['User']['set_password'] == 1){
					$this->Session->write('user_resume',2);
					$this->redirect(array('action'=>'resume_password'));
				}
			}
		}*/
	//echo in_array($new['User']['uid'],array(22));
	//pr($this->Session->read('user_resume'));exit;
	//$this->Session->delete('user_resume');exit;
	
	
		/*if(!($this->Session->read('user_resume')) || !in_array($new['User']['uid'],$this->Session->read('user_resume'))){			
			$this->redirect(array('action'=>'resume_password'));
		}
		*/
		
		$links =$this->Mylink->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('links', $links);
		$editlinks =$this->Mylink->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('editlinks', $editlinks);
		$portfolios = $this->Portfolio->find('all',array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('portfolios', $portfolios);
		
		
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
		if(!$this->Session->read('views'))
		{
		$this->Session->write('views',array());
		}
		if(!in_array($new['User']['uid'],$this->Session->read('views')))
		{
		$this->Session->write('views.uid',$new['User']['uid']);
		$this->request->data['uid']=$new['User']['uid'];
		$this->Profileview->save($this->request->data);
		}
		//unset($_SESSION['views']);
		//echo $new['User']['uid'];exit;
		
		$new1 =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		
		$recedu =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recedu', $recedu);
		
		$recskill =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recskill', $recskill);
		$recomment=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>"Waiting")));
		$this->set('recomment', $recomment);
		$this->set('recount', count($recomment));
		$recommentmy1=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>"Approved")));
		$this->set('recommentmy1', $recommentmy1);
		$this->set('recount1', count($recommentmy1));
	 
	}
	function passreq()
	{
		//pr($this->request->data);
		//exit;
			if($this->request->is('post')){
			
			$message='Hello,'.$this->request->data['f_name']."\t".$this->request->data['l_name'].'<br><br>
			'.$this->request->data['fname']."\t".$this->request->data['lname'].' has requested access to your resume. <br>
			=============================================<br> 
			You can reach them at '.$this->request->data['email_from'].'<br><br>
			
			Here,'."'".'s the personal message they sent you: <br>
			'.$this->request->data['msg'].'	<br><br>		
			<strong>Regards,<br>
			CVomg team.<br><br>';
			/*$this->smtpoptions();
			$this->mailsend($message,'Contract Management Tool : Daily report','manikandan@aparajayah.com','manikandan@aparajayah.com','default');
			$this->Session->setFlash(__('About me Added Successfully'));*/
			$options = array($this->request->data['email_to'],$this->request->data['email_to'],$message,$this->request->data['email_from']);
			$this->smtpoptions($options);
		   $this->redirect(array('controller'=>'pages','action'=>'index'));
		}
	}
	function cimage(){
		$this->layout='';
		$eid=$_REQUEST['eid'];
		$exp =$this->Experience->find('first', array('conditions' => array('eid'=>$eid)));
		$this->set('exp', $exp);
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
		$this->Session->setFlash(__('Information updated successfully'));
		$this->redirect(array('controller'=>'','action'=>$this->request->data['base']));
		
		}
		
		if(isset($_REQUEST['contact']))
		{
			$this->request->data['uid']=$new['User']['uid'];
			$this->User->save($this->request->data);
			$this->Session->setFlash(__('Contact information updated successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->request->data['base']));
		}
		
		if(isset($_REQUEST['about']))
		{
		$this->request->data['uid']=$new['User']['uid'];
		//pr($this->request->data);exit;
		$this->User->save($this->request->data);
		$this->Session->setFlash(__('updated successfully'));
		$this->redirect(array('controller'=>'','action'=>$this->request->data['base']));
		
		}
		
		if(isset($_REQUEST['proff']))
		{
		$this->request->data['uid']=$new['User']['uid'];
		//pr($this->request->data);exit;
		$this->User->save($this->request->data);
		$this->Session->setFlash(__('Status updated successfully'));
		$this->redirect(array('controller'=>'','action'=>$this->request->data['base']));
		
		}

	}
	
	
	public function editphoto()
	{
		$id=$this->Session->read('User.uid');
		$this->User->uid = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {	
		 if(!empty($this->request->data)){
			 $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
					$data = $this->User->find('first', $options);
			if($this->request->data['image']['name'] !=''){
				//pr($data);exit;
				$this->Image->delete_image($data['User']['image'],"user-images");
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],100,100,80,80, "user-images");	
					$this->Session->setFlash(__('The Picture has been updated'));
				} else {
						//pr($this->request->data);exit;
					$this->request->data['image'] = $data['User']['image'];
				}
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The Picture has been updated'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
			} 
			else {
				$this->Session->setFlash(__('The Picture could not be updated. Please, try again.'));
			}
		 
			}
		} else {
			$this->Session->setFlash(__('The blog could not be saved. Please, try again.'));
		}
	}
	
	public function userphoto()
	{
		$id=$this->Session->read('User.uid');
		$this->User->uid = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {	
		 if(!empty($this->request->data)){
			// pr($this->request->data);exit;
			/*if($this->request->data['image']['name'] !=''){
					$this->request->data['image'] = $this->Image->upload_image_and_thumbnail($this->request->data['image'],100,100,80,80, "user-images");	
				} else {
						$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
					$data = $this->User->find('first', $options);
					$this->request->data['image'] = $data['User']['image'];
				}*/
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The basic information has been saved'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
			} 
			else {
				$this->Session->setFlash(__('The basic information could not be saved. Please, try again.'));
			}
		 
			}
		} else {
			$this->Session->setFlash(__('The basic information could not be saved. Please, try again.'));
		}
	}
	
	
	public function usercontact()
	{
		
		$id=$this->Session->read('User.uid');
		$this->User->uid = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {	
		 if(!empty($this->request->data)){
			 //pr($this->request->data);exit;
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
			  // pr($this->request->data);exit;
			        $resp = implode(',',$this->request->data['resp']);
					$this->request->data['uid'] = $this->Session->read('User.uid');
					$this->request->data['key'] = $this->str_rand();
					$this->request->data['responsibility'] = $resp;
					$this->Experience->save($this->request->data);
					
					$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
					$this->Session->write(array('submenu'=>'content'));
				 $this->Session->write(array('addcontentsubmenus'=>'essential'));
			$this->Session->setFlash(__('Professional Details Added Successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username').'#cv'));
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
					$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			     $this->Session->setFlash(__('Skills Added Successfully'));
				 $this->Session->write(array('submenu'=>'content'));
				 $this->Session->write(array('addcontentsubmenus'=>'essential'));
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
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			$this->Session->setFlash(__('Education Added Successfully'));
			$this->Session->write(array('submenu'=>'content'));
				 $this->Session->write(array('addcontentsubmenus'=>'essential'));
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
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			$this->Session->write(array('submenu'=>'content'));
				 $this->Session->write(array('addcontentsubmenus'=>'essential'));
			//$this->Session->setFlash(__('Interest Added Successfully'));
				$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username').'#cv'));
		}
	}
	
	public function aboutme() {
		if($this->request->is('post')){
			$this->request->data['uid'] = $this->Session->read('User.uid');
			$this->User->save($this->request->data);
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			$this->Session->setFlash(__('About me Added Successfully'));
			$this->Session->write(array('submenu'=>'content'));
				 $this->Session->write(array('addcontentsubmenus'=>'essential'));
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
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			$this->Session->setFlash(__('Links Added Successfully'));
			$this->Session->write(array('submenu'=>'content'));
				 $this->Session->write(array('addcontentsubmenus'=>'essential'));
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
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
			$this->Session->setFlash(__('links updated successfully'));
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));	
		}
		
	}
	
		public function blogs(){
		if($this->request->is('post')){
		$this->request->data['uid'] = $this->Session->read('User.uid');
		$this->User->save($this->request->data);
		$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
		$this->Session->setFlash(__('Rss feed added successfully'));
		$this->Session->write(array('submenu'=>'content'));
				 $this->Session->write(array('addcontentsubmenus'=>'essential'));
		$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));		}
		}

		public function experience()
		{
		
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		if(!$this->Session->read('User.username'))
		{
			if($new['User']['set_password']==1)
			{
				if(!($this->Session->read('user_resume')) || !in_array($new['User']['uid'],$this->Session->read('user_resume'))){	
					$this->redirect(array('action'=>'resume_password'));
				}
			}
		}
		$this->set('new', $new);
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		$exp =$this->Experience->find('all', array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('exp', $exp);
		$recmd =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recmd', $recmd);
		$new1 =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		
		$recedu =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recedu', $recedu);
		
		$recskill =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recskill', $recskill);
		$recomment=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>'Waiting')));
		$this->set('recomment', $recomment);
		$this->set('recount', count($recomment));
		$recomment1=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>'Approved')));
		$this->set('recomment1', $recomment1);
		$this->set('recount1', count($recomment1));

	    }
		public function blog()
		{
		//echo "dfd";die;
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		$this->set('new', $new);
		if(!$this->Session->read('User.username'))
		{
			if($new['User']['set_password']==1)
			{
				if(!($this->Session->read('user_resume')) || !in_array($new['User']['uid'],$this->Session->read('user_resume'))){	
					$this->redirect(array('action'=>'resume_password'));
				}
			}
		}
		
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
		$cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		$items = $this->Lastrss->feed($new['User']['rss_feed']); // Get feed
		//pr($items); die;
		$this->set("items",$items['items']);
		//
		//$this->render(false);
		$cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		$exp =$this->Experience->find('all', array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('exp', $exp);
		$recmd =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recmd', $recmd);
		$new1 =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		
		$recedu =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recedu', $recedu);
		
		$recskill =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recskill', $recskill);
		$recomment=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>'Waiting')));
		$this->set('recomment', $recomment);
		$this->set('recount', count($recomment));
		$recomment1=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>'Approved')));
		$this->set('recomment1', $recomment1);
		$this->set('recount1', count($recomment1));
		
		
		}
		public function educations()
		{
			
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		$this->set('new', $new);
		if(!$this->Session->read('User.username'))
		{
			if($new['User']['set_password']==1)
			{
				if(!($this->Session->read('user_resume')) || !in_array($new['User']['uid'],$this->Session->read('user_resume'))){	
					$this->redirect(array('action'=>'resume_password'));
				}
			}
		}
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		$edu =$this->Education->find('all', array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('edu', $edu);
		$recmd =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recmd', $recmd);
		$recedu23 =$this->Education->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recedu23', $recedu23);
		
		$new1 =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		
		$recedu =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recedu', $recedu);
		
		$recskill =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recskill', $recskill);
		$recomment=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>'Waiting')));
		$this->set('recomment', $recomment);
		$this->set('recount', count($recomment));
		$recomment1=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>'Approved')));
		$this->set('recomment1', $recomment1);
		$this->set('recount1', count($recomment1));
	    }
		
		public function interest()
		{
			
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		$this->set('new', $new);
		if(!$this->Session->read('User.username'))
		{
			if($new['User']['set_password']==1)
			{
				if(!($this->Session->read('user_resume')) || !in_array($new['User']['uid'],$this->Session->read('user_resume'))){	
					$this->redirect(array('action'=>'resume_password'));
				}
			}
		}
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		$int =$this->Interest->find('all', array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('int', $int);
		$recmd =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recmd', $recmd);
		
		$new1 =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		
		$recedu =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recedu', $recedu);
		
		$recskill =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recskill', $recskill);
		$recomment=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>'Waiting')));
		$this->set('recomment', $recomment);
		$this->set('recount', count($recomment));
		$recomment1=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>'Approved')));
		$this->set('recomment1', $recomment1);
		$this->set('recount1', count($recomment1));
	    }
		
		public function skill()
		{
			
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		$this->set('new', $new);
		if(!$this->Session->read('User.username'))
		{
			if($new['User']['set_password']==1)
			{
				if(!($this->Session->read('user_resume')) || !in_array($new['User']['uid'],$this->Session->read('user_resume'))){	
					$this->redirect(array('action'=>'resume_password'));
				}
			}
		}
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		$skills =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('skill', $skills);
		$recmd =$this->Skill->find('all', array('conditions' => array('uid'=>$new['User']['uid'])));
		$this->set('recmd', $recmd);
		
		$new1 =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		
		$recedu =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recedu', $recedu);
		
		$recskill =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recskill', $recskill);
		$recomment=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>'Waiting')));
		$this->set('recomment', $recomment);
		$this->set('recount', count($recomment));
		$recomment1=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>'Approved')));
		$this->set('recomment1', $recomment1);
		$this->set('recount1', count($recomment1));
	    }
		
		public function portfolio()
		{
			
		$new =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		if(!$this->Session->read('User.username'))
		{
			if($new['User']['set_password']==1)
			{
				if(!($this->Session->read('user_resume')) || !in_array($new['User']['uid'],$this->Session->read('user_resume'))){	
					$this->redirect(array('action'=>'resume_password'));
				}
			}
		}
		$this->set('new', $new);
		$catlist =$this->Country->find('all');
		$this->set('catlist',$catlist);
        $cou =$this->Country->find('first', array('conditions' => array('iso_code2'=>$new['User']['country'])));
		$this->set('cou',$cou);	
		
		$portfolios = $this->Portfolio->find('all',array('conditions' => array('uid'=>$new['User']['uid']),'order'=>'order ASC'));
		$this->set('portfolios', $portfolios);
		
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
		
		$new1 =$this->User->find('first', array('conditions' => array('username'=>Configure::read('userpage'))));
		
		$recedu =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recedu', $recedu);
		
		$recskill =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recskill', $recskill);
		$recomment=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>'Waiting')));
		$this->set('recomment', $recomment);
		$this->set('recount', count($recomment));
		$recomment1=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>'Approved')));
		$this->set('recomment1', $recomment1);
		$this->set('recount1', count($recomment1));

	    }
		
		public function contactform()
		{
		if($this->request->is('post')){
			//$this->request->data['uid'] = $this->Session->read('User.uid');
			$this->request->data['uid'] = '0';
			$this->Contact->save($this->request->data);
			//pr($this->request->data);exit;
			
			$message='Hello,<br><br>
			You have a message<br>
			=============================================<br> 
			Subject:'."\t".$this->request->data['sub'].'<br><br>
			
			Message:'."\t".$this->request->data['msg'].'<br><br>
			------------------------------------------------------------------------------------<br/>				
			<strong>Regards,<br>
			CVomg team.<br><br>';
			/*$this->smtpoptions();
			$this->mailsend($message,'Contract Management Tool : Daily report','manikandan@aparajayah.com','manikandan@aparajayah.com','default');
			$this->Session->setFlash(__('About me Added Successfully'));*/
			$options = array($this->request->data['to'],$this->request->data['to'],$message,$this->request->data['from']);
			$this->smtpoptions($options);
		    $this->redirect(array('controller'=>'','action'=>Configure::read('userpage')));
		}

	    }
		
	public function uploadimage(){
		$this->layout='';
		$this->render(false);
		$image= $this->Image->upload_image_and_thumbnail($_FILES['file'], 800,800,180,180, "users");
	    $this->request->data['eid'] = $this->params['pass']['0'];
		$this->request->data['logo'] = $image;
		$this->Experience->save($this->request->data);
		//echo"dfgsdg";
		echo "{ msg: 'success',id:'".$this->params['pass']['0']."' }";
		
	}
	
	public function uploadexpimage(){
		$this->layout='';
		$this->render(false);
		$image= $this->Image->upload_image_and_thumbnail($_FILES['userlogofile'], 800,800,180,180, "users");
		$_SESSION['uploadimage']=$image;
		echo "{ msg: 'success',image:'".$image."' }";
		
	}
		
	public function userportimage(){
		$this->layout='';
		$this->render(false);
		$image= $this->Image->upload_image_and_thumbnail($_FILES['image'], 800,800,180,180, "user-images");
	    $_SESSION['userportimage']=$image;
		//echo"dfgsdg";
		echo "{ msg: 'success',image:'".$image."' }";
		
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
	
	public function deluploadlogo() {
		$this->layout='';
		$this->render(false);
			$this->Image->delete_image($this->Session->read('uploadimage'),"users");
		echo '<input name="userlogofile" type="file" id="userlogofile" value="" class="box upload hai"  onchange="return ajaxFile();"  >';
		
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
		$new =$this->User->find(array('username'=>Configure::read('userpage')));
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
		$new =$this->User->find(array('username'=>Configure::read('userpage')));
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
		$new =$this->User->find(array('username'=>Configure::read('userpage')));
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
		$new =$this->User->find(array('username'=>Configure::read('userpage')));
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
		$new =$this->User->find(array('username'=>Configure::read('userpage')));
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
		$new =$this->User->find(array('username'=>Configure::read('userpage')));
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
				$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
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
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
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
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
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
			$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
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
		
		$new1 =$this->User->find('first', array('conditions' => array('username'=>$this->Session->read('User.username'))));
		
		$recedu =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recedu', $recedu);
		
		$recskill =$this->Recommentation->find('all', array('conditions' => array('uid'=>$new1['User']['uid'])));
		$this->set('recskill', $recskill);
		$recomment=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>"'Waiting'")));
		$this->set('recomment', $recomment);
		$this->set('recount', count($recomment));
		$recomment1=$this->Recomment->find('all', array('conditions' => array('skill_user'=>$new1['User']['uid'],'status'=>"'Approved'")));
		$this->set('recomment1', $recomment1);
		$this->set('recount1', count($recomment1));
	 
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
	function blogdelete()
	{
	$this->layout='';
			  $this->render(false);
				//$table = $_REQUEST['table'];		
				//$field = $_REQUEST['field'];
				$value = $_REQUEST['value'];
				
				$this->request->data['rss_feed']='';
				$this->request->data['uid']=$_REQUEST['value'];
				$this->User->save($this->request->data);
				//pr($this->request->data);exit;
				echo 'yes';
				}
	
	function changetemplate(){
		//$template=$_REQUEST['id'];
		$this->layout = '';
		$this->Render(false);
		
			if($this->request->is('ajax')){
				$this->request->data['User']['uid']=$this->Session->read('User.uid');
				$this->request->data['User']['template']=$this->params['pass'][0];
				$this->User->save($this->request->data);
				
				$user_details = $this->User->find('first',array('conditions'=>array('uid'=>$this->Session->read('User.uid'))));
				$this->Session->write($user_details);
				
				echo 'success';
			}else{
				echo 'flop';
			}
			$this->Session->write(array('submenu'=>'design'));
	}
	function recommentme()
	 {
		$this->layout=''; 
		$this->render(false);
		$user=$_REQUEST['recid'];
		$skill=$_REQUEST['skill'];
		if($_REQUEST['recid']!="nologin")
		{
		$edu = $this->Recommentation->find(array('rid' =>$skill));
		$rec = $this->Recomment->find(array('uid' =>$user,'rid'=>$skill));
		
		if($this->Session->read('User.uid')==$edu['Recommentation']['uid'])
		
		echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="padding-right:5px;" onclick="closepopup()">×</button><div class="norecm same_rec" style="color:#f00;">'. __('To recommend on self is not possible,sorry!').' <br /> <br />
     <a href="" style="color:#397; cursor:pointer; font-size:12px; border:none; text-decoration:underline">'.__('Back to resume').'</a></div>';
		
		else if(empty($rec))
		echo
		 '<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="padding-right:5px;" onclick="closepopup()">×</button>
		 <div class="norecm "><textarea rows="2" cols="5" id="recm_code'.$skill.'" name="data[present_code]" style="width:242px;" class="myreccont"></textarea></div>
		 <div class="resumebtn">
			 <input type="hidden" name="" id="fetchid" value="'.$skill.'"  class="myskill" />
			 <button class="btn btn-large btn-primary disabled recmbtn1 butrec_m" id="recmbtn" style="cursor:pointer" > 
			 <img src="'.BASE_URL.'img/hand_pro_icon.png" alt="" style="padding-right:15px;">'.__('Recomment '.Configure::read('userpage').'').'</button>
			  <br /> <br />
			 <a href="#" style="color:#397; cursor:pointer; font-size:12px; border:none; text-decoration:underline" data-toggle="modal" data-target=".recommendtr">'.__('See all recommentation').'    </a>
		   </div>' ;
		
		else
		echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="padding-right:5px;" onclick="closepopup()">×</button><div class="norecm same_rec" style="color:#f00;">'. __('One recommendation by Tag possible!').' <br /> <br />
     <a href="" style="color:#397; cursor:pointer; font-size:12px; border:none; text-decoration:underline">'.__('Back to resume').'</a></div>';
		}
		else
		{
			echo'<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="padding-right:5px;" onclick="closepopup()">×</button><div class="norecm same_rec" style="color:#f00;">'. __('Please login to post the recommendation!').' <br /> <br />
     <a href="'.BASE_URL.'" style="color:#397; cursor:pointer; font-size:12px; border:none; text-decoration:underline">'.__('Login').'</a></div>';
		}
	 }
	 
	 function sentrecomment()
	 {
		$this->render(false);
		$this->layout=''; 
		if($this->request->is('ajax')){
		$this->request->data['Recomment']['recommend']=$_REQUEST['content'];
		$this->request->data['Recomment']['rid']=$_REQUEST['skill_id'];
		$this->request->data['Recomment']['uid']=$_REQUEST['user_id'];
		$this->request->data['Recomment']['status']="Waiting";
		$edu = $this->Recommentation->find(array('rid'=>$_REQUEST['skill_id']));
		$this->request->data['Recomment']['skill_user']=$edu['Recommentation']['uid'];
		$this->Recomment->save($this->request->data);
		echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="padding-right:5px;" onclick="closepopup()">×</button><div class="norecm success_rec">
      '.__('Your recommendation sent successfully waiting for approval').'
     <br /> <br />
     <a href="" style="color:#397; cursor:pointer; font-size:12px; border:none; text-decoration:underline">'.__('Back to resume').'</a>
     </div>';
		}
		else
		echo 'flop';
	 }
	 
	 function acknowledge()
	 {
		$this->render(false);
		$this->layout=''; 
		if($this->request->is('ajax')){
		$edu = $this->Recomment->find(array('recid' =>$_REQUEST['rid']));	
		$user_send_rec1 = $this->User->find(array('uid' =>$edu['Recomment']['uid']));	
		if($_REQUEST['msgk']=="ok")
		$edu['Recomment']['status']="Approved";
		else {
		$edu['Recomment']['status']="Cancel";
		$this->Recomment->delete(array('recid' =>$_REQUEST['rid']));
		}
		$this->Recomment->save($edu);
		if($edu['Recomment']['status']=="Approved"){
		$allcount = $this->Recomment->findcount(array('skill_user' =>$this->Session->read('User.uid'),'status'=>"Approved"));	
		$waitcount = $this->Recomment->findcount(array('skill_user' =>$this->Session->read('User.uid'),'status'=>"Waiting"));	
		$htm= '
		<div style="float:left; width:510px; padding-left:10px; padding-bottom:5px;">'; 
		
												if(empty($user_send_rec1['User']['image'])) {
                                           $htm.='<img src="'.BASE_URL.'img/profile_pic_mini.jpg" alt="" class="pull-left img-polaroid">';
                                            } else { 
									       $htm.='<img src="'.Router::url('/').'img/user-images/small/'.$user_send_rec1['User']['image'].'" height="20" width="20" class="pull-left img-polaroid">';
									 } 
		
		
                                           $htm.=' <div class="resume-cont recommend-list clearfix pull-left span6">
                                                <div class="resume_head">
                                                    <h5><a href="">'.$user_send_rec1['User']['username'].'</a></h5>
                                                    <small class="muted">'.$user_send_rec1['User']['resume_title'].'</small>
                                                    <span class="label label-info">Php</span>
                                                </div>

                                                <input type="text" placeholder="'.$edu['Recomment']['recommend'].'" class="span6" disabled="">
                                                <small class="muted">'.date("j / n / Y",strtotime($edu['Recomment']['createdate'])).'</small>
                                            </div></div>';
											echo $htm.'::'.__('All my recommendations ('.$allcount.')').'::'. __('Waiting for approval ('.$waitcount.')');
		}
		else
		{
			$htm='cancel';
			echo $htm;
		}
		
		
		}
		else
		echo 'flop';
	 }
	 
	 
	public function newresume()
	{
		$this->layout = 'newresume';
		$this->set('county', $this->Country->find('all'));
		
		$new =$this->User->find('first', array('conditions' => array('username'=>'ravikumar')));
		
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
	
}
