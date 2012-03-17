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
 * Gets Searchable behavior from Search plugin and Auditable behavior from AuditLog plugin
 *
 * @var array
 */	
	public $actsAs = array('Search.Searchable', 'AuditLog.Auditable');
	
/**
 * Search filters
 *
 * @var array
 */		
	public $filterArgs = array(            
            array('name' => 'title', 'type' => 'like', 'field' => 'Archive.title'),
            array('name' => 'city', 'type' => 'like', 'field' => 'Archive.city'),
            array('name' => 'county', 'type' => 'like', 'field' => 'Archive.county'),
            array('name' => 'county', 'type' => 'like', 'field' => 'Archive.series'),
            array('name' => 'county', 'type' => 'like', 'field' => 'Archive.series_number'),
            array('name' => 'county', 'type' => 'like', 'field' => 'Archive.author_citation'),
            array('name' => 'aleph_number', 'type' => 'like', 'field' => 'Archive.aleph_number'),
            array('name' => 'date_from',
                  'name' => 'date_to',
                  'type' => 'expression',
                  'method' => 'makeRangeCondition',
                  'field' => '(ArchiveContent.begin_date BETWEEN ? AND ? OR ArchiveContent.end_date BETWEEN ? AND ?)')           
        );

/**
 * makeRangeCondition returns an array of date strings that filterArgs can use to populate the
 * expression 'ArchiveContent.begin_date BETWEEN ? AND ? OR ArchiveContent.end_date BETWEEN ? AND ?'
 *
 * @var array
 */
        public function makeRangeCondition($data = array()) {            
            if  (
                (empty($data['date_from']['year'])) ||
                (empty($data['date_from']['month'])) ||
                (empty($data['date_from']['day'])) ||
                (empty($data['date_to']['year'])) ||
                (empty($data['date_to']['month'])) ||
                (empty($data['date_to']['day']))
                ) {
                    return array('0000-00-00', '2032-12-31', '0000-00-00', '2032-12-31');
            }
            $from = $data['date_from'];            
            $from = implode("-", $from);            
            $to = implode("-", $data['date_to']);
            return array($from, $to, $from, $to);
        }        
}
