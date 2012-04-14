<?php
class UsersController extends AppController {

	/*
	 * Include these helpers for the views
	 */
	public $helpers = array('Access');

	/*
	 *	Include these components:
	 *	The Request handler catches and coordinates ajax requests
	 */
	public $components = array('RequestHandler');

	public $name = 'Users';

	/*
	 *	beforeFilter() runs before its internal script before
	 *	the action function (such as add, delete, or index) starts.
	 *	Here, we add string names to the array of actions allowed
	 *	without authorization.
	 */
	public function beforeFilter() {
	    parent::beforeFilter();
	    // Give some permissions that don't depend on authentication, such
	    // as for logging in and logging out
	    $this->Auth->allow(array('login','logout','add'));
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
	 *	@postcondition - authorization pass/fails if returns true/false
	 */
	public function isAuthorized($user) {

		// Admin permissions [see also the beforeFilter()]
		if ($user['role'] == 'admin') {
			return true; // every action request authorized
		}

		// Staff permissions [see also the beforeFilter()]
		if ($user['role'] == 'staff') {
			if (in_array($this->action, array('login', 'logout',
							  'index', 'view',
							  'add', 'edit'))) {
				return true; // action request authorized
			}
			return false; // action request not authorized
		}

		// Basic permissions [see also the beforeFilter()]
		if ($user['role'] == 'basic') {
			if (in_array($this->action, array('login', 'logout',
							  'index', 'view',
							  'edit'))) {
				return true; // action request authorized
			}
			return false; // action request not authorized
		}

		return false; // action request not authorized - unknown user 
	}

	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());   
	        } else {
	            $this->Session->setFlash('Your username/password combination was incorrect');
	        }
	    }
	}

	public function logout() {
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}

    public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->User->find('all'));
	}

	/*
	 * This function changes the user's first name based on an ajax call
	 * @param Needs an id and firstname passed as key:value pairs through Post
	 * @returns new value of first name 
	 */
	public function updateFirstName() {

		if ($this->request->is('post')) { // only change if came params came from Post
			// App::import('Core', 'sanitize'); // Learn Later
			// $title = Sanitize::clean($this->data['User']['first_name']); // Learn Later

			$this->User->id = $_POST['id']; // prepare user model to change data for particular user
			if (!$this->User->exists()) {
				throw new NotFoundException('Invalid user');
			}

			$this->User->saveField('first_name', $_POST['first_name'], false); // save new first name
			$this->set('postfirstname', $_POST['first_name']); // create variable for passing first name to view
		} else {
			// some sort of error...
		}
	}

	/*
	 * This function changes a user's Last name based on an ajax call
	 * @param Needs an id and lastname passed as key:value pairs through Post
	 * @returns new value of last name 
	 */
	public function updateLastName() {
		if ($this->request->is('post')) { // only change if came params came from Post
			// App::import('Core', 'sanitize'); // Learn Later
			// $title = Sanitize::clean($this->data['User']['first_name']); // Learn Later

			$this->User->id = $_POST['id']; // prepare user model to change data for particular user
			if (!$this->User->exists()) {
				throw new NotFoundException('Invalid user');
			}

			$this->User->saveField('last_name', $_POST['last_name'], false); // save new last name
			$this->set('postlastname', $_POST['last_name']); // create variable for passing last name to view
		}
	}

	public function view($id = null) {
		$this->User->id = $id;

		if (!$this->User->exists()) {
			throw new NotFoundException('Invalid user');
		}

		if (!$id) {
			$this->Session->setFlash('Invalid user');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read());
	}

	public function add() {
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved');
				$this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash('The user could not be saved. Please, try again.');
			}
		}
	}

	public function edit($id = null) {
		$this->User->id = $id;

		if (!$this->User->exists()) {
			throw new NotFoundException('Invalid user');
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The user could not be saved. Please, try again.');
			}
		} else {
			$this->request->data = $this->User->read();
		}
	}

	public function delete($id = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if (!$id) {
			$this->Session->setFlash('Invalid id for user');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash('User deleted');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('User was not deleted');
		$this->redirect(array('action' => 'index'));
	}
}
?>