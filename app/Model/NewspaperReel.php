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
		),
                'Newspaper' => array(
                        'className' => 'Newspaper',
                        'foreignKey' => false,
			'dependent' => false,
			'conditions' => 'Newspaper.newspaper_id = NewspaperContent.newspaper_id',
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
            array('name' => 'title', 'type' => 'like', 'field' => 'Newspaper.title'),
            array('name' => 'city', 'type' => 'like', 'field' => 'Newspaper.city'),
            array('name' => 'county', 'type' => 'like', 'field' => 'Newspaper.county'),
            array('name' => 'aleph_number', 'type' => 'like', 'field' => 'Newspaper.aleph_number'),
            array('name' => 'date_from',
                  'name' => 'date_to',
                  'type' => 'expression',
                  'method' => 'makeRangeCondition',
                  'field' => '(NewspaperContent.begin_date BETWEEN ? AND ? OR NewspaperContent.end_date BETWEEN ? AND ?)')           
        );

/**
 * makeRangeCondition returns an array of date strings that filterArgs can use to populate the
 * expression 'NewspaperContent.begin_date BETWEEN ? AND ? OR NewspaperContent.end_date BETWEEN ? AND ?'
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
>>>>>>> b7b109802a8c79d66b8aa46c52bac94939606e9a
}
