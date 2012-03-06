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
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newspaper content could not be saved. Please, try again.'));
			}
		}
		$newspapers = $this->NewspaperContent->Newspaper->find('list');
		$this->set(compact('newspapers'));
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
				$this->redirect(array('action' => 'index'));
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
}
