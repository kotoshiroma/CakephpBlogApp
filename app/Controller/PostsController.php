<?php
// ACLアプリ

App::uses('AppController', 'Controller');

class PostsController extends AppController {

	public $components = array('Paginator', 'Search.Prg');
	public $presetVars = true; // モデルでの $filterArgs設定の有効化


	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');

		// $this->set_categories_and_tags();
		// $this->set_archives();

		$this->Post->virtualFields['created_fmt'] = "DATE_FORMAT(Post.created,'%Y年%c月%e日')";
		$this->Post->virtualFields['modified_fmt'] = "DATE_FORMAT(Post.modified,'%Y年%c月%e日')";
	}

	public function index() {

		$this->Post->recursive = 0;
		$this->Prg->commonProcess(); // ここでgetとしてリダイレクトされ、データがクエリストリング形式になる

		// カテゴリーが未指定の場合、リクエストデータから取り除く
		if (empty($this->request->query['category_id'][0])) {
			unset($this->request->query['category_id']);
		}


		// 検索条件の設定（記事の年指定がある場合はconditionsに追加する）
		if (empty($this->request->query['year'])) {
			$this->paginate = array('conditions' => array($this->Post->parseCriteria($this->request->query)
														  ,'Post.delete_flag' => 0), //モデルにget_condition()などを書く。（配列を返すメソッド）
									'limit' => PAGINATE_LIMIT,
									'order' => array('Post.id' => 'desc'));

		} else {
			$this->Post->virtualFields['created_year'] = 'SUBSTRING(Post.created, 1, 4)';
			$this->paginate = array('conditions' => array($this->Post->parseCriteria($this->request->query)
														  ,'Post.delete_flag' => 0
														  ,'Post.created_year' => $this->request->query['year']),
									'limit' => PAGINATE_LIMIT,
									'order' => array('Post.id' => 'desc'));
		}


		$this->loadModel('Category');
		unset($this->Category->validate['category_name']['notBlank']);
		if($this->Category->validates()){
			$this->set('posts', $this->paginate());
		}
	 	
		$this->set_categories_and_tags();
		$this->set_archives();
	}


	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
		$this->set_categories_and_tags();
		$this->set_archives();
	}


	public function add() {
		$this->set_categories_and_tags();

		if ($this->request->is('post')) {

			$this->request->data['Tag'] = $this->request->data['Tag']['tag_id'];
			$this->request->data['Post']['category_id'] = $this->request->data['Post']['category_id'][0];

			// 画像配列が空の場合、リクエストデータから取り除く
			$count = count($this->request->data['Image']);
			for ($i = 0; $i < $count; $i++) {
				if ($this->request->data['Image'][$i]['file_name']['name'] === "") {
					unset($this->request->data['Image'][$i]);
				}
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

			// 更新成功
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
				$this->redirect($this->referer());
			// 更新失敗
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));

				$this->set_categories_and_tags();

				$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
				$data = $this->Post->find('first', $options);
				$this->set('post', $data);

				$tagVal = array();
				foreach ($data['Tag'] as $tag) {
					$tagVal[] = intval($tag['id']);
				}
				$this->set('tagVal', $tagVal);
			}
		} else {
			$this->set_categories_and_tags();

			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$data = $this->Post->find('first', $options);
			$this->request->data = $data;
			$this->set('post', $data);

			$tagVal = array();
			foreach ($data['Tag'] as $tag) {
				$tagVal[] = intval($tag['id']);
			}
			$this->set('tagVal', $tagVal);
			
		}
	}

	// 削除処理（論理削除）
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

	// モデルにこれを書く
	private function set_archives() {

		$this->Post->virtualFields['created_year'] = 'SUBSTRING(Post.created, 1, 4)';
		$this->Post->virtualFields['cnt_of_post'] = 'COUNT(*)';
		$this->Post->recursive = -1;
		$data = $this->Post->find('all',array(
												'fields' => array('created_year', 'cnt_of_post')
											   ,'conditions' => array('delete_flag' => 0)
											   ,'group' => 'created_year'
											   ,'order' => 'created_year DESC'
									  ));

		$this->set('created_years', $data);
	}
}
