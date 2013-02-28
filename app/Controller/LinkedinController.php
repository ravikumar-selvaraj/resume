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
class LinkedinController extends AppController {
	
	public $helpers = array('Session');
	public $components = array('Session');
	public $uses = array('User','Setting');
		
		public function oauth_session_exists() {
			if((is_array($_SESSION)) && (array_key_exists('oauth', $_SESSION)))
			return TRUE;
			else 
			return FALSE;
		}
		
		 public function checkuser(){
			 $check=$this->Session->read('Userlogin');
			 if(empty($check) && $check !='True'){
				 $this->redirect(array('controller'=>'pages','action'=>'index'));
			 }
	 	}
		
		public function imagefromurl($inPath,$outPath){
			 //Download images from remote server
			 $in= fopen($inPath, "rb");
			 $out= fopen($outPath, "wb");
			 while ($chunk = fread($in,8192)){
				 fwrite($out, $chunk, 8192);
			 }
			 fclose($in);
			 fclose($out);
		}
		
		public function index(){
			$this->checkuser();
			App::import('Vendor','linkedin');	
			$genereal_settings = $this->Setting->find('first',array('conditions'=>array('sid'=>1)));	
			$appKey = $genereal_settings['Setting']['linkedin_appkey'];
			$secretKey = $genereal_settings['Setting']['linkedin_secret'];			
			$API_CONFIG = array('appKey'=>$appKey,'appSecret'=>$secretKey,'callbackUrl'=> BASE_URL.'linkedin/index'.'?' . LINKEDIN::_GET_TYPE . '=initiate&' . LINKEDIN::_GET_RESPONSE . '=1');
			define('DEMO_GROUP', '4010474');
			define('DEMO_GROUP_NAME', 'LINKEDIN RAVIKUMAR');
			define('PORT_HTTP', '80');
			define('PORT_HTTP_SSL', '443');
		  
			$_REQUEST[LINKEDIN::_GET_TYPE] = (isset($_REQUEST[LINKEDIN::_GET_TYPE])) ? $_REQUEST[LINKEDIN::_GET_TYPE] : '';
      		$OBJ_linkedin = new LinkedIn($API_CONFIG);
			$_GET[LINKEDIN::_GET_RESPONSE] = (isset($_GET[LINKEDIN::_GET_RESPONSE])) ? $_GET[LINKEDIN::_GET_RESPONSE] : '';
			if(!$_GET[LINKEDIN::_GET_RESPONSE]) {
				$response = $OBJ_linkedin->retrieveTokenRequest();
				if($response['success'] === TRUE) {
					$_SESSION['oauth']['linkedin']['request'] = $response['linkedin'];
					$loc =  LINKEDIN::_URL_AUTH . $response['linkedin']['oauth_token']; 
					$this->redirect($loc);
				} 
			} else {
				$response = $OBJ_linkedin->retrieveTokenAccess($_SESSION['oauth']['linkedin']['request']['oauth_token'], $_SESSION['oauth']['linkedin']['request']['oauth_token_secret'], $_GET['oauth_verifier']);
					if($response['success'] === TRUE) {
						$_SESSION['oauth']['linkedin']['access'] = $response['linkedin'];
						$_SESSION['oauth']['linkedin']['authorized'] = TRUE;
						$this->redirect(array('controller'=>'linkedin','action'=>'profile'));
					} 
				}
				
				$this->render(false);
		}
		
		public function profile(){
			$this->checkuser();
			$this->render(false);
			App::import('Vendor','linkedin');
			$API_CONFIG = array('appKey'=>'0f3hwj8z40c9','appSecret'=>'KjLZX97sRsjRgFCP','callbackUrl'=> NULL);
				$_SESSION['oauth']['linkedin']['authorized'] = (isset($_SESSION['oauth']['linkedin']['authorized'])) ? $_SESSION['oauth']['linkedin']['authorized'] : FALSE;
				
          		if($_SESSION['oauth']['linkedin']['authorized'] === TRUE) { 
					$OBJ_linkedin = new LinkedIn($API_CONFIG);
					$OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
					$OBJ_linkedin->setResponseFormat(LINKEDIN::_RESPONSE_XML);
					$response = $OBJ_linkedin->profile('~:(id,first-name,last-name,picture-url,headline,industry,location:(name,country:(code)),email-address,phone-numbers)');
					if($response['success'] === TRUE) {
						$response = new SimpleXMLElement($response['linkedin']);
						//pr($response); die;
						//echo $response['linkedin']->{'first-name'}; die;
						$image = $this->imagefromurl($response->{'picture-url'},'img/user-images/small/'.$this->Session->read('User.uid').'.jpg');
						$this->request->data['uid'] = $this->Session->read('User.uid'); 
						$this->request->data['firstname'] = $response->{'first-name'}; 
						$this->request->data['lastname'] = $response->{'last-name'};
						$this->request->data['resume_title'] = $response->headline;
						$this->request->data['image'] = $this->Session->read('User.uid').'.jpg';
						$city_array = explode(',',$response->location->name);
						$city =  str_replace('Area', '', $city_array[0]);
						$this->request->data['city'] = $city;
						$this->request->data['country'] = strtoupper($response->location->country->code);	
						pr($this->request->data); die;					
						$this->User->save($this->request->data);
						$this->redirect(array('controller'=>'linkedin','action'=>'experiance'));
					}
				}
		}
		
		public function experiance(){
			pr($_SESSION); die;
			$this->checkuser();
			$this->render(false);
			
		}
		
}
