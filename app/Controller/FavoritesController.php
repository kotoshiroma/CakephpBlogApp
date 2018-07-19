<?php

App::uses('AppController', 'Controller');

class FavoritesController extends AppController {


  public $components = array('Paginator', 'RequestHandler');

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('index', 'add', 'delete');
  }

  public function index() {
    $this->Favorite->recursive = 2;

    // $this->loadModel('Post');

    $this->paginate = array(
       // 'findType' => 'existPosts'
       'conditions' => array(
          'Favorite.user_id' => $this->Auth->user('id')
        )
      ,'limit' => PAGINATE_LIMIT
    ); 

    // $favorite_posts= $this->paginate('Post', $options);
    $favorite_posts= $this->paginate();
    $this->set(compact('favorite_posts'));
    // debug($favorite_posts);
    // exit;
  }

  // ajaxメソッド
  public function add() {
    $this->autoRender = false;

    if (!$this->request->is('ajax')) {
      throw new MethodNotAllowedException();
    }

    $this->Favorite->create();
    if ($this->Favorite->save($this->request->data)) {
      $this->RequestHandler->respondAs('application/json; charset=UTF-8');
      return json_encode($this->request->data);

    } else {


    }
  }


  public function delete($id = null) {

    if (!$this->request->is(array('post', 'delete'))) {
      throw new MethodNotAllowedException();
    }

    $this->Favorite->id = $id;
    if (!$this->Favorite->exists()) {
      throw new NotFoundException(__('Invalid tag'));
    }

    if ($this->Favorite->delete()) {
      $this->Flash->success(__('The tag has been deleted.'));
    } else {
      $this->Flash->error(__('The tag could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }
}
