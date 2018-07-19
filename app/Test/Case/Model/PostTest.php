<?php

App::uses('Post', 'Model');

class PostTest extends CakeTestCase {
	public $fixtures = ['app.post'];

	public function setUp(){
		parent::setUp;
		$this->Post = ClassRegistry::init('Post');
	}

	public function test(){
		//$result = $this->Post->
	}
}
