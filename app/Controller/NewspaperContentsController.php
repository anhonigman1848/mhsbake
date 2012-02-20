<?php
App::uses('AppController', 'Controller');
/**
 * NewspaperContents Controller
 *
 * @property NewspaperContent $NewspaperContent
 */
class NewspaperContentsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->NewspaperContent->recursive = 0;
		$this->set('newspaperContents', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->NewspaperContent->id = $id;
		if (!$this->NewspaperContent->exists()) {
			throw new NotFoundException(__('Invalid newspaper content'));
		}
		$this->set('newspaperContent', $this->NewspaperContent->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->NewspaperContent->create();
			if ($this->NewspaperContent->save($this->request->data)) {
				$this->Session->setFlash(__('The newspaper content has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newspaper content could not be saved. Please, try again.'));
			}
		}
		$newspapers = $this->NewspaperContent->Newspaper->find('list');
		$this->set(compact('newspapers'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->NewspaperContent->id = $id;
		if (!$this->NewspaperContent->exists()) {
			throw new NotFoundException(__('Invalid newspaper content'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->NewspaperContent->save($this->request->data)) {
				$this->Session->setFlash(__('The newspaper content has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newspaper content could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->NewspaperContent->read(null, $id);
		}
		$newspapers = $this->NewspaperContent->Newspaper->find('list');
		$this->set(compact('newspapers'));
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
		$this->NewspaperContent->id = $id;
		if (!$this->NewspaperContent->exists()) {
			throw new NotFoundException(__('Invalid newspaper content'));
		}
		if ($this->NewspaperContent->delete()) {
			$this->Session->setFlash(__('Newspaper content deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Newspaper content was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
