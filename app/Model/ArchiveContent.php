<?php
App::uses('AppModel', 'Model');
/**
 * ArchiveContent Model
 *
 * @property Archive $Archive
 */
class ArchiveContent extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'archive_content';
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'archive_content_id';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'archive_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Archive' => array(
			'className' => 'Archive',
			'foreignKey' => 'archive_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ArchiveReel' => array(
			'className' => 'ArchiveReel',
			'foreignKey' => 'archive_content_id',
			'associationForeignKey' => 'archive_reel_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
