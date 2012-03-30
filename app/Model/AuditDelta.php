<?php
App::uses('AppModel', 'Model');
/**
 * AuditDelta Model
 *
 * @property Audit $Audit
 */
class AuditDelta extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'audit_id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Audit' => array(
			'className' => 'Audit',
			'foreignKey' => 'audit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
