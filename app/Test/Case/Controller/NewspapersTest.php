<?php
/* Newspapers Test cases generated on: 2012-02-20 06:37:22 : 1329716242*/
App::uses('Newspapers', 'Controller');

/**
 * TestNewspapers *
 */
class TestNewspapers extends Newspapers {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * Newspapers Test Case
 *
 */
class NewspapersTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.archive_reel', 'app.archive_content', 'app.archive');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Newspapers = new TestNewspapers();
		$this->->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Newspapers);

		parent::tearDown();
	}

}
