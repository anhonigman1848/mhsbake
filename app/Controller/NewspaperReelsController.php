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
 * Include the Search component
 */	
	public $components = array('Search.Prg');
	
/**
 * presetVars are used by Search.Prg to pull values from models  
 */	
	public $presetVars = array(		
		array('field' => 'title', 'type' => 'value'),
		array('field' => 'city', 'type' => 'value'),
		array('field' => 'county', 'type' => 'value'),
		array('field' => 'aleph_number', 'type' => 'value',
		array('field' => 'date_from', 'type' => 'expression'),
		array('field' => 'date_to', 'type' => 'expression'))		
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
 * find method
 *
 * @return void
 */	
	public function find() {
		$this->Prg->commonProcess();		
		$this->paginate = array('conditions' => 
			$this->NewspaperReel->parseCriteria($this->passedArgs));		
		$this->set('newspaperRecords', $this->paginate());		
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
				$this->Session->setFlash(__('The newspaper reel could not be saved. Please, try again.'));
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
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->NewspaperReel->save($this->request->data)) {
				$this->Session->setFlash(__('The newspaper reel has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The newspaper reel could not be saved. Please, try again.'));
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
}
