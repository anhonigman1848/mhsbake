<?php
App::uses('AppModel', 'Model');
/**
 * Newspaper Model
 *
 * @property Content $Content
 * @property Reel $Reel
 */
class Newspaper extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'newspaper';
	
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'newspaper_id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'NewspaperContent' => array(
			'className' => 'NewspaperContent',
			'joinTable' => 'newspaper_content',
			'foreignKey' => 'newspaper_id',
			'associationForeignKey' => 'newspaper_content_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
