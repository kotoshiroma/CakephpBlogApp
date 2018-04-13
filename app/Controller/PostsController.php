<?php
// ACLアプリ

App::uses('AppController', 'Controller');

class PostsController extends AppController {

	public $components = array('Paginator', 'Search.Prg', 'RequestHandler');
	public $presetVars = true; // モデルでの $filterArgs設定の有効化


	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view', 'delete', 'mypage', 'mypage_index', 'get_post', 'add_comment');
	}

	public function index() {

		$this->Post->recursive = 1;

		// ここでgetとしてリダイレクトされ、フォームデータがクエリストリング形式になる
		$this->Prg->commonProcess();

		// カテゴリーが未指定の場合、リクエストデータから取り除く
		if (empty($this->request->query['category_id'][0])) {
			unset($this->request->query['category_id']);
		}

		// 検索条件の設定
		$this->paginate = array(
			'findType' => 'existPosts'
		   ,'conditions' => array($this->Post->parseCriteria($this->request->query), 'publish_flag' => 1)
		   ,'limit' => PAGINATE_LIMIT
		); 

		// 検索時は、カテゴリーのバリデーションを外す
		$this->loadModel('Category');
		unset($this->Category->validate['category_name']['notBlank']);

		if($this->Category->validates()){
			$posts = $this->paginate();
			$this->set(compact('posts'));
		}

		$this->set_categories_and_tags();
		$this->set_archives();
	}


	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}

		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$post = $this->Post->find('first', $options);
		$this->set(compact('post'));
		$this->set_categories_and_tags();
		$this->set_archives();
	}


	public function add() {
		$this->set_categories_and_tags();

		if ($this->request->is('post')) {

			// submitボタンが「公開する」だった場合は、公開フラグを立てる
			if (array_key_exists('submit_publish', $this->request->data)) {
				$this->request->data['Post']['publish_flag'] = 1;
			}

			$this->request->data['Tag'] = $this->request->data['Tag']['tag_id'];
			$this->request->data['Post']['category_id'] = $this->request->data['Post']['category_id'][0];

			// 画像配列が空の場合、リクエストデータから取り除く
			$this->rm_empty_imgArray();
			debug($this->request->data['Image']);

			$this->Post->create();
			if ($this->Post->saveAll($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect(array('action' => 'mypage_index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		}
	}


	public function edit($id = null) {

		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}

		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$post = $this->Post->find('first', $options);

		$tagVal = array();
		foreach ($post['Tag'] as $tag) {
			$tagVal[] = intval($tag['id']);
		}
		$this->set(compact('post', 'tagVal'));
		$this->set_categories_and_tags();


		// 編集データがフォームから送信されてきた場合
		if ($this->request->is(array('post', 'put'))) {

			// submitボタンが「公開する」だった場合は、公開フラグを立てる
			if (array_key_exists('submit_publish', $this->request->data)) {
				$this->request->data['Post']['publish_flag'] = 1;
			}
			// submitボタンが「下書き保存する」だった場合は、公開フラグを戻す
			else {
				$this->request->data['Post']['publish_flag'] = 0;
			}

			$this->request->data['Tag'] = $this->request->data['Tag']['tag_id'];
			$this->request->data['Post']['category_id'] = $this->request->data['Post']['category_id'][0];

			// 画像配列が空の場合、リクエストデータから取り除く
			$this->rm_empty_imgArray();

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
				$this->redirect(array('action' => 'mypage_index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		} else {
			// 編集画面へ遷移/表示の場合、既存データを、入力フォーム(タイトル、本文)へセットする
			$this->request->data = $post;
		}
	}

	// 削除処理（論理削除）
	public function delete() {

		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if (!array_key_exists('post_id', $this->request->data)) {
			$this->Flash->error(__('The post could not be deleted. Please, try again.'));
			return $this->redirect($this->referer());
		}

		$del_success_flg = true;
		foreach($this->request->data['post_id'] as $id) {

			$this->Post->id = $id;
			if (!$this->Post->exists()) {
				throw new NotFoundException(__('Invalid post'));
			}

			// 削除失敗した場合
			if (!$this->Post->save(array('delete_flag' => 1))) {
				$del_success_flg = false;
			} 
		}
		
		if ($del_success_flg) {
			$this->Flash->success('The post has been deleted.');
		} else {
			$this->Flash->error(__('The post could not be deleted. Please, try again.'));
		}

		return $this->redirect($this->referer());
	}


	public function mypage() {

		$posts = $this->Post->find('all',
			array(
				'conditions' => array(
					'Post.delete_flag' => 0
				   ,'user_id' => $this->Auth->user('id')
				)
			)
		);

		$posts_count = count($posts);
		$comments_count = 0;
		foreach ($posts as $post) {
			$comments_count += count($post['Comment']);
		}

		$this->set(compact('posts_count', 'comments_count'));
	}

	public function mypage_index() {

		// デフォルトは公開記事を表示
		$this->paginate = array(
			'findType' => 'existPosts'
		   ,'conditions' => array(
		   		'user_id' => $this->Auth->user('id')
			   ,'publish_flag' => 1
			)
		   ,'limit' => PAGINATE_LIMIT
		);

		$posts_publish = $this->paginate();
		$this->set(compact('posts_publish'));
	}


	public function add_comment() {
		
		$this->autoRender = false;

		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}

		$this->loadModel('Comment');
		if ($this->Comment->save($this->request->data)) {
			
			$this->Flash->success(__('The comment has been saved.'));
			$this->redirect($this->referer());
		} else {

			$this->Flash->error(__('The comment could not be saved. Please, try again.'));
		}
	}

/* ajaxメソッド --------------------------------------------------------------------------------- */

    public function get_post() {

        $this->autoRender = false;

        if (!$this->request->is('ajax')) {
            throw new MethodNotAllowedException();
        }

        $condition1 = array('user_id' => $this->Auth->user('id'));
        $condition2 = array();

        if ($this->request->data['kind_of_post'] == "publish_post") {
        	$condition2 = array('publish_flag' => 1);

        } elseif ($this->request->data['kind_of_post'] == "draft_post") {
        	$condition2 = array('publish_flag' => 0);

        } elseif ($this->request->data['kind_of_post'] == "all_post") {

        } else {

        }

        $conditions = array_merge($condition1, $condition2);

		$this->paginate = array('findType' => 'existPosts'
							   ,'conditions' => $conditions
							   ,'limit' => PAGINATE_LIMIT
							   );

        $this->RequestHandler->respondAs('application/json; charset=UTF-8');
        return json_encode($this->paginate());
    }

/* privateメソッド --------------------------------------------------------------------------------- */
	private function set_categories_and_tags() {

		$this->loadModel('Category');
		$this->loadModel('Tag');
		$this->loadModel('Image');

		$categories = $this->Category->find('list', array('fields' => array('Category.id', 'Category.category_name')));
		$tags = $this->Tag->find('list', array('fields' => array('Tag.id', 'Tag.tag_name')));

		$this->set(compact('categories', 'tags'));
	}

	private function set_archives() {

		$this->Post->virtualFields['cnt_of_post'] = 'COUNT(*)';
		$this->Post->recursive = -1;

		$created_years = $this->Post->find('all',array(
			'fields' => array('created_year', 'cnt_of_post')
		   ,'conditions' => array('delete_flag' => 0, 'publish_flag' => 1)
		   ,'group' => 'created_year'
		   ,'order' => 'created_year DESC'
			)
		);

		$this->set(compact('created_years'));
	}

	private function rm_empty_imgArray() {

		foreach($this->request->data['Image'] as $i => $image) {

			if ($image['file_name']['name'] === "") {
				unset($this->request->data['Image'][$i]);
			}
		}
	}
}
