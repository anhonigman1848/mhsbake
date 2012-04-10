<?php
App::uses('AppController', 'Controller');
/**
 * Archives Controller
 *
 * @property Archive $Archive
 */
class ArchivesController extends AppController {
    
    /*
     * Include these components:
     * The Search component
     * The Request handler catches and coordinates ajax requests
     */	
    public $components = array('Search.Prg', 'RequestHandler');
	
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
		$this->Archive->recursive = 0;
		$this->set('archives', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Archive->id = $id;
		if (!$this->Archive->exists()) {
			throw new NotFoundException(__('Invalid archive'));
		}
		$this->set('archive', $this->Archive->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Archive->create();
			if ($this->Archive->save($this->request->data)) {
				$this->Session->setFlash(__('The archive has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The archive could not be saved. Please, try again.'));
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
		$this->Archive->id = $id;
		if (!$this->Archive->exists()) {
			throw new NotFoundException(__('Invalid archive'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Archive->save($this->request->data)) {
				$this->Session->setFlash(__('The archive has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The archive could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Archive->read(null, $id);
		}
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
		$this->Archive->id = $id;
		if (!$this->Archive->exists()) {
			throw new NotFoundException(__('Invalid archive'));
		}
		if ($this->Archive->delete()) {
			$this->Session->setFlash(__('Archive deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Archive was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
	/*
	 * This function changes a particular archive's title based on an ajax
	 * call
	 * @param Needs an id and title passed as key:value pairs through Post
	 * @returns new value of title 
	 */
	public function updateATitle() {

		if ($this->request->is('post')) { // only change if came params came from Post

			$this->Archive->id = $_POST['id']; // prepare archive model to change data for particular archive
			if (!$this->Archive->exists()) {
				throw new NotFoundException('Invalid archive');
			}

			$this->Archive->saveField('title', $_POST['title'], true); // save new title
			$this->set('posttitle', $_POST['title']); // create variable for passing title to view
		} else {
			// some sort of error...
		}
	}
	
	/*
	 * This function changes a particular archive's series based on an ajax
	 * call
	 * @param Needs an id and series passed as key:value pairs through Post
	 * @returns new value of series 
	 */
	public function updateASeries() {

		if ($this->request->is('post')) { // only change if came params came from Post

			$this->Archive->id = $_POST['id']; // prepare archive model to change data for particular archive
			if (!$this->Archive->exists()) {
				throw new NotFoundException('Invalid archive');
			}

			$this->Archive->saveField('series', $_POST['series'], true); // save new series
			$this->set('postseries', $_POST['series']); // create variable for passing series to view
		} else {
			// some sort of error...
		}
	}
	
	/*
	 * This function changes a particular archive's series number based on an ajax
	 * call
	 * @param Needs an id and series number passed as key:value pairs through Post
	 * @returns new value of series number 
	 */
	public function updateASeriesNumber() {

		if ($this->request->is('post')) { // only change if came params came from Post

			$this->Archive->id = $_POST['id']; // prepare archive model to change data for particular archive
			if (!$this->Archive->exists()) {
				throw new NotFoundException('Invalid archive');
			}

			$this->Archive->saveField('series_number', $_POST['series_number'], true); // save new series_number
			$this->set('postseriesnumber', $_POST['series_number']); // create variable for passing series_number to view
		} else {
			// some sort of error...
		}
	}
	
	/*
	 * This function changes a particular archive's author citation based on an ajax
	 * call
	 * @param Needs an id and author citation passed as key:value pairs through Post
	 * @returns new value of author citation 
	 */
	public function updateAAuthorCitation() {

		if ($this->request->is('post')) { // only change if came params came from Post

			$this->Archive->id = $_POST['id']; // prepare archive model to change data for particular archive
			if (!$this->Archive->exists()) {
				throw new NotFoundException('Invalid archive');
			}

			$this->Archive->saveField('author_citation', $_POST['author_citation'], true); // save new author citation
			$this->set('postauthorcitation', $_POST['author_citation']); // create variable for passing author citation to view
		} else {
			// some sort of error...
		}
	}
	
	/*
	 * This function changes a particular archive's city based on an ajax
	 * call
	 * @param Needs an id and city passed as key:value pairs through Post
	 * @returns new value of city 
	 */
	public function updateACity() {

		if ($this->request->is('post')) { // only change if came params came from Post

			$this->Archive->id = $_POST['id']; // prepare archive model to change data for particular archive
			if (!$this->Archive->exists()) {
				throw new NotFoundException('Invalid archive');
			}

			$this->Archive->saveField('city', $_POST['city'], true); // save new city
			$this->set('postcity', $_POST['city']); // create variable for passing city to view
		} else {
			// some sort of error...
		}
	}
	
	/*
	 * This function changes a particular archive's county based on an ajax
	 * call
	 * @param Needs an id and county passed as key:value pairs through Post
	 * @returns new value of county 
	 */
	public function updateACounty() {

		if ($this->request->is('post')) { // only change if came params came from Post

			$this->Archive->id = $_POST['id']; // prepare archive model to change data for particular archive
			if (!$this->Archive->exists()) {
				throw new NotFoundException('Invalid archive');
			}

			$this->Archive->saveField('county', $_POST['county'], true); // save new county
			$this->set('postcounty', $_POST['county']); // create variable for passing county to view
		} else {
			// some sort of error...
		}
	}
	
	
	/*
	 * This function changes a particular archive's aleph number based on an ajax
	 * call
	 * @param Needs an id and aleph number passed as key:value pairs through Post
	 * @returns new value of aleph number 
	 */
	public function updateAAlephNumber() {

		if ($this->request->is('post')) { // only change if came params came from Post

			$this->Archive->id = $_POST['id']; // prepare archive model to change data for particular archive
			if (!$this->Archive->exists()) {
				throw new NotFoundException('Invalid archive');
			}

			$this->Archive->saveField('aleph_number', $_POST['aleph_number'], true); // save new aleph number
			$this->set('postalephnumber', $_POST['aleph_number']); // create variable for passing aleph number to view
		} else {
			// some sort of error...
		}
	}
}
