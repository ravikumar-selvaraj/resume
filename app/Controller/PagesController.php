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
	 }
	 
	 public function signup() {
		 if($this->request->is('post')){
			 $this->request->data['user_key'] = $this->str_rand();
			 $this->request->data['password'] = $this->ecrypt($this->request->data['password']);
			 $this->User->save($this->request->data);
			 $link = BASE_URL.'pages/useractivation/'.$this->request->data['user_key'];
			 $options = array('Ravikumar',$this->request->data['email'],$link);
			 $this->emailoptions(2,$options);
			 $this->redirect(array('action'=>'index'));
		 }
		 $this->render(false);
	 }
	
	

}
