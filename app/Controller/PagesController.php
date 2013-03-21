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
    public $uses = array('User','Country','Skill','Education','Experience','Interest','Portfolio','Portimage','Portaudio','Portdocument','Portpresent','Portvideo','Profileview','Userdashboard','Recommentation','Recomment','Tip','Contact','Mylink');
	public $paginate = array('limit'=>20);

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
		if($this->Session->check('User'))
		$this->set('user',$this->User->find('first',array('conditions'=>array('uid'=>$this->Session->read('User.uid')))));
		
		
	 }
	/*public function noresume() {
		$this->layout='';
		$this->Session->setFlash(__('Your account is inactive. Please contact admin.'));
		$this->redirect(array('controller'=>'','action'=>'index'));
	
	} */
	 function change() {
		$lang = $this->params['pass'][0];
  		$this->Session->write('Config.language', $lang);
        $this->redirect($this->referer(null, true));
    }
 
	 public function tefgfst() {
		
		 $this->render(false);
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
				  //pr("fsd");exit;
				  $this->redirect(array('controller'=>'','action'=>Configure::read('userpage')));
				  
			  }
			  
			
				
			
			 $user= $this->User->find('first',array('conditions'=>array('uid'=>$this->Session->read('User.uid'))));
			  $this->set('user',$user);
	 }
	 
	 
	 
	 public function signup()
	 {
		 if($this->request->is('post')){
				 $this->request->data['user_key'] = $this->str_rand();
				 $this->request->data['password'] = $this->ecrypt($this->request->data['password']);
				  $this->request->data['status'] = 'Inactive';
				 
				 $this->User->save($this->request->data);
				 $this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->User->getInsertID()));
				 $link = BASE_URL.'/pages/useractivation/'.$this->request->data['user_key'];
				 $options = array($this->request->data['email'],$this->request->data['email'],$link);
				 $this->emailoptions(2,$options);
				 //$this->Session->setFlash(__('To complete your registration, please check your e-mail to validate your Cvomg Account'));
				 $this->redirect(array('action'=>'register_success'));
			 } else {
				 
			}
		 $this->render(false);
	 }
	 
	 public function register_success() {
		 
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
						
						$this->Session->setFlash(__('Your account is inactive. Please contact admin.'));
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
					
				//pr($this->request->data);exit;
					$message='Hello,'.$user['User']['firstname'].'<br><br>
					Your Password details.<br>
					=============================================<br> 
					Email:'."\t".$user['User']['email'].'<br><br>
					
					Password:'."\t".$this->decrypt($user['User']['password']).'<br><br>
					------------------------------------------------------------------------------------<br/>				
					<strong>Regards,<br>
					CVomg team.<br><br>';
					$options = array($this->request->data['email'],$this->request->data['email'],$message);
					$this->forgetpass($options);
				// email function comes here
				$this->Session->setFlash('Your password details sent to your email address.','');
				$this->redirect(array('controller'=>'pages','action'=>'index'));
					//$values = array($user['User']['firstname'],$user['User']['email'],$user['User']['email'],$user['User']['password'],'<a href="'.BASE_URL.'">Login Page</a>');
					//$this->emailoptions(2, $values);
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
				$this->request->data['template'] = 'yellow';
				$this->request->data['username'] = strtolower(str_replace(' ','-',preg_replace('/[^a-zA-Z0-9_ -]/s', '', $this->request->data['username'])));
				//pr($this->request->data);exit;	
		        $this->User->save($this->request->data);
				$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$user['User']['uid']));
				$user=$this->User->find('first',array('conditions'=>array('user_key'=>$this->params['pass'][0])));
				$this->Session->write($user);
				$this->Session->write(array("Userlogin"=>'True'));
				
				$user_dashboard_array = array('experience','education','portfolio','skills','interest');
				$i = 1; $j = 1;
				foreach($user_dashboard_array as $dash){
					$this->request->data['uid'] = $user['User']['uid'];
					$this->request->data['widget'] = $dash;
					if($i<=3)
					$this->request->data['column_name'] = 'col-2';
					else 
					$this->request->data['column_name'] = 'col-3';
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
    	$user = $this->User->find('first', array('conditions' => array('uid'=>$this->Session->read('User.uid'))));
		$this->set('user', $user);
		$new = $this->User->find('all', array('conditions' => array('status'=>'Active','uid !='=>$this->Session->read('User.uid'),'firstname !='=>''),'limit'=>'6'));
		$this->set('new', $new);
		$tips = $this->Tip->find('all', array('conditions' => array('status'=>'Active','lan'=>Configure::read('Config.language'))));
		$this->set('tips', $tips);
		
		if(!empty($user['User']['user_key']))
		$_SESSION['percentage']=15;
		if(!empty($user['User']['image']))
		$_SESSION['percentage']+=15;
		$exp = count($this->Experience->find('all',array('conditions' => array('uid'=>$this->Session->read('User.uid')))));
		if($exp ==1){
		$_SESSION['percentage']+=10;}
		if($exp ==2 ){
		$_SESSION['percentage']+=15;}
		if($exp >= 3 ){
		$_SESSION['percentage']+=20;}
		$skill = count($this->Skill->find('all',array('conditions' => array('uid'=>$this->Session->read('User.uid')))));
		if($skill ==1){
		$_SESSION['percentage']+=10;}
		if($skill ==2 ){
		$_SESSION['percentage']+=15;}
		if($skill >= 3 ){
		$_SESSION['percentage']+=20;}
		$edu = count($this->Education->find('all',array('conditions' => array('uid'=>$this->Session->read('User.uid')))));
		if($edu >=1){
		$_SESSION['percentage']+=10;}
		$int = count($this->Interest->find('all',array('conditions' => array('uid'=>$this->Session->read('User.uid')))));
		if($int >= 1){
		$_SESSION['percentage']+=10;}
		$port = count($this->Portfolio->find('all',array('conditions' => array('uid'=>$this->Session->read('User.uid')))));
		
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
				$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$user['User']['uid']));
				
				$this->redirect(array('controller'=>'pages','action'=>'dashboard'));
				
			}
		
	 	 
	  }
	  
	  public function logout()
	  {
		$this->Session->delete('User');
		$this->Session->delete('user_resume');
		$this->Session->delete('Userlogin');
	    $this->redirect(array('controller'=>'pages','action'=>'index'));

	  }
	  
	
	  public function userlist()
	  {
			$this->checkuser();
			$tips = $this->Tip->find('all', array('conditions' => array('status'=>'Active','lan'=>Configure::read('Config.language'))));
	    	$this->set('tips', $tips);
			/*$new = $this->User->find('all', array('conditions' => array('status'=>'Active')));
			$this->set('new', $new);*/
			$this->User->recursive = 0;
		    $this->set('new', $this->paginate(array('status'=>'Active','firstname != '=>'')));
			
			$user = $this->User->find('first', array('conditions' => array('uid'=>$this->Session->read('User.uid'))));
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
			$user = $this->User->find('first', array('conditions' => array('uid'=>$this->Session->read('User.uid'))));
			$this->set('user', $user);
			
			 if(isset($_REQUEST['update']))
			 {
				
				$this->request->data['uid']=$user['User']['uid'];
				$this->User->save($this->request->data);
				$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
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
					$this->User->updateAll(array('modified_date'=>"'".date('Y-m-d H:i:s')."'"),array('uid'=>$this->Session->read('User.uid')));
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
				//$table = $_REQUEST['table'];		
				//$field = $_REQUEST['field'];
				$value = $_REQUEST['value'];
				$this->Skill->deleteAll(array('uid'=>$value));
				$this->Portfolio->deleteAll(array('uid'=>$value));
				$this->Contact->deleteAll(array('uid'=>$value));
				$this->Education->deleteAll(array('uid'=>$value));
			    $this->Experience->deleteAll(array('uid'=>$value));
				$this->Interest->deleteAll(array('uid'=>$value));
				$this->Mylink->deleteAll(array('uid'=>$value));
				$this->Recommentation->deleteAll(array('uid'=>$value));
				$this->Recomment->deleteAll(array('uid'=>$value));
				$this->Userdashboard->deleteAll(array('uid'=>$value));
				$this->User->deleteAll(array('uid'=>$value));
				$this->Session->delete('User');
				$this->Session->delete('Userlogin');
				$this->Session->setFlash(__('Your account has been deleted! '));
				
				//pr($value);
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
	
	public function update_overall(){
		$this->layout = '';
		
		if(empty($this->request->data)){
			$this->redirect(array('controller'=>'','action'=>$this->Session->read('User.username')));
		}
		//pr($this->request->data); die;
		if(isset($this->request->data['portlet_col2'])) {
			$i = 1;
			foreach($this->request->data['portlet_col2'] as $col2) {
				$ex = explode('-',$col2);
				$this->request->data['column_name'] = 'col-2';
				$this->request->data['widget'] = $ex[0];
				$this->request->data['udid'] = $ex[1];
				$this->request->data['order'] = $i;
				$this->Userdashboard->save($this->request->data);
			$i++;}
		}
		
		if(isset($this->request->data['portlet_col3'])) {
			$j = 1;
			foreach($this->request->data['portlet_col3'] as $col3) {
				$ex = explode('-',$col3);
				$this->request->data['column_name'] = 'col-3';
				$this->request->data['widget'] = $ex[0];
				$this->request->data['udid'] = $ex[1];
				$this->request->data['order'] = $j;
				$this->Userdashboard->save($this->request->data);
			$j++;}
		}
		
		if(isset($this->request->data['interest'])){
			$in = 1;
			foreach($this->request->data['interest'] as $int){
				$this->request->data = '';
				$this->request->data['iid'] = $int;
				$this->request->data['order'] = $in;
				$this->Interest->save($this->request->data);
				$in++;
			}
		}
		
		if(isset($this->request->data['skills'])){
			$sk = 1;
			foreach($this->request->data['skills'] as $skill){
				$this->request->data = '';
				$this->request->data['sid'] = $skill;
				$this->request->data['order'] = $sk;
				$this->Skill->save($this->request->data);
				$sk++;
			}
		}
		
		if(isset($this->request->data['experience'])){
			$ex = 1;
			foreach($this->request->data['experience'] as $exp){
				$this->request->data['eid'] = $exp;
				$this->request->data['order'] = $ex;
				$this->Experience->save($this->request->data);
				$ex++;
			}
		}
		
		if(isset($this->request->data['education'])){
			$ed = 1;
			foreach($this->request->data['education'] as $edu){
				$this->request->data['eid'] = $edu;
				$this->request->data['order'] = $ed;
				$this->Education->save($this->request->data);
				$ed++;
			}
		}
		if(isset($this->request->data['portfolio'])){
			$p = 1;
			foreach($this->request->data['portfolio'] as $port){
				$this->request->data['pid'] = $port;
				$this->request->data['order'] = $p;
				$this->Portfolio->save($this->request->data);
				$p++;
			}
		}
		//pr($this->request->data);
		$this->render(false);
	}
	
	public function blog_newsletter_deactive() {
		$user_key = $this->params['pass'][0];
		$this->User->updateAll(array('newsletter'=>0),array('user_key'=>$user_key));
		$this->Session->setFlash(__('newsletter option deactivated successfully'));
		$this->redirect(array('controller'=>'pages','action'=>'index'));
	}
	
	public function career_newsletter_deactive() {
		$user_key = $this->params['pass'][0];
		$this->User->updateAll(array('career_newsletter'=>0),array('user_key'=>$user_key));
		$this->Session->setFlash(__('newsletter option deactivated successfully'));
		$this->redirect(array('controller'=>'pages','action'=>'index'));
	}
	
	public function graph() {
		$this->layout = '';
		$one_month_before_date = date("Y-m-d",mktime(0,0,0,date("m")-1,date("d")));
		$current_date = date("Y-m-d");
		$views = $this->Profileview->find('all',array('conditions'=>array('created_date BETWEEN ? and ?'=>array($one_month_before_date,$current_date))));
		//pr($views);
	}

}
