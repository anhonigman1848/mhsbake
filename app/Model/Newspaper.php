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
/**
 * Validation rules
 *
 * @var array
 */	
	public $validate = array(
		'title'=>array(
			'notEmpty'=>array(
				'rule'=>'notEmpty',
				'required'=>'true',
				'message'=>'Please enter the newspaper Title.'
			), 
			'between'=>array(
				'rule'=>array('between', 2, 255),
				'message'=>'Minimum 2 characters in length — field cannot be left empty.'
			)
		), 
		'city'=>array(
				'rule'=>'notEmpty',
				'required'=>'true',
				'message'=>'Please enter City — field cannot be left empty.'
		),
		'county'=>array(
				'rule'=>'notEmpty',
				'required'=>'true',
				'message'=>'Please enter County — field cannot be left empty.'
		), 
		'title_control'=>array(
				'rule'=>'notEmpty',
				'required'=>'true',
				'message'=>'Please enter Title Control — field cannot be left empty.'
/*
		), 
		'aleph_number'=>array(
				'rule'=>'alphaNumeric',
				'message'=>'Please enter alphanumeric characters only.'
*/
		) 
	);

}
