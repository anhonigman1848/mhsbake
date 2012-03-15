<?php
App::uses('AppModel', 'Model');
/**
 * NewspaperContent Model
 *
 * @property Newspaper $Newspaper
 */
class NewspaperContent extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'newspaper_content';
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'newspaper_content_id';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'newspaper_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)		
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Newspaper' => array(
			'className' => 'Newspaper',
                        'joinTable' => 'newspaper',
			'foreignKey' => 'newspaper_id',
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
		'NewspaperReel' => array(
			'className' => 'NewspaperReel',
                        'joinTable' => 'newspaper_reel',
			'foreignKey' => 'newspaper_content_id',
			'associationForeignKey' => 'newspaper_reel_id',
			'conditions' => '',
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
