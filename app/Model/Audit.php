<?php
App::uses('AppModel', 'Model');
/**
 * Audit Model
 *
 * @property AuditDelta $AuditDelta
 */
class Audit extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'AuditDelta' => array(
			'className' => 'AuditDelta',
			'foreignKey' => 'audit_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
