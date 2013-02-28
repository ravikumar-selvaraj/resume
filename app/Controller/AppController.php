<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('DebugKit.Toolbar','Session', 'RequestHandler');
	
	public function emailoptions($campaign, $values)
	{
		App::import('Model', 'Emailcampaign');
		$mail = new Emailcampaign();
		$listarg = $mail->read(null,$campaign);
		$options = explode(",",$listarg['Emailcampaign']['option']);
		$message = html_entity_decode(str_replace($options, $values, $listarg['Emailcampaign']['message']));
		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail();
		$email->config('smtp');	
		$email->emailFormat('html');	
		$email->replyTo(str_replace($options, $values, $listarg['Emailcampaign']['reply']));
		//$email->replyTo(str_replace($options, $values, $listarg['Emailcampaign']['reply']));
		$email->to(str_replace($options, $values, $listarg['Emailcampaign']['to']));
		$email->subject(str_replace($options, $values, $listarg['Emailcampaign']['subject']));
		$email->send($message);
	}	
	
	
	function smtpoptions($values){
		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail();
		$email->config('smtp');	
		$email->emailFormat('html');
		//pr($email->replyTo(str_replace($values, $values, $values[0])));exit;
		$email->replyTo(str_replace($values, $values, $values[0]));
		$email->to(str_replace($values, $values, $values[0]));
		$email->send($values[2]);
	}
	
		
	
	function str_rand($length = 8, $output = 'alphanum'){
		// Possible seeds
		$outputs['alpha'] = 'abcdefghijklmnopqrstuvwqyz';
		$outputs['numeric'] = '0123456789';
		$outputs['alphanum'] = 'abcdefghijklmnopqrstuvwqyz0123456789';
		$outputs['hexadec'] = '0123456789abcdef';
		
		// Choose seed
		if (isset($outputs[$output])) {
			$output = $outputs[$output];
		}
	
		// Seed generator
		list($usec, $sec) = explode(' ', microtime());
		$seed = (float) $sec + ((float) $usec * 100000);
		mt_srand($seed);
		
		// Generate
		$str = '';
		$output_count = strlen($output);
		for ($i = 0; $length > $i; $i++) {
			$str .= $output{mt_rand(0, $output_count - 1)};
		}
	
		return $str;
	}
	
	/*-Encryption-*/
	function ecrypt($str){
		$result = '';
		$key = "cvomgCVOMG!@#";
		for($i=0; $i<strlen($str); $i++) {
			 $char = substr($str, $i, 1);
			 $keychar = substr($key, ($i % strlen($key))-1, 1);
			 $char = chr(ord($char)+ord($keychar));
			 $result.=$char;
		}
		return urlencode(base64_encode($result));
	}

	/*-Decryption-*/
	function decrypt($str){
		$str = base64_decode(urldecode($str));
		$result = '';
		$key = "cvomgCVOMG!@#";
		for($i=0; $i<strlen($str); $i++) {
			$char = substr($str, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		return $result;
	}
	
	
	
}
