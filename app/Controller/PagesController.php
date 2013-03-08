<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';
	public $helpers = array('Session');
	public $layout = 'webpage';
    public $uses = array('User','Country','Skill','Education','Experience','Interest','Portfolio','Portimage','Portaudio','Portdocument','Portpresent','Portvideo','Profileview','Userdashboard','Recommentation','Recomment');
	//public $paginate = array('limit'=>1);

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session','Image');

/**
 * This controller does not use a model
 *
 * @var array
 */

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
 	public function index() { 
		//pr($_SESSION['User']); die;
		if(isset($_SESSION['User']))
		$this->set('user',$this->User->find('first',array('conditions'=>array('uid'=>$_SESSION['User']['uid']))));
		
	 }
 
	 public function tefgfst() {
		
		 $this->render(false);
	 }
	 
	 function addrec()
	 {
		  if($this->request->is('post')){
				 $this->request->data['user_key'] = $this->str_rand();
				 $this->request->data['password'] = $this->ecrypt($this->request->data['password']);
				  $this->request->data['status'] = 'Inactive';
				 
				 $this->User->save($this->request->data);
				 $link = BASE_URL.'/pages/useractivation/'.$this->request->data['user_key'];
				 $options = array($this->request->data['email'],$this->request->data['email'],$link);
				 $this->emailoptions(2,$options);
				 $this->Session->setFlash(__('Please check your mail to complete the registration process'));
				 $this->redirect(array('action'=>'index'));
			 }
	 }
	 
	 
	 
	 public function signup()
	 {
		 if($this->request->is('post')){
				 $this->request->data['user_key'] = $this->str_rand();
				 $this->request->data['password'] = $this->ecrypt($this->request->data['password']);
				  $this->request->data['status'] = 'Inactive';
				 
				 $this->User->save($this->request->data);
				 $link = BASE_URL.'/pages/useractivation/'.$this->request->data['user_key'];
				 $options = array($this->request->data['email'],$this->request->data['email'],$link);
				 $this->emailoptions(2,$options);
				 $this->Session->setFlash(__('Please check your mail to complete the registration process'));
				 $this->redirect(array('action'=>'index'));
			 } else {
				 
			}
		 $this->render(false);
	 }
	 
	 public function session_set(){
		 $this->layout = '';
		 $exp_id = $_REQUEST['exp_id'];
		 $this->Session->write('edit_identity',$exp_id);
		 $this->render(false);
	 }
	 
	 
	 public function check_email()
	 {
		 $this->layout = '';
		 $email = $_REQUEST['email'];
		 $user = $this->User->find('first',array('conditions'=>array('email'=>$email)));
		 if(empty($user))
		 echo "success";
		 else
		 echo "failed";
		 $this->render(false);
	 }
	 
	  public function check_set_email()
	 {
		 $this->layout = '';
		 $email = $_REQUEST['email'];
		 $uid = $_REQUEST['uid'];
		 $user = $this->User->find('first',array('conditions'=>array('email'=>$email,'user_key !='=>$uid)));
		 if(empty($user))
		 echo "success";
		 else
		 echo "failed";
		 $this->render(false);
	 }
	 
	  public function check_user_pwd()
	 {
		 $this->layout = '';
		 $pwd = $_REQUEST['pwd'];
		 $user_key = $_REQUEST['user_key'];
		 $user = $this->User->find('first',array('conditions'=>array('password'=>$this->ecrypt($pwd),'user_key'=>$user_key)));
		 if(!empty($user))
		 echo "success";
		 else
		 echo "failed";
		 $this->render(false);
	 }
	 
	 public function check_username()
	 {
		 $this->layout = '';
		 $username = $_REQUEST['user'];
		 $user = $this->User->find('first',array('conditions'=>array('username'=>$username)));
		 if(empty($user))
		 echo "success";
		 else
		 echo "failed";
		 $this->render(false);
	 }
	 
	 public function check_login()
	 {
		 $this->layout = '';
		 $email = $_REQUEST['email'];
		 $pwd = $_REQUEST['pwd'];
		 $user = $this->User->find('first',array('conditions'=>array('email'=>$email)));
		 if(!empty($user)){
			 if($user['User']['password'] != $this->ecrypt($pwd)){
				 echo "nopwd";
			 }
		 } else {
			 echo "noemail";
		 }
		 
		 $this->render(false);
	 }
	 
	 public function check_rss(){
		 $this->layout = '';
		 $feed = $_REQUEST['rss_feed'];
		 $content = file_get_contents($feed);
		 if (!simplexml_load_string($content))
		 echo "failed";
		 else
		 echo "success";
		 $this->render(false);
	 }
	 
	 public function checkuser()
	 {
		$check=$this->Session->read('Userlogin');
		if(empty($check) && $check !='True'){			
			$this->redirect(array('controller'=>'pages','action'=>'index'));
		}
	 }
	 
	 public function publish_resume(){
		 $this->layout = '';
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
	 
	 public function broadcast_resume(){
		 $this->layout = '';
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
	 
	 public function protect_resume(){
		 $this->layout = '';
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
	
	public function signin()
	{
		   if($this->request->is('post')){
			   $this->request->data['password'] = $this->ecrypt($this->request->data['password']);
			   if(!empty($this->request->data)){
				   $user=$this->User->find('first',array('conditions'=>array('email'=>$this->request->data['email'],'password'=>$this->request->data['password'],'status'=>'Active'))); 
				   if(!empty($user)){
						$this->Session->write($user);
						$this->Session->write(array("Userlogin"=>'True'));						
						$this->redirect(array('controller'=>'pages','action'=>'dashboard'));
					}
					else
					{
						$this->redirect(array('controller'=>'pages','action'=>'index'));
					}
				}		    
		   }		  
	  }
	  
	public function forget()
	{
		if($this->request->is('post'))
		{
			if(!empty($this->request->data))
			{
				$user=$this->User->find('first',array('conditions'=>array('email'=>$this->request->data['email']))); 
				if(!empty($user))
				{
					$values = array($user['User']['firstname'],$user['User']['email'],$user['User']['email'],$user['User']['password'],'<a href="'.BASE_URL.'">Login Page</a>');
					$this->emailoptions(2, $values);
					$this->redirect(array('controller'=>'pages','action'=>'index'));				
				}
			}
		}	 
		  
	  }
	  
	  
	   public function useractivation() {
		  // pr($this->params['pass'][0]);exit;
			$user=$this->User->find('first',array('conditions'=>array('user_key'=>$this->params['pass'][0])));
			
				//if($user['User']['user_key']==$this->params['pass'][0]){		
			if( (!empty($user['User']['firstname'])) && ($user['User']['user_key']==$this->params['pass'][0])){
					
					if(!empty($user))
					{
					$this->redirect(array('controller'=>'pages','action'=>'activated/'.$this->params['pass'][0]));
					}
					else
					{
					$this->redirect(array('controller'=>'pages','action'=>'index'));
					}
			}
		
			 if(!empty($this->request->data))
			{
				
				if((isset($this->request->data['newsletter'])))
				{
					$this->request->data['newsletter']=1;
				}
				else
				{
					$this->request->data['newsletter']=0;
				}
				$this->request->data['user_key']=$this->params['pass'][0];
				$this->request->data['uid']=$user['User']['uid'];
				$this->request->data['status'] = 'Active';
				$this->request->data['username'] = strtolower(str_replace(' ','-',preg_replace('/[^a-zA-Z0-9_ -]/s', '', $this->request->data['username'])));
				//pr($this->request->data);exit;	
		        $this->User->save($this->request->data);
				$user=$this->User->find('first',array('conditions'=>array('user_key'=>$this->params['pass'][0])));
				$this->Session->write($user);
				$this->Session->write(array("Userlogin"=>'True'));
				
				$user_dashboard_array = array('experience','education','portfolio','skills','interest');
				$i = 1; $j = 1;
				foreach($user_dashboard_array as $dash){
					$this->request->data['uid'] = $user['User']['uid'];
					$this->request->data['widget'] = $dash;
					if($i<=3)
					$this->request->data['column_name'] = 'span5 middle-col';
					else 
					$this->request->data['column_name'] = 'span4 right-col';
					$this->request->data['order'] = $j;
					
					$this->Userdashboard->saveAll($this->request->data);
					$i++; $j++;
					if($j>3)
					$j = 1;
				}
				
				
				$this->redirect(array('controller'=>'pages','action'=>'dashboard'));
			}
	  }
	   public function activated()
	  {
		  $user = $this->User->find('first', array('conditions' => array('user_key'=>$this->params['pass'][0])));
		  $this->set('user', $user);
	  }
	  public function dashboard()
	  { 
	    $this->checkuser();
    	$user = $this->User->find('first', array('conditions' => array('uid'=>$_SESSION['User']['uid'])));
		$this->set('user', $user);
		$new = $this->User->find('all', array('conditions' => array('status'=>'Active','uid !='=>$_SESSION['User']['uid'])));
		$this->set('new', $new);
		
		if(!empty($user['User']['user_key']))
		$_SESSION['percentage']=15;
		if(!empty($user['User']['image']))
		$_SESSION['percentage']+=15;
		$exp = count($this->Experience->find('all',array('conditions' => array('uid'=>$_SESSION['User']['uid']))));
		if($exp ==1){
		$_SESSION['percentage']+=10;}
		if($exp ==2 ){
		$_SESSION['percentage']+=15;}
		if($exp >= 3 ){
		$_SESSION['percentage']+=20;}
		$skill = count($this->Skill->find('all',array('conditions' => array('uid'=>$_SESSION['User']['uid']))));
		if($skill ==1){
		$_SESSION['percentage']+=10;}
		if($skill ==2 ){
		$_SESSION['percentage']+=15;}
		if($skill >= 3 ){
		$_SESSION['percentage']+=20;}
		$edu = count($this->Education->find('all',array('conditions' => array('uid'=>$_SESSION['User']['uid']))));
		if($edu >=1){
		$_SESSION['percentage']+=10;}
		$int = count($this->Interest->find('all',array('conditions' => array('uid'=>$_SESSION['User']['uid']))));
		if($int >= 1){
		$_SESSION['percentage']+=10;}
		$port = count($this->Portimage->find('all',array('conditions' => array('uid'=>$_SESSION['User']['uid']))));
		$portv = count($this->Portvideo->find('all',array('conditions' => array('uid'=>$_SESSION['User']['uid']))));
		$portd = count($this->Portdocument->find('all',array('conditions' => array('uid'=>$_SESSION['User']['uid']))));
		$portp = count($this->Portpresent->find('all',array('conditions' => array('uid'=>$_SESSION['User']['uid']))));
		$porta = count($this->Portaudio->find('all',array('conditions' => array('uid'=>$_SESSION['User']['uid']))));
		
		$port=$port+$portv+$portd+$portp+$porta;
	//	pr($port);exit;
		if($port >= 1){
		$_SESSION['percentage']+=10;}
		
		$this->set('exp', $exp);
		$this->set('int', $int);
		$this->set('skill', $skill);
		$this->set('port', $port);
		$this->set('edu', $edu);
		
		 if(isset($_REQUEST['save']))
			{
				if((isset($this->request->data['newsletter'])))
				{
					$this->request->data['newsletter']=1;
				}
				else
				{
					$this->request->data['newsletter']=0;
				}
				if((isset($this->request->data['career_newsletter'])))
				{
					$this->request->data['career_newsletter']=1;
				}
				else
				{
					$this->request->data['career_newsletter']=0;
				}
				$this->request->data['uid']=$user['User']['uid'];
				//pr($this->request->data);exit;
		        $this->User->save($this->request->data);
				$this->redirect(array('controller'=>'pages','action'=>'dashboard'));
				
			}
		
	 	 
	  }
	  
	  public function logout()
	  {
		$this->Session->delete('User');
		$this->Session->delete('Userlogin');
	    $this->redirect(array('controller'=>'pages','action'=>'index'));

	  }
	  
	
	  public function userlist()
	  {
			$this->checkuser();
			/*$new = $this->User->find('all', array('conditions' => array('status'=>'Active')));
			$this->set('new', $new);*/
			$this->User->recursive = 0;
		    $this->set('new', $this->paginate(array('status'=>'Active')));
			
			$user = $this->User->find('first', array('conditions' => array('uid'=>$_SESSION['User']['uid'])));
			$this->set('user', $user);
			 if(isset($_REQUEST['save']))
			{
				if((isset($this->request->data['newsletter'])))
				{
					$this->request->data['newsletter']=1;
				}
				else
				{
					$this->request->data['newsletter']=0;
				}
				if((isset($this->request->data['career_newsletter'])))
				{
					$this->request->data['career_newsletter']=1;
				}
				else
				{
					$this->request->data['career_newsletter']=0;
				}
				$this->request->data['uid']=$user['User']['uid'];
				//pr($this->request->data);exit;
		        $this->User->save($this->request->data);
				$this->redirect(array('controller'=>'pages','action'=>'userlist'));
				
			}

	  }
	  
	    public function setting()
		{
			$this->checkuser();
			$user = $this->User->find('first', array('conditions' => array('uid'=>$_SESSION['User']['uid'])));
			$this->set('user', $user);
			
			 if(isset($_REQUEST['update']))
			 {
				
				$this->request->data['uid']=$user['User']['uid'];
				$this->User->save($this->request->data);
				$this->redirect(array('controller'=>'pages','action'=>'setting'));
			   // 
			}
			 if(isset($_REQUEST['password']))
			 {
				$this->request->data['old'] = $this->ecrypt($this->request->data['old']);
				
				if($user['User']['password']==$this->request->data['old'])
				{
					//pr($user['User']['password']);
					
				$this->request->data['uid']=$user['User']['uid'];	
				$this->request->data['password']=$this->ecrypt($this->request->data['password']);
			//	pr($this->request->data);exit;
				if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The password has been changed'));
				$this->redirect(array('controller'=>'pages','action'=>'setting'));
				} else {
				$this->Session->setFlash(__('The password could not be changed. Please, try again.'));
				}
				}
				else
				{
				$this->Session->setFlash(__('The old password is wrong. Please, try again.'));
				$this->redirect(array('controller'=>'pages','action'=>'setting'));
				}
				
			 }
			
		}
		
		
		  public function deleteaccount()
		  {
			  $this->layout='';
			  $this->render(false);
				$table = $_REQUEST['table'];		
				$field = $_REQUEST['field'];
				
				//$this->data[$table]['status']='Trash';
				//$this->data[$table][$field]=$_REQUEST['value'];
				//$this->Session->delete('User');
				//$this->Session->destroy();
				echo 'yes';
				}
	  
	 public function update_dashboard() {
		 $this->layout = '';
		 $items=$_REQUEST['items'];
		 $i = 0;
		 foreach($items as $item){
			 $dashes = $this->Userdashboard->find('first',array('conditions'=>array('uid'=>$this->params['pass'][0],'widget'=>$item['id'])));
			 $this->request->data['udid'] = $dashes['Userdashboard']['udid'];
			 $this->request->data['uid'] = $this->params['pass'][0];
			 $this->request->data['widget'] = $item['id'];
			 $this->request->data['column_name'] = $item['column_no'];
			 $this->request->data['order'] = $item['order'];
			 $this->Userdashboard->saveAll($this->request->data);
			 $i++;
		 }
		 $this->render(false);
	 }
	  
	public function update_experience() {
		$this->layout = '';
		$item=$_REQUEST['items'];
		$experiences = $this->Experience->find('all',array('conditions'=>array('uid'=>$this->params['pass'][0])));
		$i=0;
		foreach($experiences as $exp){
			$this->request->data['eid'] = $item[$i]['id'];
			$this->request->data['order'] = $item[$i]['order'];
			$this->Experience->save($this->request->data);
			$i++;
		}
		$this->render(false);
	}
	
	public function update_education() {
		$this->layout = '';
		$item=$_REQUEST['items'];
		//pr($item);
		$educations = $this->Education->find('all',array('conditions'=>array('uid'=>$this->params['pass'][0])));
		$i=0;
		foreach($educations as $exp){
			$this->request->data['eid'] = $item[$i]['id'];
			$this->request->data['order'] = $item[$i]['order'];
			$this->Education->save($this->request->data);
			$i++;
		}
		$this->render(false);
	}
	
	public function update_interest() {
		$this->layout = '';
		$item=$_REQUEST['items'];
		//pr($item);
		$interests = $this->Interest->find('all',array('conditions'=>array('uid'=>$this->params['pass'][0])));
		$i=0;
		foreach($interests as $exp){
			$this->request->data['iid'] = $item[$i]['id'];
			$this->request->data['order'] = $item[$i]['order'];
			$this->Interest->save($this->request->data);
			$i++;
		}
		$this->render(false);
	}
	
	public function update_skills() {
		$this->layout = '';
		$item=$_REQUEST['items'];
		//pr($item);
		$skills = $this->Skill->find('all',array('conditions'=>array('uid'=>$this->params['pass'][0])));
		$i=0;
		foreach($skills as $exp){
			$this->request->data['sid'] = $item[$i]['id'];
			$this->request->data['order'] = $item[$i]['order'];
			$this->Skill->save($this->request->data);
			$i++;
		}
		$this->render(false);
	}

}
