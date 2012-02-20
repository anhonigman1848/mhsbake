<?php
App::uses('AppModel', 'Model');
/**
 * Archive Model
 *
 * @property Content $Content
 * @property Reel $Reel
 */
class Archive extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'archive';
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'archive_id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ArchiveContent' => array(
			'className' => 'ArchiveContent',
			'joinTable' => 'archive_content',
			'foreignKey' => 'archive_id',
			'associationForeignKey' => 'archive_content_id',
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
