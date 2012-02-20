<?php
/* ArchiveReel Test cases generated on: 2012-02-20 06:29:32 : 1329715772*/
App::uses('ArchiveReel', 'Model');

/**
 * ArchiveReel Test Case
 *
 */
class ArchiveReelTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.archive_reel', 'app.archive_content', 'app.archive', 'app.content', 'app.reel');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ArchiveReel = ClassRegistry::init('ArchiveReel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ArchiveReel);

		parent::tearDown();
	}

}
