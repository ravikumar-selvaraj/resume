<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class Contact extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
 public $useTable = 'contact';
	public $primaryKey = 'conid';
	public $displayField = 'title';

}
