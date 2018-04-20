<?php
// ACL

App::uses('AppController', 'Controller');

class CategoriesController extends AppController {


	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view', 'add', 'edit', 'delete');
	}

	public function index() {
		$this->Category->recursive = 0;
		$categories = $this->Paginator->paginate();
		$this->set(compact('categories'));
	}

	public function view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array(
			'Category.' . $this->Category->primaryKey => $id
			)
		);
		$category = $this->Category->find('first', $options);
		$this->set(compact('category'));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
				return $this->redirect(array('action' => 'index'));
			}
		}
	}


	public function edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array(
				'Category.' . $this->Category->primaryKey => $id
				)
			);
			$this->request->data = $this->Category->find('first', $options);
		}
	}


	public function delete($id = null) {

		if (!$this->request->is(array('post', 'delete'))) {
			throw new MethodNotAllowedException();
		}

		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}

		if ($this->Category->delete()) {
			$this->Flash->success(__('The category has been deleted.'));
		} else {
			$this->Flash->error(__('The category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
