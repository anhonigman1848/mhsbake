<?php
/* ArchiveContent Fixture generated on: 2012-02-20 06:29:30 : 1329715770 */

/**
 * ArchiveContentFixture
 *
 */
class ArchiveContentFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'archive_content';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'archive_content_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'archive_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'reel_number' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'begin_year' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'begin_month' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'end_year' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'end_month' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'contents' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'comments' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'usage_rights' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'archive_content_id', 'unique' => 1), 'archive_id' => array('column' => 'archive_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'archive_content_id' => 1,
			'archive_id' => 1,
			'reel_number' => 'Lorem ipsum dolor sit amet',
			'begin_year' => 1,
			'begin_month' => 1,
			'end_year' => 1,
			'end_month' => 1,
			'contents' => 'Lorem ipsum dolor sit amet',
			'comments' => 'Lorem ipsum dolor sit amet',
			'usage_rights' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-02-20 06:29:30',
			'modified' => '2012-02-20 06:29:30'
		),
	);
}
