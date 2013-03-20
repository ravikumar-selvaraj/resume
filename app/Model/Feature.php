<?php
App::uses('AppModel', 'Model');
/**
 * Feature Model
 *
 */
class Feature extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'fid';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

}
