<?php
/* NewspaperContent Test cases generated on: 2012-02-20 06:29:35 : 1329715775*/
App::uses('NewspaperContent', 'Model');

/**
 * NewspaperContent Test Case
 *
 */
class NewspaperContentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.newspaper_content', 'app.newspaper', 'app.content', 'app.reel', 'app.newspaper_reel');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->NewspaperContent = ClassRegistry::init('NewspaperContent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NewspaperContent);

		parent::tearDown();
	}

}
