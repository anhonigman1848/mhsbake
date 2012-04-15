<?php
App::uses('AppController', 'Controller');
/**
 * NewspaperContents Controller
 *
 * @property NewspaperContent $NewspaperContent
 */
class NewspaperContentsController extends AppController {
	
	/*
	 * Include these helpers for the views
	 */
	public $helpers = array('Access');
	
    /*
     * Include these components:
     * The Search component
     * The Request handler catches and coordinates ajax requests
     */	
    public $components = array('RequestHandler');
	
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
			if (in_array($this->action, array('addNewspaperRecord',
							  'addWithNewspaper',
							  'view'))) {
				return true; // action request authorized
			}
			return false; // action request not authorized
		}
		
		// Basic permissions [see also the beforeFilter()]
		if ($user['role'] == 'basic') {
			if (in_array($this->action, array('index', 'view'))) {
				return true; // action request authorized
			}
			return false; // action request not authorized
		}
		
		return false; // action request not authorized - unknown user 
	}

	public $uses = array('NewspaperContent', 'Newspaper');
/**
 * index method
 *
 * @return void
 */
	public function index() {		
		$this->NewspaperContent->recursive = 0;		
		$this->set('newspaperContents', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->NewspaperContent->id = $id;
		if (!$this->NewspaperContent->exists()) {
			throw new NotFoundException(__('Invalid newspaper content'));
		}
		$this->set('newspaperContent', $this->NewspaperContent->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->NewspaperContent->create();
			if ($this->NewspaperContent->save($this->request->data)) {
				$this->Session->setFlash(__('The newspaper content has been saved'));
				$this->redirect(array('action' => 'view', $this->NewspaperContent->id));
			} else {
				$this->Session->setFlash(__('The newspaper content could not be saved. Please, try again.'));
			}
		}
		$newspapers = $this->NewspaperContent->Newspaper->find('list');
		$this->set(compact('newspapers'));
	}

/**
 * addWithNewspaper method
 *
 * @param string $id
 * @return void
 */
	public function addWithNewspaper($id = null) {
		// loadModel() makes model data and methods available in this controller
		$this->loadModel('Newspaper', $id);
		// create reference to Newspaper with given id
		$this->set('newspaper', $this->Newspaper->read());
		if ($this->request->is('post')) {
			$this->NewspaperContent->create();
			// saveAssociated() saves into related tables
			if ($this->NewspaperContent->saveAssociated($this->request->data, $options = array('deep' => true))) {
				$this->Session->setFlash(__('The newspaper record has been saved'));
				$this->redirect(array('controller' => 'newspaper_reels', 'action' => 'record',
						      $this->NewspaperContent->NewspaperReel->id)); // display the new record
			} else {
				$this->Session->setFlash(__('The newspaper record could not be saved. Please try again.'));
			}
		}
	}

/**
 * addNewspaperRecord method
 *
 * @return void
 */
	public function addNewspaperRecord() {
		if ($this->request->is('post')) {
			$this->NewspaperContent->create();
			// saveAssociated() saves into related tables
			if ($this->NewspaperContent->saveAssociated($this->request->data, $options = array('deep' => true))) {
				$this->Session->setFlash(__('The newspaper record has been saved'));
				$this->redirect(array('controller' => 'newspaper_reels', 'action' => 'record',
						      $this->NewspaperContent->NewspaperReel->id)); // display the new record
			} else {
				$this->Session->setFlash(__('The newspaper record could not be saved. Please try again.'));
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
		$this->NewspaperContent->id = $id;
		if (!$this->NewspaperContent->exists()) {
			throw new NotFoundException(__('Invalid newspaper content'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->NewspaperContent->save($this->request->data)) {
				$this->Session->setFlash(__('The newspaper content has been saved'));
				// display newspaper_content with edits made
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The newspaper content could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->NewspaperContent->read(null, $id);
		}
		$newspapers = $this->NewspaperContent->Newspaper->find('list');
		$this->set(compact('newspapers'));
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
		$this->NewspaperContent->id = $id;
		if (!$this->NewspaperContent->exists()) {
			throw new NotFoundException(__('Invalid newspaper content'));
		}
		if ($this->NewspaperContent->delete()) {
			$this->Session->setFlash(__('Newspaper content deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Newspaper content was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    /*
     * This function changes a particular newspaper content's begin date based on an ajax
     * call
     * @param Needs an id and begin date passed as key:value pairs through Post
     * @returns new value of begin date 
     */
    public function updateNCBeginDate() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperContent->id = $_POST['id']; // prepare newspaper content model to change data for particular newspaper
	    if (!$this->NewspaperContent->exists()) {
		throw new NotFoundException('Invalid newspaper content');
	    }
	    
	    $this->NewspaperContent->saveField('begin_date', $_POST['begin_date'], true); // save new begin date
	    $this->set('postbegindate', $_POST['begin_date']); // create variable for passing begin date to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper content's end date based on an ajax
     * call
     * @param Needs an id and end date passed as key:value pairs through Post
     * @returns new value of end date 
     */
    public function updateNCEndDate() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperContent->id = $_POST['id']; // prepare newspaper content model to change data for particular newspaper
	    if (!$this->NewspaperContent->exists()) {
		throw new NotFoundException('Invalid newspaper content');
	    }
	    
	    $this->NewspaperContent->saveField('end_date', $_POST['end_date'], true); // save new end_date
	    $this->set('postenddate', $_POST['end_date']); // create variable for passing gaps to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper content's reel control based on an ajax
     * call
     * @param Needs an id and reel control passed as key:value pairs through Post
     * @returns new value of reel control 
     */
    public function updateNCReelControl() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperContent->id = $_POST['id']; // prepare newspaper content model to change data for particular newspaper
	    if (!$this->NewspaperContent->exists()) {
		throw new NotFoundException('Invalid newspaper content');
	    }
	    
	    $this->NewspaperContent->saveField('reel_control', $_POST['reel_control'], true); // save new reel control
	    $this->set('postreelcontrol', $_POST['reel_control']); // create variable for passing reel control to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper content's gaps based on an ajax
     * call
     * @param Needs an id and gaps passed as key:value pairs through Post
     * @returns new value of gaps 
     */
    public function updateNCGaps() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperContent->id = $_POST['id']; // prepare newspaper content model to change data for particular newspaper
	    if (!$this->NewspaperContent->exists()) {
		throw new NotFoundException('Invalid newspaper content');
	    }
	    
	    $this->NewspaperContent->saveField('gaps', $_POST['gaps'], true); // save new gaps
	    $this->set('postgaps', $_POST['gaps']); // create variable for passing gaps to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper content's comments based on an ajax
     * call
     * @param Needs an id and comments passed as key:value pairs through Post
     * @returns new value of comments 
     */
    public function updateNCComments() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperContent->id = $_POST['id']; // prepare newspaper content model to change data for particular newspaper
	    if (!$this->NewspaperContent->exists()) {
		throw new NotFoundException('Invalid newspaper content');
	    }
	    
	    $this->NewspaperContent->saveField('comments', $_POST['comments'], true); // save new comments
	    $this->set('postcomments', $_POST['comments']); // create variable for passing comments to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular newspaper content's usage rights based on an ajax
     * call
     * @param Needs an id and usage rights passed as key:value pairs through Post
     * @returns new value of usage rights 
     */
    public function updateNCUsageRights() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->NewspaperContent->id = $_POST['id']; // prepare newspaper content model to change data for particular newspaper
	    if (!$this->NewspaperContent->exists()) {
		throw new NotFoundException('Invalid newspaper content');
	    }
	    
	    $this->NewspaperContent->saveField('usage_rights', $_POST['usage_rights'], true); // save new usage_rights
	    $this->set('postusagerights', $_POST['usage_rights']); // create variable for passing aleph number to view
	} else {
	    // some sort of error...
	}
    }
}
