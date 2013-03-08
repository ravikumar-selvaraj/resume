<?php
App::uses('AppModel', 'Model');
/**
 * Sitecontact Model
 *
 */
class Sitecontact extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'cid';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email'=>array('rule'=>array('email')),
		'phone'=>array('rule'=>array('numeric')),
		'subject'=>array('rule'=>array('notempty')),
		'message'=>array('rule'=>array('notempty'))
	);

}
