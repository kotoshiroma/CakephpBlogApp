<?php
// ACLアプリ

App::uses('AppController', 'Controller');

class PostsController extends AppController {

	public $components = array('Paginator', 'Search.Prg');
	public $presetVars = true; // モデルでの $filterArgs設定の有効化


	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');

	}

	public function index($category_id = null) {

		$this->Post->recursive = 0;
		$this->Prg->commonProcess(); // ここでgetとしてリダイレクトされる(データがクエリストリング形式になる)

		// $this->paginate = array('conditions' => $this->Post->parseCriteria($this->passedArgs),
		// 						'order' => array('Post.id' => 'desc'));
	
		$this->paginate = array('conditions' => array($this->Post->parseCriteria($this->passedArgs), 'Post.delete_flag' => 0),
								'order' => array('Post.id' => 'desc'));

	 	$this->set('posts', $this->paginate());
		$this->set_categories_and_tags();
	}


	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
		$this->set_categories_and_tags();
	}


	public function add() {
		$this->set_categories_and_tags();

		if ($this->request->is('post')) {

			$this->request->data['Tag'] = $this->request->data['Tag']['tag_id'];
			$this->request->data['Post']['category_id'] = $this->request->data['Post']['category_id'][0];

            if ($this->request->data['Image'][0]['file_name']['name'] === "") {
				unset($this->request->data['Image']);
			}

			$this->Post->create();
			if ($this->Post->saveAll($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		}
	}


	public function edit($id = null) {

		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}

		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Tag'] = $this->request->data['Tag']['tag_id'];
			$this->request->data['Post']['category_id'] = $this->request->data['Post']['category_id'][0];

			// 画像配列が空の場合、リクエストデータから取り除く
			$count = count($this->request->data['Image']);
			for ($i = 0; $i < $count; $i++) {
				if ($this->request->data['Image'][$i]['file_name']['name'] === "") {
					unset($this->request->data['Image'][$i]);
				}
			}

			// 画像の論理削除
			if (isset($this->request->data['chkBox'])) {
				$this->loadModel('Image');
				foreach ($this->request->data['chkBox'] as $id) {
					$this->Image->save(array('id' => $id, 'delete_flag' => '1'));
				}
			}

			// 更新処理
			if ($this->Post->saveAll($this->request->data)) {

				// タグ選択無しの場合、中間テーブル(post_tags)のレコードを削除する
				if ($this->request->data['Tag'] === "") {

					// MySql上では複合主キーだが、CakePHPでは主キー無し扱いになっている
					// $this->PostTag->primaryKey = 'post_id';  コントローラではなくモデルにて主キーを設定する
					$this->loadModel('PostTag');
					$id = $this->request->data['Post']['id'];
					$this->PostTag->deleteAll(array('post_id' => $id));
				}

				$this->Flash->success(__('The post has been saved.'));
				// return $this->redirect(array('action' => 'index'));
				$this->redirect($this->referer());
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
			$this->set('post', $data);
		}
	}

	// 論理削除
	public function delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');

		if ($this->Post->save(array('delete_flag' => 1))) {
			$this->Flash->success(__('The post has been deleted.'));
		} else {
			$this->Flash->error(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	private function set_categories_and_tags() {

		$this->loadModel('Category');
		$this->loadModel('Tag');
		$this->loadModel('Image');
		$this->set('categories', $this->Category->find('list',
													array ('fields' => array('Category.id', 'Category.category_name'))));
		$this->set('tags', $this->Tag->find('list',
											array ('fields' => array('Tag.id', 'Tag.tag_name'))));

	}
}
