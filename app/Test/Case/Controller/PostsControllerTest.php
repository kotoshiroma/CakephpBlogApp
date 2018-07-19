<?php

//App::import('vendor', 'vendor/autoload');
define("APPDIR", "/home/vagrant/cakephp_lessons/cakephp_ACL/app/");
require_once(APPDIR . 'Vendor/autoload.php');

use PHPUnit\Framework\TestCase;

class PostsControllerTest extends ControllerTestCase {
//class PostsControllerTest extends TestCase {
	public $fixtures = ['app.post'];

	public function testIndex() {
		$result = $this->testAction('/posts/index');
//		debug($result);
//		var_dump($result);
		//$this->assertTrue(true);
	}

	public function testAdd()	{
		$data = [
			'Post' => [
				'id'           => 2,
				'title'        => 'テストタイトル2',
				'body'         => 'テスト本文2',
				'created'      => '',
				'modified'     => '',
				'user_id'      => 2,
				'category_id'  => 2,
				'publish_flag' => 1,
				'delete_flag'  => 0
			]
		];

//		$result = $this->testAction(
//			'/posts/add',
//			['data' => $data, 'method' => 'post']
//		);

		//$this->assertTrue($result);
	}
	public function testEdit()	{

	}
	public function testDelete()	{

	}
}
