<?php
App::uses('AppController', 'Controller');
/**
 * NewspaperReels Controller
 *
 * @property NewspaperReel $NewspaperReel
 */
class NewspaperReelsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->NewspaperReel->recursive = 0;
		$this->set('newspaperReels', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->NewspaperReel->id = $id;
		if (!$this->NewspaperReel->exists()) {
			throw new NotFoundException(__('Invalid newspaper reel'));
		}
		$this->set('newspaperReel', $this->NewspaperReel->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->NewspaperReel->create();
			if ($this->NewspaperReel->save($this->request->data)) {
				$this->Session->setFlash(__('The newspaper reel has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newspaper reel could not be saved. Please, try again.'));
			}
		}
		$newspaperContents = $this->NewspaperReel->NewspaperContent->find('list');
		$this->set(compact('newspaperContents'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->NewspaperReel->id = $id;
		if (!$this->NewspaperReel->exists()) {
			throw new NotFoundException(__('Invalid newspaper reel'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->NewspaperReel->save($this->request->data)) {
				$this->Session->setFlash(__('The newspaper reel has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newspaper reel could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->NewspaperReel->read(null, $id);
		}
		$newspaperContents = $this->NewspaperReel->NewspaperContent->find('list');
		$this->set(compact('newspaperContents'));
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
		$this->NewspaperReel->id = $id;
		if (!$this->NewspaperReel->exists()) {
			throw new NotFoundException(__('Invalid newspaper reel'));
		}
		if ($this->NewspaperReel->delete()) {
			$this->Session->setFlash(__('Newspaper reel deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Newspaper reel was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
