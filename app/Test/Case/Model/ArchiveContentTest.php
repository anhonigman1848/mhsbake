<?php
/* ArchiveContent Test cases generated on: 2012-02-20 06:29:30 : 1329715770*/
App::uses('ArchiveContent', 'Model');

/**
 * ArchiveContent Test Case
 *
 */
class ArchiveContentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.archive_content', 'app.archive', 'app.content', 'app.reel', 'app.archive_reel');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ArchiveContent = ClassRegistry::init('ArchiveContent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ArchiveContent);

		parent::tearDown();
	}

}
