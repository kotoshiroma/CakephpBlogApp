<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

	public $components = array('Paginator', 'RequestHandler');

	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('index', 'view', 'logout');
		// $this->Auth->allow('initDB');
		// $this->initDB();

	}

	// public function initDB() {
	// 	$group = $this->User->Group;
	// 	// Admin(idは4)には全て許可
	// 	$group->id = 4;
	// 	$this->Acl->allow($group, 'controllers');
	//
	// 	// manager(idは5)にはpostとwidgetsに対するアクセスを許可
	// 	$group->id = 5;
	// 	$this->Acl->deny($group, 'controllers');
	// 	$this->Acl->allow($group, 'controllers/Posts');
	// 	$this->Acl->allow($group, 'controllers/Widgets');
	//
	// 	// user(idは6)にはpostとwidgetsに対する追加と編集を許可
	// 	$group->id = 6;
	// 	$this->Acl->deny($group, 'controllers');
	// 	$this->Acl->allow($group, 'controllers/Posts/add');
	// 	$this->Acl->allow($group, 'controllers/Posts/edit');
	// 	$this->Acl->allow($group, 'controllers/Widgets/add');
	// 	$this->Acl->allow($group, 'controllers/Widgets/edit');
	//
	// 	echo "all done";
	// 	exit;
	// }

	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirect());
	        }
	        $this->Session->setFlash(__('Your username or password was incorrect.'));
	    }
	}

	public function logout() {
		$this->Session->setFlash('Good-Bye');
		$this->redirect($this->Auth->logout());
	}



	public function index() {
		$this->User->recursive = 0;
		$this->Paginator->settings = array('conditions' => array('User.delete_flag' => 0));
		$this->set('users', $this->Paginator->paginate());
	}


	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		// if ($this->User->delete()) {
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
        $data = $this->PostCode->find('first', array('conditions' =>
                                            array('post_code' => $this->request->data['post_code'])));

        $this->RequestHandler->respondAs('application/json; charset=UTF-8');
        return json_encode($data);
    }
}
