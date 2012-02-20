<?php
App::uses('AppController', 'Controller');
/**
 * Archives Controller
 *
 * @property Archive $Archive
 */
class ArchivesController extends AppController {


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
				$this->redirect(array('action' => 'index'));
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
}
