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
class TestController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Test';
	public $helpers = array('Session');
	
	public $layout = 'webpage';
	public $uses = array('User');

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
	//pr($_SESSION);
	 }
 
	 public function tefgfst() {
		
		 $this->render(false);
	 }
	 
	 public function signup()
	 {
		 if($this->request->is('post')){
				 $this->request->data['user_key'] = $this->str_rand();
				 $this->request->data['password'] = $this->ecrypt($this->request->data['password']);
				  $this->request->data['status'] = 'Inactive';
				 $this->User->save($this->request->data);
				 $link = BASE_URL.'pages/useractivation/'.$this->request->data['user_key'];
				 $options = array($this->request->data['email'],$this->request->data['email'],$link);
				 $this->emailoptions(2,$options);
				 $this->redirect(array('action'=>'index'));
			 } 
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
	 
	 public function checkuser()
	 {
		$check=$this->Session->read('Userlogin');
		if(empty($check) && $check !='True'){			
			$this->redirect(array('controller'=>'test','action'=>'index'));
		}
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
						$_SESSION['percentage']=15;		
						//pr($_SESSION); 			
						$this->redirect(array('controller'=>'test','action'=>'index'));
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
					$this->redirect(array('controller'=>'test','action'=>'index'));				
				}
			}
		}	 
		  
	  }
	  
	  
	   public function useractivation() {
			$user=$this->User->find('first',array('conditions'=>array('user_key'=>$this->params['pass'][0]))); 
			if(!empty($user))
			{
				
				$this->request->data['uid'] = $user['User']['uid'];
				$this->request->data['status'] = 'Active';
				$this->User->save($this->request->data);
				$this->Session->write($user);
				$this->Session->write(array("Userlogin"=>'True'));
				$this->redirect(array('controller'=>'test','action'=>'dashboard'));
			}
			else
			{
				$this->redirect(array('controller'=>'test','action'=>'index'));
			}
		    //pr($user);exit;		  
	  }
	  
	  public function dashboard()
	  {   $this->checkuser();
	 	 //pr($_SESSION); 
	  }
	  
	  public function logout()
	  {
		  //pr($_SESSION); die;
		$this->Session->delete('User');
		$this->Session->delete('Userlogin');
	    $this->redirect(array('controller'=>'test','action'=>'index'));

	  }
	  
	  public function test(){
	  }
	
	

}
