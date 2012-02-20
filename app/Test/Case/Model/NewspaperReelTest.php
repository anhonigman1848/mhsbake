<?php
/* NewspaperReel Test cases generated on: 2012-02-20 06:29:37 : 1329715777*/
App::uses('NewspaperReel', 'Model');

/**
 * NewspaperReel Test Case
 *
 */
class NewspaperReelTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.newspaper_reel', 'app.newspaper_content', 'app.newspaper', 'app.content', 'app.reel');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->NewspaperReel = ClassRegistry::init('NewspaperReel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NewspaperReel);

		parent::tearDown();
	}

}
