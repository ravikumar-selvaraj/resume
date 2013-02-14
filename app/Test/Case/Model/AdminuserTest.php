<?php
App::uses('Adminuser', 'Model');

/**
 * Adminuser Test Case
 *
 */
class AdminuserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.adminuser'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Adminuser = ClassRegistry::init('Adminuser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Adminuser);

		parent::tearDown();
	}

}
