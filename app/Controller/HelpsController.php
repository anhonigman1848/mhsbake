<?php
class HelpsController extends AppController {

	/*
	 * Include these helpers for the views
	 */
	public $helpers = array('Access');

	/*
	 *	Include these components:
	 *	The Request handler catches and coordinates ajax requests
	 */
	public $components = array('RequestHandler');

	public $name = 'Helps';

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
	    $this->Auth->allow(array('view'));
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
			if (in_array($this->action, array('view'))) {
				return true; // action request authorized
			}
			return false; // action request not authorized
		}

		// Basic permissions [see also the beforeFilter()]
		if ($user['role'] == 'basic') {
			if (in_array($this->action, array('view'))) {
				return true; // action request authorized
			}
			return false; // action request not authorized
		}

		return false; // action request not authorized - unknown user 
	}

	

	public function view($id = null) {
		
	}

}
?>