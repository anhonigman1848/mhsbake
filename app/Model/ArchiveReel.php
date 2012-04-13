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
 * Gets Searchable behavior from Search plugin and 
 * 		Auditable behavior from AuditLog plugin and 
 * 		CsvExport behavior in Model->Behavior
 *
 * @var array
 */	
	public $actsAs = array(
		'Search.Searchable', 
		'AuditLog.Auditable', 
		'CsvExport' => array(
	        'delimiter'  => ';', //The delimiter for the values, default is ;
	        'enclosure' => '"', //The enclosure, default is "
	        'max_execution_time' => 360, //Increase for Models with lots of data, has no effect is php safemode is enabled.
	        'encoding' => 'utf8' //Prefixes the return file with a BOM and attempts to utf_encode() data
    	)
	);
	
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
            array('name' => 'reel_number', 'type' => 'value', 'field' => 'ArchiveContent.reel_number'),
            array('name' => 'series', 'type' => 'like', 'field' => 'Archive.series'),
            array('name' => 'series_number', 'type' => 'like', 'field' => 'Archive.series_number'),
            array('name' => 'date_from',                  
                  'type' => 'expression',
                  'method' => 'makeRangeCondition',
                  'field' => '(ArchiveContent.begin_date BETWEEN ? AND ? OR ArchiveContent.end_date BETWEEN ? AND ?)'),
            array('name' => 'redox_from',                  
                  'type' => 'expression',
                  'method' => 'makeRedoxRangeCondition',
                  'field' => 'ArchiveReel.redox_quality_date BETWEEN ? AND ?'),
            array('name' => 'redox_quality_present', 'type' => 'value', 'field' => 'ArchiveReel.redox_quality_present'),
            array('name' => 'checked_out', 'type' => 'value', 'field' => 'ArchiveReel.checked_out'),
            array('name' => 'deleted', 'type' => 'value', 'field' => 'ArchiveReel.deleted')
        );

/**
 * makeRangeCondition returns an array of date strings that filterArgs can use to populate the
 * expression 'ArchiveContent.begin_date BETWEEN ? AND ? OR ArchiveContent.end_date BETWEEN ? AND ?'
 *
 * @var array
 */
        public function makeRangeCondition($data = array()) {
            
            if  (empty($data['date_from'])) {
                $from = '0000-00-00';
            }
            else {
                $from = $data['date_from']; 
            }
            
            if  (empty($data['date_to'])) {
                $to = '2032-12-31';
            }
            else {
                $to = $data['date_to']; 
            }                
            
            return array($from, $to, $from, $to);
        }

/**
 * makeRedoxRangeCondition returns an array of date strings that filterArgs can use to populate the
 * expression 'ArchiveReel.redox_quality_date BETWEEN ? AND ?'
 *
 * @var array
 */
        public function makeRedoxRangeCondition($data = array()) {
            
            if  (empty($data['redox_from'])) {
                $from = '0000-00-00';
            }
            else {
                $from = $data['redox_from']; 
            }
            
            if  (empty($data['redox_to'])) {
                $to = '2032-12-31';
            }
            else {
                $to = $data['redox_to']; 
            }                
            
            return array($from, $to);
        }
}
