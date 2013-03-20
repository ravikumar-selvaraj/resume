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
class AdminpanelController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
 	public $helpers = array('Session');
	public $name = 'Adminpanel';	
	public $components = array('Session','Image');
	public $layout = 'adminlogin';
	public $uses = array('Adminuser');
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
		//pr($this->Session->read());
		$this->checkadmin();
		if($this->request->is('post')){
			$check_username = $this->Adminuser->find('first',array('conditions'=>array('username'=>$this->request->data('username'))));
			if(!empty($check_username)){
				if($check_username['Adminuser']['password'] == $this->request->data('password')){
					if($check_username['Adminuser']['status'] == 'Active'){
						$this->Session->write($check_username);
						$this->Session->write(array("Adminlogin"=>'True'));
						$this->redirect(array('controller'=>'adminpanel','action'=>'dashboard'));
					} else {
						$this->Session->setFlash('Invalid user');
					}
				} else {
					$this->Session->setFlash('Invalid password');
				}
			} else {
					$this->Session->setFlash('Invalid username');
				}
		}
	}
	
	public function forgetpassword() {
		if($this->request->is('post')){
			
			//$check_email = $this->Adminuser->read(array('email'=>$this->request->data('email')));
			$check_email = $this->Adminuser->find('first',array('conditions'=>array('email'=>$this->request->data('email'))));
			//pr($check_email);
			
			if(!empty($check_email)){
				//pr($this->request->data);exit;
					$message='Hello,'.$check_email['Adminuser']['adminname'].'<br><br>
					Your Password details.<br>
					=============================================<br> 
					Email:'."\t".$check_email['Adminuser']['email'].'<br><br>
					User name:'."\t".$check_email['Adminuser']['username'].'<br><br>
					Password:'."\t".$check_email['Adminuser']['password'].'<br><br>
					------------------------------------------------------------------------------------<br/>				
					<strong>Regards,<br>
					CVomg team.<br><br>';
					$options = array($this->request->data['email'],$this->request->data['email'],$message);
					$this->forgetpass($options);
				// email function comes here
				$this->Session->setFlash('Your password details sent to your email address.','');
				$this->redirect(array('controller'=>'adminpanel','action'=>'index'));
			} else {
				$this->Session->setFlash('Invalid email address.','');
				$this->redirect(array('controller'=>'adminpanel','action'=>'index'));
			}
		}
	}
	
	public function checkadmin(){
		
		$check=$this->Session->read('Adminlogin');
		if(!empty($check) && $check =='True'){		
			$this->redirect(array('controller'=>'adminpanel','action'=>'dashboard','admin'=>false));
			//$this->redirect(array('controller'=>'adminpanel','action'=>'index','admin'=>false));
		}
	}
	
	public function dashboard() {
		$this->layout = 'admin';
		//$this->checkadmin();
	}
	
	public function logout() {
		$this->Session->delete('Adminuser');
		$this->Session->delete('Adminlogin');
		$this->redirect(array('controller'=>'adminpanel','action'=>'index','admin'=>false));
	}
}
