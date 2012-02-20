<?php
App::uses('AppController', 'Controller');
/**
 * ArchiveContents Controller
 *
 * @property ArchiveContent $ArchiveContent
 */
class ArchiveContentsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ArchiveContent->recursive = 0;
		$this->set('archiveContents', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ArchiveContent->id = $id;
		if (!$this->ArchiveContent->exists()) {
			throw new NotFoundException(__('Invalid archive content'));
		}
		$this->set('archiveContent', $this->ArchiveContent->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ArchiveContent->create();
			if ($this->ArchiveContent->save($this->request->data)) {
				$this->Session->setFlash(__('The archive content has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The archive content could not be saved. Please, try again.'));
			}
		}
		$archives = $this->ArchiveContent->Archive->find('list');
		$this->set(compact('archives'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ArchiveContent->id = $id;
		if (!$this->ArchiveContent->exists()) {
			throw new NotFoundException(__('Invalid archive content'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ArchiveContent->save($this->request->data)) {
				$this->Session->setFlash(__('The archive content has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The archive content could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ArchiveContent->read(null, $id);
		}
		$archives = $this->ArchiveContent->Archive->find('list');
		$this->set(compact('archives'));
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
		$this->ArchiveContent->id = $id;
		if (!$this->ArchiveContent->exists()) {
			throw new NotFoundException(__('Invalid archive content'));
		}
		if ($this->ArchiveContent->delete()) {
			$this->Session->setFlash(__('Archive content deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Archive content was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
