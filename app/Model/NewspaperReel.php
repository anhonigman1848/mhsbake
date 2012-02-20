<?php
App::uses('AppModel', 'Model');
/**
 * NewspaperReel Model
 *
 * @property NewspaperContent $NewspaperContent
 */
class NewspaperReel extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'newspaper_reel';
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'newspaper_reel_id';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'newspaper_content_id' => array(
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
		'NewspaperContent' => array(
			'className' => 'NewspaperContent',
			'foreignKey' => 'newspaper_content_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
