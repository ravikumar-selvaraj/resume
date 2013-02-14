<?php
App::uses('AppModel', 'Model');
/**
 * Setting Model
 *
 */
class User extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'uid';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'uid';

}
