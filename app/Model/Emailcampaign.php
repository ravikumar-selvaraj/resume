<?php
App::uses('AppModel', 'Model');
/**
 * Emailcampaign Model
 *
 */
class Emailcampaign extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'emailcampaign';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ecid';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

}
