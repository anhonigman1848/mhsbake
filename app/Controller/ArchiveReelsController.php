<?php
App::uses('AppController', 'Controller');
/**
 * ArchiveReels Controller
 *
 * @property ArchiveReel $ArchiveReel
 */
class ArchiveReelsController extends AppController {
    
	
	/*
	 * Include these helpers for the views
	 */
	public $helpers = array('Access');

	
	/*
	 *	beforeFilter() runs before its internal script before
	 *	the action function (such as add, delete, or index) starts.
	 *	Here, we add string names to the array of actions allowed
	 *	without authorization.
	 */
	public function beforeFilter() {
	    parent::beforeFilter();
	    // Give some permissions that don't depend on authentication, such
	    // as for logging in and logging out. Send an array as a parameter
	    // if allowing more than one action. If allow passes no parameters,
	    // authorization is given to all actions.
	    //$this->Auth->allow();
	}
	
	
	/*
	 *	isAuthorized(), as the UsersController level, makes additional
	 *	checks for authentication.  Looking below, you see that several
	 *	cases are considered:
	 *		1. user session id and user id do not match
	 *		2. $user['role'] is considered for each role, returning
	 *		   true if the role is authorized to request action and
	 *		   false if not authorized
	 *		3. no user roles were matched, so authentication is not
	 *		   given
	 *	Checks for an action can be cirmcumvented completely by adding
	 *	to $this->Auth->allow(ADD_TO_ARRAY) in beforeFilter().
	 *	@precondition - this username and password checked
	 *	@postcondition -  authorization pass/fails if returns true/false
	 */
	public function isAuthorized($user) {
		
		// Admin permissions [see also the beforeFilter()]
		if ($user['role'] == 'admin') {
			return true; // every action request authorized
		}
		
		// Staff permissions [see also the beforeFilter()]
		if ($user['role'] == 'staff') {
			if (in_array($this->action, array('find', 'checkBox',
							  'checkBoxes', 'display',
							  'get_check_boxes',
							  'clear_all_check_boxes',
							  'record', 'quality',
							  'softdelete',
							  'editNewspaperRecord',
							  'addWithContent',
							  'addWithNewspaper'))) {
				return true; // action request authorized
			}
			return true; // action request not authorized
		}
		
		// Basic permissions [see also the beforeFilter()]
		if ($user['role'] == 'basic') {
			if (in_array($this->action, array('find', 'checkBox',
							  'checkBoxes', 'display',
							  'get_check_boxes',
							  'clear_all_check_boxes',
							  'record'))) {
				return true; // action request authorized
			}
			return false; // action request not authorized
		}
		
		return false; // action request not authorized - unknown user 
	}
	
    /*
     * Include these components:
     * The Search component
     * The Request handler catches and coordinates ajax requests
     */
    public $components = array('Search.Prg', 'RequestHandler');
	
/**
 * presetVars are used by Search.Prg to pull values from models  
 */	
	public $presetVars = array(		
		array('field' => 'title', 'type' => 'value'),
		array('field' => 'city', 'type' => 'value'),
		array('field' => 'county', 'type' => 'value'),
		array('field' => 'aleph_number', 'type' => 'value'),
		array('field' => 'series', 'type' => 'value'),
		array('field' => 'series_number', 'type' => 'value'),
		array('field' => 'author_citation', 'type' => 'value'),		
		array('field' => 'reel_number', 'type' => 'value'),		
		array('field' => 'date_from', 'type' => 'value'),
		array('field' => 'date_to', 'type' => 'value'),
		array('field' => 'redox_from', 'type' => 'value'),
		array('field' => 'redox_to', 'type' => 'value'),
		array('field' => 'redox_quality_present', 'type' => 'value'),
		array('field' => 'checked_out', 'type' => 'value'),
		array('field' => 'deleted', 'type' => 'value')
        );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ArchiveReel->recursive = 0;
		$this->set('archiveReels', $this->paginate());
	}
	
/**
 * find method
 *
 * @return void
 */	
	public function find() {
		if (empty($this->passedArgs['date_from'])) {
			$this->passedArgs['date_from'] = '0000-00-00';	
		}
		if (empty($this->passedArgs['date_to'])) {
			$this->passedArgs['date_to'] = '2032-12-31';	
		}		
		$this->Prg->commonProcess();		
		$this->paginate = array('conditions' => 
			$this->ArchiveReel->parseCriteria($this->passedArgs));		
		$this->set('archiveRecords', $this->paginate());
		
		$this->set('data', $this->passedArgs);
    }

/**
 * checkBox method writes the reel_id of a checked row to Session variable
 *
 * @return void
 */
	public function checkBox() {
		
		$this->autoRender = false;
		
		if ($this->Session->check('ar_selected')) {
			$selectedRows = $this->Session->read('ar_selected.selectedRows');			
		}
		
		$reel_id = $_POST['reel_id'];
		$checked = $_POST['checked'];
		if ($checked == 1) {
			$selectedRows[$reel_id] = $reel_id;
		} else {
			unset($selectedRows[$reel_id]);			
		}
		$this->Session->write('ar_selected.selectedRows', $selectedRows);		
	}
	
/**
 * checkBoxes method writes the reel_ids of multiple checked rows to Session variable
 *
 * @return void
 */
	public function checkBoxes() {
		
		$this->autoRender = false;
		if (!($this->Session->check('ar_selected'))) {
			$this->Session->write('ar_selected.selectedRows', array());		
		}
		
		$selectedRows = $this->Session->read('ar_selected.selectedRows');
		
		$reel_ids = array();
		$reel_ids = $_POST['areel_ids'];				
		$checked = $_POST['checked'];
		
		if ($checked == 1) {
			for ($i = 0; $i < sizeof($reel_ids); $i++){
				$selectedRows[$reel_ids[$i]] = $reel_ids[$i];
			}
		} else {
			for ($i = 0; $i < sizeof($reel_ids); $i++){
				unset($selectedRows[$reel_ids[$i]]);
			}
		}
		
		$this->Session->write('ar_selected.selectedRows', $selectedRows);		
	}
	
/**
 * quality search method
 *
 * @return void
 */	
	public function quality() {
		if (empty($this->passedArgs['date_from'])) {
			$this->passedArgs['date_from'] = '0000-00-00';	
		}
		if (empty($this->passedArgs['date_to'])) {
			$this->passedArgs['date_to'] = '2032-12-31';	
		}
		if (empty($this->passedArgs['redox_from'])) {
			$this->passedArgs['redox_from'] = '0000-00-00';	
		}
		if (empty($this->passedArgs['redox_to'])) {
			$this->passedArgs['redox_to'] = '2032-12-31';	
		}	
		$this->Prg->commonProcess();		
		$this->paginate = array('conditions' => 
			$this->ArchiveReel->parseCriteria($this->passedArgs));		
		$this->set('archiveRecords', $this->paginate());
		
		$this->set('data', $this->passedArgs);
    }
    

/**
 * display method retrieves a list of selected reel_ids and sends the assembled
 * record object to the view
 *
 * @return void
 */
	public function display() {		
		
		if (!($this->Session->check('ar_selected'))) {
			$this->Session->write('ar_selected.selectedRows', array());		
		}
		
		$reel_ids = $this->Session->read('ar_selected.selectedRows');		
		$selectedRecords = $this->paginate( 'ArchiveReel', array('ArchiveReel.archive_reel_id' => $reel_ids));
		$this->set('archiveRecords', $selectedRecords);
	}
	
/**
 * display_quality method retrieves a list of selected reel_ids and sends the assembled
 * record object to the view
 *
 * @return void
 */
	public function display_quality() {		
		
		if (!($this->Session->check('ar_selected'))) {
			$this->Session->write('ar_selected.selectedRows', array());		
		}
		
		$reel_ids = $this->Session->read('ar_selected.selectedRows');		
		$selectedRecords = $this->paginate( 'ArchiveReel', array('ArchiveReel.archive_reel_id' => $reel_ids));
		$this->set('archiveRecords', $selectedRecords);
	}

/**
 * export_selected method retrieves a list of selected reel_ids and sends the assembled
 * record object to the view
 *
 * @return void
 */
	public function export_selected() {		
	    $this->autoLayout = false;				
		if (!($this->Session->check('ar_selected'))) {
			$this->Session->write('ar_selected.selectedRows', array());		
		}
		$reel_ids = $this->Session->read('ar_selected.selectedRows');		
		$selectedRecords = $this->paginate( 'ArchiveReel', array('ArchiveReel.archive_reel_id' => $reel_ids));
		$this->set('archiveRecords', $selectedRecords);
/* 		debug($selectedRecords); */
/* need more information on paginate array to order reels by polarity ('order' => array('ArchiveReel.reel_polarity' => 'desc' )) */
	}
	
/**
 * export method prompts download of csv formatted file containing all 
 * records in the Model's underlying database table. 
 *
 */
 	public function export() {
	    $this->autoRender = false;
	    $modelClass = $this->modelClass;
	    $this->response->type('Content-Type: text/csv');
	    $this->response->download( strtolower( Inflector::pluralize( $modelClass ) ) . '.csv' );
	    $this->response->body( $this->$modelClass->exportCSV() );
	}	

/**
 * 
 * exposes array of checked boxes to be read by ajax call
 *
 * @return void
 */
	public function get_check_boxes() {		
		$this->autoRender = false;
		if (!($this->Session->check('ar_selected'))) {
			$this->Session->write('ar_selected.selectedRows', array());		
		}
		$reel_ids = $this->Session->read('ar_selected.selectedRows');
		$reel_ids = json_encode($reel_ids);
		$this->response->body($reel_ids);		
	}	

/** 
 * clears all selected Archive Record checkboxes
 *
 * @return void
 */
	public function clear_all_check_boxes($action) {		
		$this->autoRender = false;
		$this->Session->delete('ar_selected');
		$this->Session->write('ar_selected.selectedRows', array());
		$this->redirect(array('action' => $action));
	}
	
/**
 * expanded method
 *
 * @return void
 */
	public function expanded() {
		$this->ArchiveReel->recursive = 0;
		$this->set('archiveRecords', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ArchiveReel->id = $id;
		if (!$this->ArchiveReel->exists()) {
			throw new NotFoundException(__('Invalid archive reel'));
		}
		$this->set('archiveReel', $this->ArchiveReel->read(null, $id));
	}
	
/**
 * record method
 *
 * @param string $id
 * @return void
 */
	public function record($id = null) {
		$this->ArchiveReel->id = $id;
		if (!$this->ArchiveReel->exists()) {
			throw new NotFoundException(__('Invalid archive reel'));
		}
		$this->set('archiveRecord', $this->ArchiveReel->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ArchiveReel->create();
			if ($this->ArchiveReel->save($this->request->data)) {
				$this->Session->setFlash(__('The archive reel has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The archive reel could not be saved. Please, try again.'));
			}
		}
		$archiveContents = $this->ArchiveReel->ArchiveContent->find('list');
		$this->set(compact('archiveContents'));
	}

/**
 * addWithContent method
 *
 * @param string $id
 * @return void
 */
	public function addWithContent($id = null) {
		$this->loadModel('ArchiveContent', $id);
		$this->set('archiveContent', $this->ArchiveContent->read());
		if ($this->request->is('post')) {
			$this->ArchiveReel->create();
			if ($this->ArchiveReel->save($this->request->data)) {
				$this->Session->setFlash(__('The archive reel has been saved'));
				$this->redirect(array('controller' => 'archive_reels', 'action' => 'record',
						      $this->ArchiveContent->ArchiveReel->id)); // display the new record
			} else {
				$this->Session->setFlash(__('The archive reel could not be saved. Please, try again.'));
			}
		}
	}

/**
 * offlineEdit method
 * saves changes made offline
 *
 * @return void
 */
	public function offlineEdit() {
		$this->autoRender = false;
		$records = array();
		$records = $_POST['records'];
		$records = json_decode($records[0], true);
		foreach ($records as $record) {			
			$this->ArchiveReel->saveAssociated($record, $options = array('deep' => true));
		}
	}


/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ArchiveReel->id = $id;
		if (!$this->ArchiveReel->exists()) {
			throw new NotFoundException(__('Invalid archive reel'));
		}
		$this->set('archiveReel', $this->ArchiveReel->read());
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ArchiveReel->save($this->request->data)) {
				$this->Session->setFlash(__('The archive reel has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The archive reel could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ArchiveReel->read(null, $id);
		}
		$archiveContents = $this->ArchiveReel->ArchiveContent->find('list');
		$this->set(compact('archiveContents'));
	}

/**
 * editArchiveRecord method
 *
 * @param string $id
 * @return void
 */
	public function editArchiveRecord($id = null) {
		$this->ArchiveReel->id = $id;
		if (!$this->ArchiveReel->exists()) {
			throw new NotFoundException(__('Invalid archive content'));
		}
		$this->set('archiveReel', $this->ArchiveReel->read());
		if ($this->request->is('post') || $this->request->is('put')) {
			// saveAssociated() saves into related tables
			if ($this->ArchiveReel->saveAssociated($this->request->data, $options = array('deep' => true))) {
				$this->Session->setFlash(__('The archive record has been saved'));
				$this->redirect(array('action' => 'record', $id)); // display the edited record
			} else {
				$this->Session->setFlash(__('The archive content could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ArchiveReel->read(null, $id);
		}
	}

/**
 * cancel method
 *
 * @param string $id
 * @return void
 */
	public function cancel($id = null) {
		$this->ArchiveReel->id = $id;
		if (!$this->ArchiveReel->exists()) {
			throw new NotFoundException(__('Invalid archive reel'));
		}
		$this->Session->setFlash(__('Edit cancelled. Changes not saved.'));
		$this->redirect(array('action' => 'record', $id)); // display the unedited record
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ArchiveReel->id = $id;
		if (!$this->ArchiveReel->exists()) {
			throw new NotFoundException(__('Invalid archive reel'));
		}
		if ($this->ArchiveReel->delete()) {
			$this->Session->setFlash(__('Archive reel deleted'));
			$this->redirect(array('action' => 'find'));
		}
		$this->Session->setFlash(__('Archive reel was not deleted'));
		$this->redirect(array('action' => 'find'));
	}


/**
 * This is the soft delete action.  Basically, it changes the deleted field of
 * ArchiveReel to true for the ArchiveReel_id passed.
 *
 * @param string $id - this is the id of the archive reel to be "soft deleted"
 * @return void
 */
	public function softdelete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ArchiveReel->id = $id;
		if (!$this->ArchiveReel->exists()) {
			throw new NotFoundException(__('Invalid archive reel'));
		}
		if ($this->ArchiveReel->saveField('deleted', true, false)) {
			$this->Session->setFlash(__('Archive reel deleted'));
			$this->redirect(array('action' => 'find'));
		}
		$this->Session->setFlash(__('Archive reel was not deleted'));
		$this->redirect(array('action' => 'find'));
	}


/**
 * This is the restore record action.  Basically, it changes the deleted field of
 * ArchiveReel to false for the ArchiveReel_id passed.  It is used in
 * conjunction with the "soft delete" action to restore a deleted record
 *
 * @param string $id - this is the id of the archive reel to be restored
 * @return void
 */
	public function restore($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->ArchiveReel->id = $id;
		if (!$this->ArchiveReel->exists()) {
			throw new NotFoundException(__('Invalid archive reel'));
		}
		if ($this->ArchiveReel->saveField('deleted', false, false)) {
			$this->Session->setFlash(__('Archive reel restored'));
			$this->redirect(array('action' => 'find'));
		}
		$this->Session->setFlash(__('Archive reel was not restored'));
		$this->redirect(array('action' => 'find'));
	}
	
    /*
     * This function changes a particular archive reels's reel polarity based on an ajax
     * call
     * @param Needs an id and reel polarity passed as key:value pairs through Post
     * @returns new value of reel polarity 
     */
    public function updateARReelPolarity() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveReel->id = $_POST['id']; // prepare archive reel model to change data for particular archive
	    if (!$this->ArchiveReel->exists()) {
		throw new NotFoundException('Invalid archive reel');
	    }
	    
	    $this->ArchiveReel->saveField('reel_polarity', $_POST['reel_polarity'], true); // save new reel_polarity
	    $this->set('postreelpolarity', $_POST['reel_polarity']); // create variable for passing generation to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive reels's generation based on an ajax
     * call
     * @param Needs an id and generation passed as key:value pairs through Post
     * @returns new value of generation 
     */
    public function updateARGeneration() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveReel->id = $_POST['id']; // prepare archive reel model to change data for particular archive
	    if (!$this->ArchiveReel->exists()) {
		throw new NotFoundException('Invalid archive reel');
	    }
	    
	    $this->ArchiveReel->saveField('generation', $_POST['generation'], true); // save new generation
	    $this->set('postreelgeneration', $_POST['generation']); // create variable for passing generation to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive reels's redox quality date based on an ajax
     * call
     * @param Needs an id and redox quality date passed as key:value pairs through Post
     * @returns new value of redox quality date 
     */
    public function updateARRedoxQualityDate() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveReel->id = $_POST['id']; // prepare archive reel model to change data for particular archive
	    if (!$this->ArchiveReel->exists()) {
		throw new NotFoundException('Invalid archive reel');
	    }
	    
	    $this->ArchiveReel->saveField('redox_quality_date', $_POST['redox_quality_date'], true); // save new redox quality date
	    $this->set('postreelredoxqualitydate', $_POST['redox_quality_date']); // create variable for passing redox quality date to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive reels's redox quality present based on an ajax
     * call
     * @param Needs an id and redox quality present passed as key:value pairs through Post
     * @returns new value of redox quality present 
     */
    public function updateARRedoxQualityPresent() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveReel->id = $_POST['id']; // prepare archive reel model to change data for particular archive
	    if (!$this->ArchiveReel->exists()) {
		throw new NotFoundException('Invalid archive reel');
	    }
	    
	    $this->ArchiveReel->saveField('redox_quality_present', $_POST['redox_quality_present'], true); // save new redox quality present
	    $this->set('postreelredoxqualitypresent', $_POST['redox_quality_present']); // create variable for passing redox quality present to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive reels's scratches based on an ajax
     * call
     * @param Needs an id and scratches passed as key:value pairs through Post
     * @returns new value of scratches 
     */
    public function updateARScratches() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveReel->id = $_POST['id']; // prepare archive reel model to change data for particular archive
	    if (!$this->ArchiveReel->exists()) {
		throw new NotFoundException('Invalid archive reel');
	    }
	    
	    $this->ArchiveReel->saveField('scratches', $_POST['scratches'], true); // save new scratches
	    $this->set('postreelscratches', $_POST['scratches']); // create variable for passing scratches to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive reels's quality in based on an ajax
     * call
     * @param Needs an id and quality in passed as key:value pairs through Post
     * @returns new value of quality in 
     */
    public function updateARQualityIn() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveReel->id = $_POST['id']; // prepare archive reel model to change data for particular archive
	    if (!$this->ArchiveReel->exists()) {
		throw new NotFoundException('Invalid archive reel');
	    }
	    
	    $this->ArchiveReel->saveField('quality_in', $_POST['quality_in'], true); // save new quality in
	    $this->set('postreelqualityin', $_POST['quality_in']); // create variable for passing quality in to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive reels's sdn number based on an ajax
     * call
     * @param Needs an id and sdn number passed as key:value pairs through Post
     * @returns new value of sdn number 
     */
    public function updateARSdnNumber() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveReel->id = $_POST['id']; // prepare archive reel model to change data for particular archive
	    if (!$this->ArchiveReel->exists()) {
		throw new NotFoundException('Invalid archive reel');
	    }
	    
	    $this->ArchiveReel->saveField('sdn_number', $_POST['sdn_number'], true); // save new sdn number
	    $this->set('postreelsdnnumber', $_POST['sdn_number']); // create variable for passing sdn number to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive reels's shipping box based on an ajax
     * call
     * @param Needs an id and shipping box passed as key:value pairs through Post
     * @returns new value of shipping box 
     */
    public function updateARShippingBox() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveReel->id = $_POST['id']; // prepare archive reel model to change data for particular archive
	    if (!$this->ArchiveReel->exists()) {
		throw new NotFoundException('Invalid archive reel');
	    }
	    
	    $this->ArchiveReel->saveField('shipping_box', $_POST['shipping_box'], true); // save new shipping box
	    $this->set('postreelshippingbox', $_POST['shipping_box']); // create variable for passing shipping box to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive reels's date of last access based on an ajax
     * call
     * @param Needs an id and date of last access passed as key:value pairs through Post
     * @returns new value of date of last access 
     */
    public function updateARDateOfLastAccess() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveReel->id = $_POST['id']; // prepare archive reel model to change data for particular archive
	    if (!$this->ArchiveReel->exists()) {
		throw new NotFoundException('Invalid archive reel');
	    }
	    
	    $this->ArchiveReel->saveField('date_of_last_access', $_POST['date_of_last_access'], true); // save new date of last access
	    $this->set('postreeldateoflastaccess', $_POST['date_of_last_access']); // create variable for passing date of last access to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive reels's date of microfilm based on an ajax
     * call
     * @param Needs an id and date of microfilm passed as key:value pairs through Post
     * @returns new value of date of microfilm 
     */
    public function updateARDateOfMicrofilm() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveReel->id = $_POST['id']; // prepare archive reel model to change data for particular archive
	    if (!$this->ArchiveReel->exists()) {
		throw new NotFoundException('Invalid archive reel');
	    }
	    
	    $this->ArchiveReel->saveField('date_of_microfilm', $_POST['date_of_microfilm'], true); // save new date of microfilm
	    $this->set('postreeldateofmicrofilm', $_POST['date_of_microfilm']); // create variable for passing date of microfilm to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive reels's checked out based on an ajax
     * call
     * @param Needs an id and checked out passed as key:value pairs through Post
     * @returns new value of checked out 
     */
    public function updateARCheckedOut() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveReel->id = $_POST['id']; // prepare archive reel model to change data for particular archive
	    if (!$this->ArchiveReel->exists()) {
		throw new NotFoundException('Invalid archive reel');
	    }
	    
	    $this->ArchiveReel->saveField('checked_out', $_POST['checked_out'], true); // save new checked out
	    $this->set('postreelcheckedout', $_POST['checked_out']); // create variable for passing checked out to view
	} else {
	    // some sort of error...
	}
    }

}
