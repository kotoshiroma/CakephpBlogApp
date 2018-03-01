<?php
// ACL
App::uses('AppModel', 'Model');

class Post extends AppModel {

	public $name = 'Post';
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array (
		'title' => array ('type' => 'like')
	);

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasAndBelongsToMany = array (
		'Tag' => array (
			'className' => 'Tag',
			// 'order' => 'tag'
		 )
	 );

	 public $hasMany = array (
		 'Image' => array (
			 'className' => 'Image',
			 'foreignKey' => 'post_id',
			 'conditions' => array(
			  // 'Image.model' => 'Post',
			  'Image.active' => 1
			 )
		 )
	 );
}
