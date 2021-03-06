<?php

App::uses('AppController', 'Controller');

class TagsController extends AppController {


	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view', 'add', 'edit', 'delete');
	}

	public function index() {
		$this->Tag->recursive = 0;
		$tags = $this->Paginator->paginate();
		$this->set(compact('tags'));
	}


	public function view($id = null) {
		if (!$this->Tag->exists($id)) {
			throw new NotFoundException(__('Invalid tag'));
		}
		$options = array('conditions' => array(
			'Tag.' . $this->Tag->primaryKey => $id
			)
		);
		$tag = $this->Tag->find('first', $options);
		$this->set(compact('tag'));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Tag->create();
			if ($this->Tag->save($this->request->data)) {
				$this->Flash->success(__('The tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The tag could not be saved. Please, try again.'));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}


	public function edit($id = null) {
		if (!$this->Tag->exists($id)) {
			throw new NotFoundException(__('Invalid tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tag->save($this->request->data)) {
				$this->Flash->success(__('The tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array(
				'Tag.' . $this->Tag->primaryKey => $id
				)
			);
			$this->request->data = $this->Tag->find('first', $options);
		}
	}


	public function delete($id = null) {

		if (!$this->request->is(array('post', 'delete'))) {
			throw new MethodNotAllowedException();
		}

		$this->Tag->id = $id;
		if (!$this->Tag->exists()) {
			throw new NotFoundException(__('Invalid tag'));
		}

		if ($this->Tag->delete()) {
			$this->Flash->success(__('The tag has been deleted.'));
		} else {
			$this->Flash->error(__('The tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
