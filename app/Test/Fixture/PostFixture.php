<?php

class PostFixture extends CakeTestFixture {

	//public $useDbConfig = 'test_default';
	public $useDbConfig = 'test';
	//public $import = ['model' => 'Post', 'records' => true];
	//public $import = 'Post';
	public $import = ['table' => 'posts'];

//	public $fields = [
//		'id' => [
//			'type' => 'integer', 
//			'key'  => 'primary'
//		],
//		'title' => [
//			'type' => 'string',
//	    'length' => 50
//		],
//		'body' => 'text',
//
//		'created'  => 'datetime',
//		'modified' => 'datetime',
//		'user_id' => [
//			'type' => 'integer',
//	    'length' => 11
//		],
//		'category_id' => [
//			'type' => 'integer',
//	    'length' => 11
//		],
//		'publish_flag' => [
//			'type' => 'integer',
//	    'length' => 1 
//		],
//		'delete_flag' => [
//			'type' => 'integer',
//	    'length' => 1
//		],
//	]
  public $records = [
		[
			'id'           => 1,
			'title'        => 'テストタイトル１',
			'body'         => 'テスト本文',
			'created'      => '',
			'modified'     => '',
			'user_id'      => 1,
			'category_id'  => 1,
			'publish_flag' => 1,
			'delete_flag'  => 0
		]
	];
	public function init() {
		$this->records[0]['created'] = date('Y-m-d');
		$this->records[0]['modified'] = date('Y-m-d');
		parent::init();
	}
}
