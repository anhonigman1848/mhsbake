<?php
/* NewspaperContent Fixture generated on: 2012-02-20 06:29:35 : 1329715775 */

/**
 * NewspaperContentFixture
 *
 */
class NewspaperContentFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'newspaper_content';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'newspaper_content_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'newspaper_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'begin_date' => array('type' => 'date', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'end_date' => array('type' => 'date', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'reel_control' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'gaps' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'comments' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'usage_rights' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'newspaper_content_id', 'unique' => 1), 'newspaper_id' => array('column' => 'newspaper_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'newspaper_content_id' => 1,
			'newspaper_id' => 1,
			'begin_date' => '2012-02-20',
			'end_date' => '2012-02-20',
			'reel_control' => 'Lorem ipsum dolor sit amet',
			'gaps' => 'Lorem ipsum dolor sit amet',
			'comments' => 'Lorem ipsum dolor sit amet',
			'usage_rights' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-02-20 06:29:35',
			'modified' => '2012-02-20 06:29:35'
		),
	);
}
