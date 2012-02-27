<?php
App::uses('AppController', 'Controller');
/**
 * ArchiveReels Controller
 *
 * @property ArchiveReel $ArchiveReel
 */
class ArchiveReelsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ArchiveReel->recursive = 0;
		$this->set('archiveReels', $this->paginate());
	}

/**
 * expanded method
 *
 * @return void
 */
	public function expanded() {
		$this->ArchiveReel->recursive = 0;
		$this->set('archiveRecords', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ArchiveReel->id = $id;
		if (!$this->ArchiveReel->exists()) {
			throw new NotFoundException(__('Invalid archive reel'));
		}
		$this->set('archiveReel', $this->ArchiveReel->read(null, $id));
	}
	
/**
 * record method
 *
 * @param string $id
 * @return void
 */
	public function record($id = null) {
		$this->ArchiveReel->id = $id;
		if (!$this->ArchiveReel->exists()) {
			throw new NotFoundException(__('Invalid archive reel'));
		}
		$this->set('archiveRecord', $this->ArchiveReel->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ArchiveReel->create();
			if ($this->ArchiveReel->save($this->request->data)) {
				$this->Session->setFlash(__('The archive reel has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The archive reel could not be saved. Please, try again.'));
			}
		}
		$archiveContents = $this->ArchiveReel->ArchiveContent->find('list');
		$this->set(compact('archiveContents'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ArchiveReel->id = $id;
		if (!$this->ArchiveReel->exists()) {
			throw new NotFoundException(__('Invalid archive reel'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ArchiveReel->save($this->request->data)) {
				$this->Session->setFlash(__('The archive reel has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The archive reel could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ArchiveReel->read(null, $id);
		}
		$archiveContents = $this->ArchiveReel->ArchiveContent->find('list');
		$this->set(compact('archiveContents'));
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
		$this->ArchiveReel->id = $id;
		if (!$this->ArchiveReel->exists()) {
			throw new NotFoundException(__('Invalid archive reel'));
		}
		if ($this->ArchiveReel->delete()) {
			$this->Session->setFlash(__('Archive reel deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Archive reel was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
