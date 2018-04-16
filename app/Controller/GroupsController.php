<?php
App::uses('AppController', 'Controller');

class GroupsController extends AppController {

	public $components = array('Paginator');

	public function beforeFilter() {
	    parent::beforeFilter();
	}


	public function index() {
		$this->Group->recursive = 0;

		$groups = $this->Paginator->paginate();
		$this->set(compact('groups'));
	}


	public function view($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$options = array('conditions' => array(
			'Group.' . $this->Group->primaryKey => $id
			)
		);
		$group = $this->Group->find('first', $options);
		$this->set(compact('group'));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Flash->success(__('The group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The group could not be saved. Please, try again.'));
			}
		}
	}


	public function edit($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Group->save($this->request->data)) {
				$this->Flash->success(__('The group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array(
				'Group.' . $this->Group->primaryKey => $id
				)
			);
			$this->request->data = $this->Group->find('first', $options);
		}
	}


	public function delete($id = null) {

		if (!$this->request->is(array('post', 'delete'))) {
			throw new MethodNotAllowedException();
		}

		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}

		if ($this->Group->delete()) {
			$this->Flash->success(__('The group has been deleted.'));
		} else {
			$this->Flash->error(__('The group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
