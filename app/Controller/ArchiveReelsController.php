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
		array('field' => 'checked_out', 'type' => 'value')
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
 * qualitiy seardh method
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
				$this->redirect(array('controller' => 'archive_contents', 'action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The archive reel could not be saved. Please, try again.'));
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
		$this->ArchiveReel->id = $id;
		if (!$this->ArchiveReel->exists()) {
			throw new NotFoundException(__('Invalid archive reel'));
		}
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
			$this->redirect(array('action' => 'expanded'));
		}
		$this->Session->setFlash(__('Archive reel was not deleted'));
		$this->redirect(array('action' => 'expanded'));
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
			$this->redirect(array('action' => 'expanded'));
		}
		$this->Session->setFlash(__('Archive reel was not deleted'));
		$this->redirect(array('action' => 'expanded'));
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
			$this->redirect(array('action' => 'expanded'));
		}
		$this->Session->setFlash(__('Archive reel was not restored'));
		$this->redirect(array('action' => 'expanded'));
	}

}
