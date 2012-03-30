<?php
App::uses('AppController', 'Controller');
/**
 * Audits Controller
 *
 * @property Audit $Audit
 */
class AuditsController extends AppController {
/*
 * Include these helpers for the views
 */
public $helpers = array('Access');
	
public $paginate = array(
	'order' => array('Audit.created' => 'desc' ));


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Audit->recursive = 0;
		$this->set('audits', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Audit->id = $id;
		if (!$this->Audit->exists()) {
			throw new NotFoundException(__('Invalid audit'));
		}
		$this->set('audit', $this->Audit->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Audit->create();
			if ($this->Audit->save($this->request->data)) {
				$this->Session->setFlash(__('The audit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The audit could not be saved. Please, try again.'));
			}
		}
		$entities = $this->Audit->Entity->find('list');
		$sources = $this->Audit->Source->find('list');
		$this->set(compact('entities', 'sources'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Audit->id = $id;
		if (!$this->Audit->exists()) {
			throw new NotFoundException(__('Invalid audit'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Audit->save($this->request->data)) {
				$this->Session->setFlash(__('The audit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The audit could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Audit->read(null, $id);
		}
		$entities = $this->Audit->Entity->find('list');
		$sources = $this->Audit->Source->find('list');
		$this->set(compact('entities', 'sources'));
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
		$this->Audit->id = $id;
		if (!$this->Audit->exists()) {
			throw new NotFoundException(__('Invalid audit'));
		}
		if ($this->Audit->delete()) {
			$this->Session->setFlash(__('Audit deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Audit was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
