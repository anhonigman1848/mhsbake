<?php
App::uses('AppController', 'Controller');
/**
 * AuditDeltas Controller
 *
 * @property AuditDelta $AuditDelta
 */
class AuditDeltasController extends AppController {
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
	 *	@postcondition - authorization pass/fails if returns true/false
	 */
	public function isAuthorized($user) {

		// Admin permissions [see also the beforeFilter()]
		if ($user['role'] == 'admin') {
			return true; // every action request authorized
		}

		// Staff permissions [see also the beforeFilter()]
		if ($user['role'] == 'staff') {
			if (in_array($this->action, array())) {
				return true; // action request authorized
			}
			return false; // action request not authorized
		}

		// Basic permissions [see also the beforeFilter()]
		if ($user['role'] == 'basic') {
			if (in_array($this->action, array())) {
				return true; // action request authorized
			}
			return false; // action request not authorized
		}

		return false; // action request not authorized - unknown user 
	}

	public $paginate = array(
		'order' => array('Audit.created' => 'desc' ));			

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AuditDelta->recursive = 0;
		$this->set('auditDeltas', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->AuditDelta->id = $id;
		if (!$this->AuditDelta->exists()) {
			throw new NotFoundException(__('Invalid audit delta'));
		}
		$this->set('auditDelta', $this->AuditDelta->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AuditDelta->create();
			if ($this->AuditDelta->save($this->request->data)) {
				$this->Session->setFlash(__('The audit delta has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The audit delta could not be saved. Please, try again.'));
			}
		}
		$audits = $this->AuditDelta->Audit->find('list');
		$this->set(compact('audits'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->AuditDelta->id = $id;
		if (!$this->AuditDelta->exists()) {
			throw new NotFoundException(__('Invalid audit delta'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AuditDelta->save($this->request->data)) {
				$this->Session->setFlash(__('The audit delta has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The audit delta could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->AuditDelta->read(null, $id);
		}
		$audits = $this->AuditDelta->Audit->find('list');
		$this->set(compact('audits'));
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
		$this->AuditDelta->id = $id;
		if (!$this->AuditDelta->exists()) {
			throw new NotFoundException(__('Invalid audit delta'));
		}
		if ($this->AuditDelta->delete()) {
			$this->Session->setFlash(__('Audit delta deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Audit delta was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
