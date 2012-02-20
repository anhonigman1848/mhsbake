<?php
/* Archive Test cases generated on: 2012-02-20 06:29:28 : 1329715768*/
App::uses('Archive', 'Model');

/**
 * Archive Test Case
 *
 */
class ArchiveTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.archive', 'app.content', 'app.archive_content', 'app.reel', 'app.archive_reel');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Archive = ClassRegistry::init('Archive');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Archive);

		parent::tearDown();
	}

}
