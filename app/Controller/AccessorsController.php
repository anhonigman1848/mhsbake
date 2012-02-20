<?php
App::uses('AppController', 'Controller');
/**
 * Accessors Controller
 *
 * @property Accessor $Accessor
 */
class AccessorsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Accessor->recursive = 0;
		$this->set('accessors', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Accessor->id = $id;
		if (!$this->Accessor->exists()) {
			throw new NotFoundException(__('Invalid accessor'));
		}
		$this->set('accessor', $this->Accessor->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Accessor->create();
			if ($this->Accessor->save($this->request->data)) {
				$this->Session->setFlash(__('The accessor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accessor could not be saved. Please, try again.'));
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
		$this->Accessor->id = $id;
		if (!$this->Accessor->exists()) {
			throw new NotFoundException(__('Invalid accessor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Accessor->save($this->request->data)) {
				$this->Session->setFlash(__('The accessor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accessor could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Accessor->read(null, $id);
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
		$this->Accessor->id = $id;
		if (!$this->Accessor->exists()) {
			throw new NotFoundException(__('Invalid accessor'));
		}
		if ($this->Accessor->delete()) {
			$this->Session->setFlash(__('Accessor deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Accessor was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
