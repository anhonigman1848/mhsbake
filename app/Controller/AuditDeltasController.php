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
