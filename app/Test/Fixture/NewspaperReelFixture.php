<?php
/* NewspaperReel Fixture generated on: 2012-02-20 06:29:37 : 1329715777 */

/**
 * NewspaperReelFixture
 *
 */
class NewspaperReelFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'newspaper_reel';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'newspaper_reel_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'newspaper_content_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'reel_polarity' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'generation' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'redox_quality_date' => array('type' => 'date', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'redox_quality_present' => array('type' => 'boolean', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'scratches' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'quality_in' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'sdn_number' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'shipping_box' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'date_of_last_access' => array('type' => 'date', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'date_of_microfilm' => array('type' => 'date', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'checked_out' => array('type' => 'boolean', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'deleted' => array('type' => 'boolean', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'newspaper_reel_id', 'unique' => 1), 'newspaper_content_id' => array('column' => 'newspaper_content_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'newspaper_reel_id' => 1,
			'newspaper_content_id' => 1,
			'reel_polarity' => 'Lorem ipsum dolor sit amet',
			'generation' => 'Lorem ipsum dolor sit amet',
			'redox_quality_date' => '2012-02-20',
			'redox_quality_present' => 1,
			'scratches' => 'Lorem ipsum dolor sit amet',
			'quality_in' => 1,
			'sdn_number' => 1,
			'shipping_box' => 1,
			'date_of_last_access' => '2012-02-20',
			'date_of_microfilm' => '2012-02-20',
			'checked_out' => 1,
			'created' => '2012-02-20 06:29:37',
			'modified' => '2012-02-20 06:29:37',
			'deleted' => 1
		),
	);
}
