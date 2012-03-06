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
/**
 * Validation rules
 *
 * @var array
 */	
	public $validate = array(
		'series'=>array(
			'notEmpty'=>array(
				'rule'=>'notEmpty',
				'required'=>'true',
				'message'=>'Please enter the archive Series.'
			), 
			'between'=>array(
				'rule'=>array('between', 1, 255),
				'message'=>'Minimum 2 characters in length — field cannot be left empty.'
			)
		), 
		'series_number'=>array(
				'rule'=>'alphaNumeric',
				'message'=>'Please enter numeric characters only.'
/*
		), 
		'author_citation'=>array(
				'rule'=>'notEmpty',
				'message'=>'Please enter Author Citation — field cannot be left empty.'
*/
		),		
		'title'=>array(
			'notEmpty'=>array(
				'rule'=>'notEmpty',
				'required'=>'true',
				'message'=>'Please enter the archive Title.'
			), 
			'between'=>array(
				'rule'=>array('between', 2, 255),
				'message'=>'Minimum 2 characters in length — field cannot be left empty.'
			)
/*
		), 
		'county'=>array(
				'rule'=>'notEmpty',
				'required'=>'true',
				'message'=>'Please enter County — field cannot be left empty.'
		),
		'city'=>array(
				'rule'=>'notEmpty',
				'required'=>'true',
				'message'=>'Please enter City — field cannot be left empty.'
		),
		'aleph_number'=>array(
				'rule'=>'alphaNumeric',
				'message'=>'Please enter alphanumeric characters only.'
*/
		) 
	);
	
	

}
