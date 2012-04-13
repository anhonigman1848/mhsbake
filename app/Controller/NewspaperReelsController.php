<?php
App::uses('AppController', 'Controller');
/**
 * NewspaperReels Controller
 *
 * @property NewspaperReel $NewspaperReel
 */
class NewspaperReelsController extends AppController {
	
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
			if (in_array($this->action, array('expanded',
							  'index', 'view',
							  'add', 'edit',
							  'delete'))) {
				return true; // action request authorized
			}
			return false; // action request not authorized
		}
		
		// Basic permissions [see also the beforeFilter()]
		if ($user['role'] == 'basic') {
			if (in_array($this->action, array('expanded',
							  'index', 'view'))) {
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
		$this->NewspaperReel->recursive = 0;
		$this->set('newspaperReels', $this->paginate());		
	}
/**
 * find method sets default dates for empty date fields
 * then passes form data to Prg component for search processing
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
			$this->NewspaperReel->parseCriteria($this->passedArgs));		
		$this->set('newspaperRecords', $this->paginate());
		
		
		$this->set('data', $this->passedArgs);
    }
/**
 * checkBox method writes the reel_id of a checked row to Session variable
 *
 * @return void
 */
	public function checkBox() {
		
		$this->autoRender = false;
		
		if ($this->Session->check('nr_selected')) {
			$selectedRows = $this->Session->read('nr_selected.selectedRows');			
		}
		
		$reel_id = $_POST['reel_id'];
		$checked = $_POST['checked'];
		if ($checked == 1) {
			$selectedRows[$reel_id] = $reel_id;
		} else {
			unset($selectedRows[$reel_id]);			
		}
		$this->Session->write('nr_selected.selectedRows', $selectedRows);		
	}
	
/**
 * checkBoxes method writes the reel_ids of multiple checked rows to Session variable
 *
 * @return void
 */
	public function checkBoxes() {
		
		$this->autoRender = false;
		if (!($this->Session->check('nr_selected'))) {
			$this->Session->write('nr_selected.selectedRows', array());		
		}
		
		$selectedRows = $this->Session->read('nr_selected.selectedRows');
		
		$reel_ids = array();
		$reel_ids = $_POST['nreel_ids'];				
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
		
		$this->Session->write('nr_selected.selectedRows', $selectedRows);		
	}
/**
 * display method retrieves a list of selected reel_ids and sends the assembled
 * record object to the view
 *
 * @return void
 */
	public function display() {		
		
		if (!($this->Session->check('nr_selected'))) {
			$this->Session->write('nr_selected.selectedRows', array());		
		}
		
		$reel_ids = $this->Session->read('nr_selected.selectedRows');		
		$selectedRecords = $this->paginate( 'NewspaperReel', array('NewspaperReel.newspaper_reel_id' => $reel_ids));
		$this->set('newspaperRecords', $selectedRecords);
	}
	
/**
 * display_quality method retrieves a list of selected reel_ids and sends the assembled
 * record object to the view
 *
 * @return void
 */
	public function display_quality() {		
		
		if (!($this->Session->check('nr_selected'))) {
			$this->Session->write('nr_selected.selectedRows', array());		
		}
		
		$reel_ids = $this->Session->read('nr_selected.selectedRows');		
		$selectedRecords = $this->paginate( 'NewspaperReel', array('NewspaperReel.newspaper_reel_id' => $reel_ids));
		$this->set('newspaperRecords', $selectedRecords);
	}

/**
 * 
 * exposes array of checked boxes to be read by ajax call
 *
 * @return void
 */
	public function get_check_boxes() {		
		$this->autoRender = false;
		if (!($this->Session->check('nr_selected'))) {
			$this->Session->write('nr_selected.selectedRows', array());		
		}
		$reel_ids = $this->Session->read('nr_selected.selectedRows');
		$reel_ids = json_encode($reel_ids);
		$this->response->body($reel_ids);		
	}
	
/** 
 * clears all selected Newspaper Record checkboxes
 *
 * @return void
 */
	public function clear_all_check_boxes($action) {		
		$this->autoRender = false;
		$this->Session->delete('nr_selected');
		$this->Session->write('nr_selected.selectedRows', array());
		$this->redirect(array('action' => $action));
	}


	
/**
 * quality search method sets default dates for empty date fields
 * then passes form data to Prg component for search processing
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
			$this->NewspaperReel->parseCriteria($this->passedArgs));		
		$this->set('newspaperRecords', $this->paginate());
		
		$this->set('data', $this->passedArgs);
    }
	
/**
 * expanded method
 *
 * @return void
 */
	public function expanded() {
		$this->NewspaperReel->recursive = 0;
		$this->set('newspaperRecords', $this->paginate());		
	}	

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->NewspaperReel->id = $id;
		if (!$this->NewspaperReel->exists()) {
			throw new NotFoundException(__('Invalid newspaper reel'));
		}
		$this->set('newspaperReel', $this->NewspaperReel->read(null, $id));
	}
	
/**
 * record method
 *
 * @param string $id
 * @return void
 */
	public function record($id = null) {
		$this->NewspaperReel->id = $id;
		if (!$this->NewspaperReel->exists()) {
			throw new NotFoundException(__('Invalid newspaper reel'));
		}
		$this->set('newspaperRecord', $this->NewspaperReel->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->NewspaperReel->create();
			if ($this->NewspaperReel->save($this->request->data)) {
				$this->Session->setFlash(__('The newspaper reel has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newspaper reel could not be saved. Please try again.'));
			}
		}
		$newspaperContents = $this->NewspaperReel->NewspaperContent->find('list');
		$this->set(compact('newspaperContents'));
	}

/**
 * addWithContent method
 *
 * @param string $id
 * @return void
 */
	public function addWithContent($id = null) {
		$this->loadModel('NewspaperContent', $id);
		$this->set('newspaperContent', $this->NewspaperContent->read());
		if ($this->request->is('post')) {
			$this->NewspaperReel->create();
			if ($this->NewspaperReel->save($this->request->data)) {
				$this->Session->setFlash(__('The newspaper reel has been saved'));
				$this->redirect(array('controller' => 'newspaper_contents', 'action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The newspaper reel could not be saved. Please try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->NewspaperReel->id = $id;
		if (!$this->NewspaperReel->exists()) {
			throw new NotFoundException(__('Invalid newspaper reel'));
		}
		$this->set('newspaperReel', $this->NewspaperReel->read());
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->NewspaperReel->save($this->request->data)) {
				$this->Session->setFlash(__('The newspaper reel has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The newspaper reel could not be saved. Please try again.'));
			}
		} else {
			$this->request->data = $this->NewspaperReel->read(null, $id);
		}
		$newspaperContents = $this->NewspaperReel->NewspaperContent->find('list');
		$this->set(compact('newspaperContents'));
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
		$this->NewspaperReel->id = $id;
		if (!$this->NewspaperReel->exists()) {
			throw new NotFoundException(__('Invalid newspaper reel'));
		}
		if ($this->NewspaperReel->delete()) {
			$this->Session->setFlash(__('Newspaper reel deleted'));
			$this->redirect(array('action' => 'expanded'));
		}
		$this->Session->setFlash(__('Newspaper reel was not deleted'));
		$this->redirect(array('action' => 'expanded'));
	}
	
/**
 * This is the soft delete action.  Basically, it changes the deleted field of
 * NewspaperReel to true for the NewspaperReel_id passed.
 *
 * @param string $id - this is the id of the newspaper reel to be "soft deleted"
 * @return void
 */
	public function softdelete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->NewspaperReel->id = $id;
		if (!$this->NewspaperReel->exists()) {
			throw new NotFoundException(__('Invalid newspaper reel'));
		}
		if ($this->NewspaperReel->saveField('deleted', true, false)) {
			$this->Session->setFlash(__('Newspaper reel deleted'));
			$this->redirect(array('action' => 'expanded'));
		}
		$this->Session->setFlash(__('Newspaper reel was not deleted'));
		$this->redirect(array('action' => 'expanded'));
	}


/**
 * This is the restore record action.  Basically, it changes the deleted field of
 * NewspaperReel to false for the NewspaperReel_id passed.  It is used in
 * conjunction with the "soft delete" action to restore a deleted record
 *
 * @param string $id - this is the id of the newspaper reel to be restored
 * @return void
 */
	public function restore($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->NewspaperReel->id = $id;
		if (!$this->NewspaperReel->exists()) {
			throw new NotFoundException(__('Invalid newspaper reel'));
		}
		if ($this->NewspaperReel->saveField('deleted', false, false)) {
			$this->Session->setFlash(__('Newspaper reel restored'));
			$this->redirect(array('action' => 'expanded'));
		}
		$this->Session->setFlash(__('Newspaper reel was not restored'));
		$this->redirect(array('action' => 'expanded'));
	}
    
    /*
     * This function changes a particular newspaper reels's reel polarity based on an ajax
     * call
     * @param Needs an id and reel polarity passed as key:value pairs through Post
     * @returns new value of reel polarity 
     */
    public function updateNRReelPolarity() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperReel->id = $_POST['id']; // prepare newspaper reel model to change data for particular newspaper
	    if (!$this->NewspaperReel->exists()) {
		throw new NotFoundException('Invalid newspaper reel');
	    }
	    
	    $this->NewspaperReel->saveField('reel_polarity', $_POST['reel_polarity'], true); // save new reel_polarity
	    $this->set('postreelpolarity', $_POST['reel_polarity']); // create variable for passing generation to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper reels's generation based on an ajax
     * call
     * @param Needs an id and generation passed as key:value pairs through Post
     * @returns new value of generation 
     */
    public function updateNRGeneration() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperReel->id = $_POST['id']; // prepare newspaper reel model to change data for particular newspaper
	    if (!$this->NewspaperReel->exists()) {
		throw new NotFoundException('Invalid newspaper reel');
	    }
	    
	    $this->NewspaperReel->saveField('generation', $_POST['generation'], true); // save new generation
	    $this->set('postreelgeneration', $_POST['generation']); // create variable for passing generation to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper reels's redox quality date based on an ajax
     * call
     * @param Needs an id and redox quality date passed as key:value pairs through Post
     * @returns new value of redox quality date 
     */
    public function updateNRRedoxQualityDate() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperReel->id = $_POST['id']; // prepare newspaper reel model to change data for particular newspaper
	    if (!$this->NewspaperReel->exists()) {
		throw new NotFoundException('Invalid newspaper reel');
	    }
	    
	    $this->NewspaperReel->saveField('redox_quality_date', $_POST['redox_quality_date'], true); // save new redox quality date
	    $this->set('postreelredoxqualitydate', $_POST['redox_quality_date']); // create variable for passing redox quality date to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper reels's redox quality present based on an ajax
     * call
     * @param Needs an id and redox quality present passed as key:value pairs through Post
     * @returns new value of redox quality present 
     */
    public function updateNRRedoxQualityPresent() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperReel->id = $_POST['id']; // prepare newspaper reel model to change data for particular newspaper
	    if (!$this->NewspaperReel->exists()) {
		throw new NotFoundException('Invalid newspaper reel');
	    }
	    
	    $this->NewspaperReel->saveField('redox_quality_present', $_POST['redox_quality_present'], true); // save new redox quality present
	    $this->set('postreelredoxqualitypresent', $_POST['redox_quality_present']); // create variable for passing redox quality present to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper reels's scratches based on an ajax
     * call
     * @param Needs an id and scratches passed as key:value pairs through Post
     * @returns new value of scratches 
     */
    public function updateNRScratches() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperReel->id = $_POST['id']; // prepare newspaper reel model to change data for particular newspaper
	    if (!$this->NewspaperReel->exists()) {
		throw new NotFoundException('Invalid newspaper reel');
	    }
	    
	    $this->NewspaperReel->saveField('scratches', $_POST['scratches'], true); // save new scratches
	    $this->set('postreelscratches', $_POST['scratches']); // create variable for passing scratches to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper reels's quality in based on an ajax
     * call
     * @param Needs an id and quality in passed as key:value pairs through Post
     * @returns new value of quality in 
     */
    public function updateNRQualityIn() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperReel->id = $_POST['id']; // prepare newspaper reel model to change data for particular newspaper
	    if (!$this->NewspaperReel->exists()) {
		throw new NotFoundException('Invalid newspaper reel');
	    }
	    
	    $this->NewspaperReel->saveField('quality_in', $_POST['quality_in'], true); // save new quality in
	    $this->set('postreelqualityin', $_POST['quality_in']); // create variable for passing quality in to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper reels's sdn number based on an ajax
     * call
     * @param Needs an id and sdn number passed as key:value pairs through Post
     * @returns new value of sdn number 
     */
    public function updateNRSdnNumber() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperReel->id = $_POST['id']; // prepare newspaper reel model to change data for particular newspaper
	    if (!$this->NewspaperReel->exists()) {
		throw new NotFoundException('Invalid newspaper reel');
	    }
	    
	    $this->NewspaperReel->saveField('sdn_number', $_POST['sdn_number'], true); // save new sdn number
	    $this->set('postreelsdnnumber', $_POST['sdn_number']); // create variable for passing sdn number to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper reels's shipping box based on an ajax
     * call
     * @param Needs an id and shipping box passed as key:value pairs through Post
     * @returns new value of shipping box 
     */
    public function updateNRShippingBox() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperReel->id = $_POST['id']; // prepare newspaper reel model to change data for particular newspaper
	    if (!$this->NewspaperReel->exists()) {
		throw new NotFoundException('Invalid newspaper reel');
	    }
	    
	    $this->NewspaperReel->saveField('shipping_box', $_POST['shipping_box'], true); // save new shipping box
	    $this->set('postreelshippingbox', $_POST['shipping_box']); // create variable for passing shipping box to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper reels's date of last access based on an ajax
     * call
     * @param Needs an id and date of last access passed as key:value pairs through Post
     * @returns new value of date of last access 
     */
    public function updateNRDateOfLastAccess() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperReel->id = $_POST['id']; // prepare newspaper reel model to change data for particular newspaper
	    if (!$this->NewspaperReel->exists()) {
		throw new NotFoundException('Invalid newspaper reel');
	    }
	    
	    $this->NewspaperReel->saveField('date_of_last_access', $_POST['date_of_last_access'], true); // save new date of last access
	    $this->set('postreeldateoflastaccess', $_POST['date_of_last_access']); // create variable for passing date of last access to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper reels's date of microfilm based on an ajax
     * call
     * @param Needs an id and date of microfilm passed as key:value pairs through Post
     * @returns new value of date of microfilm 
     */
    public function updateNRDateOfMicrofilm() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperReel->id = $_POST['id']; // prepare newspaper reel model to change data for particular newspaper
	    if (!$this->NewspaperReel->exists()) {
		throw new NotFoundException('Invalid newspaper reel');
	    }
	    
	    $this->NewspaperReel->saveField('date_of_microfilm', $_POST['date_of_microfilm'], true); // save new date of microfilm
	    $this->set('postreeldateofmicrofilm', $_POST['date_of_microfilm']); // create variable for passing date of microfilm to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper reels's checked out based on an ajax
     * call
     * @param Needs an id and checked out passed as key:value pairs through Post
     * @returns new value of checked out 
     */
    public function updateNRCheckedOut() {
	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperReel->id = $_POST['id']; // prepare newspaper reel model to change data for particular newspaper
	    if (!$this->NewspaperReel->exists()) {
		throw new NotFoundException('Invalid newspaper reel');
	    }
	    
	    $this->NewspaperReel->saveField('checked_out', $_POST['checked_out'], true); // save new checked out
	    $this->set('postreelcheckedout', $_POST['checked_out']); // create variable for passing checked out to view
	} else {
	    // some sort of error...
	}
    }
}
