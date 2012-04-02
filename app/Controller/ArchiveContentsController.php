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
}
