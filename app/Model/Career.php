<?php
App::uses('AppModel', 'Model');
/**
 * Career Model
 *
 */
class Career extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'career';

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
	public $displayField = 'title';

}
