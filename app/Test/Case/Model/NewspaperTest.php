<?php
/* Newspaper Test cases generated on: 2012-02-20 06:29:33 : 1329715773*/
App::uses('Newspaper', 'Model');

/**
 * Newspaper Test Case
 *
 */
class NewspaperTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.newspaper', 'app.content', 'app.newspaper_content', 'app.reel', 'app.newspaper_reel');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Newspaper = ClassRegistry::init('Newspaper');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Newspaper);

		parent::tearDown();
	}

}
