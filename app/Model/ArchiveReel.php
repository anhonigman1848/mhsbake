<?php
App::uses('AppModel', 'Model');
/**
 * ArchiveReel Model
 *
 * @property ArchiveContent $ArchiveContent
 */
class ArchiveReel extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'archive_reel';
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'archive_reel_id';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'archive_content_id' => array(
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
		'ArchiveContent' => array(
			'className' => 'ArchiveContent',
			'foreignKey' => 'archive_content_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                'Archive' => array(
                        'className' => 'Archive',
                        'foreignKey' => false,
			'dependent' => false,
			'conditions' => 'Archive.archive_id = ArchiveContent.archive_id',
			'fields' => '',
			'order' => ''
                )
	);

/**
 * Gets Auditable behavior from AuditLog plugin
 *
 * @var array
 */	
	public $actsAs = array( 'AuditLog.Auditable' );	

}
