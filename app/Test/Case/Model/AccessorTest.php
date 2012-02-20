<?php
/* Accessor Test cases generated on: 2012-02-20 06:29:27 : 1329715767*/
App::uses('Accessor', 'Model');

/**
 * Accessor Test Case
 *
 */
class AccessorTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.accessor');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Accessor = ClassRegistry::init('Accessor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Accessor);

		parent::tearDown();
	}

}
