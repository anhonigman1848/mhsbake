<?php
/* Newspaper Fixture generated on: 2012-02-20 06:29:33 : 1329715773 */

/**
 * NewspaperFixture
 *
 */
class NewspaperFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'newspaper';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'newspaper_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'city' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'county' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'title_control' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'aleph_number' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'newspaper_id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'newspaper_id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'county' => 'Lorem ipsum dolor sit amet',
			'title_control' => 'Lorem ipsum dolor sit amet',
			'aleph_number' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-02-20 06:29:33',
			'modified' => '2012-02-20 06:29:33'
		),
	);
}
