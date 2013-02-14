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
		$this->checkadmin();
		if($this->request->is('post')){
			$check_username = $this->Adminuser->find('first',array('username'=>$this->request->data('username')));
			if(!empty($check_username)){
				if($check_username['Adminuser']['password'] == $this->request->data('password')){
					if($check_username['Adminuser']['status'] == 'Active'){
						$this->Session->write($check_username);
						$this->Session->write(array("Adminlogin"=>'True'));
						$this->redirect(array('controller'=>'admin','action'=>'blogs'));
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
			$check_email = $this->Adminuser->find('first',array('email'=>$this->request->data('email')));
			if(!empty($check_email)){
				// email function comes here
				$this->Session->setFlash('Your password details sent to your email address.','');
				$this->redirect(array('controller'=>'adminpanel','action'=>'index'));
			} else {
				$this->Session->setFlash('Invalid email address.','');
			}
		}
	}
	
	public function checkadmin(){
		$check=$this->Session->read('Adminlogin');
		if(!empty($check) && $check =='True'){			
			$this->redirect(array('controller'=>'admin','action'=>'blogs'));
		}
	}
	
	public function logout() {
		$this->Session->delete('Adminuser');
		$this->Session->delete('Adminlogin');
		$this->redirect(array('controller'=>'adminpanel','action'=>'index'));
	}
}
