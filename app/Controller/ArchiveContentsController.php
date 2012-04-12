<?php
App::uses('AppController', 'Controller');
/**
 * ArchiveContents Controller
 *
 * @property ArchiveContent $ArchiveContent
 */
class ArchiveContentsController extends AppController {
	
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
			if (in_array($this->action, array('index', 'view',
							  'add', 'edit',
							  'delete'))) {
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


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ArchiveContent->recursive = 0;
		$this->set('archiveContents', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ArchiveContent->id = $id;
		if (!$this->ArchiveContent->exists()) {
			throw new NotFoundException(__('Invalid archive content'));
		}
		$this->set('archiveContent', $this->ArchiveContent->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ArchiveContent->create();
			if ($this->ArchiveContent->save($this->request->data)) {
				$this->Session->setFlash(__('The archive content has been saved'));
				$this->redirect(array('action' => 'view', $this->ArchiveContent->id));
			} else {
				$this->Session->setFlash(__('The archive content could not be saved. Please, try again.'));
			}
		}
		$archives = $this->ArchiveContent->Archive->find('list');
		$this->set(compact('archives'));
	}

/**
 * addWithArchive method
 *
 * @param string $id
 * @return void
 */
	public function addWithArchive($id = null) {
		$this->loadModel('Archive', $id);
		$this->set('archive', $this->Archive->read());
		if ($this->request->is('post')) {
			$this->ArchiveContent->create();
			// saveAssociated() saves into related tables
			if ($this->ArchiveContent->saveAssociated($this->request->data, $options = array('deep' => true))) {
				$this->Session->setFlash(__('The archive record has been saved'));
				$this->redirect(array('controller' => 'archive_reels', 'action' => 'record',
						      $this->ArchiveContent->ArchiveReel->id)); // display the new record
			} else {
				$this->Session->setFlash(__('The archive record could not be saved. Please try again.'));
			}
		}
	}

/**
 * addArchiveRecord method
 *
 * @return void
 */
	public function addArchiveRecord() {
		if ($this->request->is('post')) {
			$this->ArchiveContent->create();
			// saveAssociated() saves into related tables
			if ($this->ArchiveContent->saveAssociated($this->request->data, $options = array('deep' => true))) {
				$this->Session->setFlash(__('The archive record has been saved'));
				$this->redirect(array('controller' => 'archive_reels', 'action' => 'record',
						      $this->ArchiveContent->ArchiveReel->id)); // display the new record
			} else {
				$this->Session->setFlash(__('The archive record could not be saved. Please try again.'));
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
		$this->ArchiveContent->id = $id;
		if (!$this->ArchiveContent->exists()) {
			throw new NotFoundException(__('Invalid archive content'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ArchiveContent->save($this->request->data)) {
				$this->Session->setFlash(__('The archive content has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The archive content could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ArchiveContent->read(null, $id);
		}
		$archives = $this->ArchiveContent->Archive->find('list');
		$this->set(compact('archives'));
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
		$this->ArchiveContent->id = $id;
		if (!$this->ArchiveContent->exists()) {
			throw new NotFoundException(__('Invalid archive content'));
		}
		if ($this->ArchiveContent->delete()) {
			$this->Session->setFlash(__('Archive content deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Archive content was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
    /*
     * This function changes a particular archive content's begin date based on an ajax
     * call
     * @param Needs an id and begin date passed as key:value pairs through Post
     * @returns new value of begin date 
     */
    public function updateACBeginDate() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveContent->id = $_POST['id']; // prepare archive content model to change data for particular archive
	    if (!$this->ArchiveContent->exists()) {
		throw new NotFoundException('Invalid archive content');
	    }
	    
	    $this->ArchiveContent->saveField('begin_date', $_POST['begin_date'], true); // save new begin date
	    $this->set('postbegindate', $_POST['begin_date']); // create variable for passing begin date to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive content's end date based on an ajax
     * call
     * @param Needs an id and end date passed as key:value pairs through Post
     * @returns new value of end date 
     */
    public function updateACEndDate() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveContent->id = $_POST['id']; // prepare archive content model to change data for particular archive
	    if (!$this->ArchiveContent->exists()) {
		throw new NotFoundException('Invalid archive content');
	    }
	    
	    $this->ArchiveContent->saveField('end_date', $_POST['end_date'], true); // save new end_date
	    $this->set('postenddate', $_POST['end_date']); // create variable for passing gaps to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive content's reel number based on an ajax
     * call
     * @param Needs an id and reel number passed as key:value pairs through Post
     * @returns new value of reel number 
     */
    public function updateACReelNumber() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveContent->id = $_POST['id']; // prepare archive content model to change data for particular archive
	    if (!$this->ArchiveContent->exists()) {
		throw new NotFoundException('Invalid archive content');
	    }
	    
	    $this->ArchiveContent->saveField('reel_number', $_POST['reel_number'], true); // save new reel number
	    $this->set('postreelnumber', $_POST['reel_number']); // create variable for passing reel number to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive content's contents based on an ajax
     * call
     * @param Needs an id and contents passed as key:value pairs through Post
     * @returns new value of contents 
     */
    public function updateACContents() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveContent->id = $_POST['id']; // prepare archive content model to change data for particular archive
	    if (!$this->ArchiveContent->exists()) {
		throw new NotFoundException('Invalid archive content');
	    }
	    
	    $this->ArchiveContent->saveField('contents', $_POST['contents'], true); // save new contents
	    $this->set('postcontents', $_POST['contents']); // create variable for passing contents to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive content's comments based on an ajax
     * call
     * @param Needs an id and comments passed as key:value pairs through Post
     * @returns new value of comments 
     */
    public function updateACComments() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveContent->id = $_POST['id']; // prepare archive content model to change data for particular archive
	    if (!$this->ArchiveContent->exists()) {
		throw new NotFoundException('Invalid archive content');
	    }
	    
	    $this->ArchiveContent->saveField('comments', $_POST['comments'], true); // save new comments
	    $this->set('postcomments', $_POST['comments']); // create variable for passing comments to view
	} else {
	    // some sort of error...
	}
    }
    
    /*
     * This function changes a particular archive content's usage rights based on an ajax
     * call
     * @param Needs an id and usage rights passed as key:value pairs through Post
     * @returns new value of usage rights 
     */
    public function updateACUsageRights() {

	if ($this->request->is('post')) { // only change if came params came from Post
	    
	    $this->ArchiveContent->id = $_POST['id']; // prepare archive content model to change data for particular archive
	    if (!$this->ArchiveContent->exists()) {
		throw new NotFoundException('Invalid archive content');
	    }
	    
	    $this->ArchiveContent->saveField('usage_rights', $_POST['usage_rights'], true); // save new usage_rights
	    $this->set('postusagerights', $_POST['usage_rights']); // create variable for passing aleph number to view
	} else {
	    // some sort of error...
	}
    }
}
