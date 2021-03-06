<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $components = array('Paginator', 'RequestHandler');

	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('logout', 'add', 'get_post_code', 'view');
	}


	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
	        } else {
	        	$this->Session->setFlash(__('Your username or password was incorrect.'), 'default', array('class' => 'alert alert-danger'));
	        }
	    }
	}

	public function logout() {
		// $this->Session->setFlash(__('Good-Bye'), 'default', array('class' => 'alert alert-success'));
		$this->redirect($this->Auth->logout());
	}



	public function index() {
		$this->User->recursive = 0;
		$this->Paginator->settings = array('conditions' => array('User.delete_flag' => 0));
		$users = $this->Paginator->paginate();
		$this->set(compact('users'));
	}


	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$user = $this->User->find('first', $options);
		$this->set(compact('user'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('controller' => 'users', 'action' => 'login'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}


	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}


	public function delete($id = null) {

		if (!$this->request->is(array('post', 'delete'))) {
			throw new MethodNotAllowedException();
		}

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->User->save(array('delete_flag' => 1))) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function get_post_code() {
        $this->autoRender = false;

        if (!$this->request->is('ajax')) {
            return;
        }

        $this->loadModel('PostCode');
        $data = $this->PostCode->find('first', array(
        	'conditions' => array('post_code' => $this->request->data['post_code'])
        	)
    	);

        $this->RequestHandler->respondAs('application/json; charset=UTF-8');
        return json_encode($data);
    }
}
