<?php
// ACLアプリ

App::uses('AppController', 'Controller');

class PostsController extends AppController {

	public $components = array('Paginator', 'Search.Prg');
	// public $uses = array('Category', 'Tag');
	public $presetVars = true;
	// public $paginate = array ('limit' => 10);

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}

	public function index($category_id = null) {

		$this->autoLayout = true;

		$this->Post->recursive = 0;
		if (!$category_id) {
			$this->set('posts', $this->Paginator->paginate());
		} else {
			$this->set('posts', $this->Paginator->paginate('Post', array('Post.category_id' => $category_id)));
		}

		$this->set_categories_and_tags();
		// $this->set('categories', $this->Category->find('all'));
	}


	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		// var_dump($this->Post->find('first', $options));
		// exit;
		$this->set('post', $this->Post->find('first', $options));
	}


	public function add() {
		$this->set_categories_and_tags();

		if ($this->request->is('post')) {

			$this->request->data['Tag'] = $this->request->data['Tag']['tag_id'];
			$this->request->data['Post']['category_id'] = $this->request->data['Post']['category_id'][0];

			$this->Post->create();
			if ($this->Post->saveAll($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
	}


	public function edit($id = null) {

		// $this->set_categories_and_tags();

		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}

		if ($this->request->is(array('post', 'put'))) {

			$data['Tag'] = $this->request->data['Post']['tag_id'];
			$data['Tag'] = array_map('intval', $data['Tag']);
			unset($this->request->data['Post']['tag_id']);
			$data['Post'] = $this->request->data['Post'];
			$data['Post']['category_id'] = intval($data['Post']['category_id'][0]);

			// var_dump($data['Tag']);
			// exit;

			if ($this->Post->save($data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$this->set_categories_and_tags();

			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$data = $this->Post->find('first', $options);
			$this->request->data = $data;

			$tagVal = array();
			foreach ($data['Tag'] as $tag) {
				$tagVal[] = intval($tag['id']);
			}

			$this->set('tagVal', $tagVal);

		}
		// $users = $this->Post->User->find('list');
		// $this->set(compact('users'));
	}


	public function delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Flash->success(__('The post has been deleted.'));
		} else {
			$this->Flash->error(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function set_categories_and_tags() {

		$this->loadModel('Category');
		$this->loadModel('Tag');
		$this->set('categories', $this->Category->find('list',
													array ('fields' => array('Category.id', 'Category.category_name'))));
		$this->set('tags', $this->Tag->find('list',
													array ('fields' => array('Tag.id', 'Tag.tag_name'))));

		// var_dump($this->Tag->find('list', array ('fields' => array('Tag.id', 'Tag.tag_name'))));
		// exit;
	}

	public function format_data() {

	}
}
