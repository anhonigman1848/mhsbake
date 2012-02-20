<?php
App::uses('AppModel', 'Model');
/**
 * Accessor Model
 *
 */
class Accessor extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'accessor';
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'accessor_id';
}
