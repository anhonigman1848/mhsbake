<?php
App::uses('AppController', 'Controller');
/**
 * Newspapers Controller
 *
 * @property Newspaper $Newspaper
 */
class NewspapersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Newspaper->recursive = 0;
		$this->set('newspapers', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Newspaper->id = $id;
		if (!$this->Newspaper->exists()) {
			throw new NotFoundException(__('Invalid newspaper'));
		}
		$this->set('newspaper', $this->Newspaper->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Newspaper->create();
			if ($this->Newspaper->save($this->request->data)) {
				$this->Session->setFlash(__('The newspaper has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newspaper could not be saved. Please, try again.'));
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
		$this->Newspaper->id = $id;
		if (!$this->Newspaper->exists()) {
			throw new NotFoundException(__('Invalid newspaper'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Newspaper->save($this->request->data)) {
				$this->Session->setFlash(__('The newspaper has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newspaper could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Newspaper->read(null, $id);
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
		$this->Newspaper->id = $id;
		if (!$this->Newspaper->exists()) {
			throw new NotFoundException(__('Invalid newspaper'));
		}
		if ($this->Newspaper->delete()) {
			$this->Session->setFlash(__('Newspaper deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Newspaper was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
