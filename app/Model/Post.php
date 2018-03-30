<?php
// ACL
App::uses('AppModel', 'Model');

class Post extends AppModel {

	public $virtualFields = array(

		'created_fmt' => 'DATE_FORMAT(Post.created,"%Y年%c月%e日")'
	   ,'modified_fmt' => 'DATE_FORMAT(Post.modified,"%Y年%c月%e日")'
	   ,'created_year' => 'SUBSTRING(Post.created, 1, 4)'
	   // ,'cnt_of_post' => 'COUNT(*)'
	);

	public $validate = array(

		'title' => array(
            'rule1' => array(
                'rule' => 'notBlank',
                'message' => '※入力必須項目です。'
            ),
            'rule2' => array(
                'rule' => array('maxLength',50),
                'message' => '※50文字以内で入力してください。'
            )
        ),
        'body' => array(
            'rule1' => array(
                'rule' => 'notBlank',
                'message' => '※入力必須項目です。'
            )
        ),
        'category_id' => array(
            'rule1' => array(
                'rule' => 'notBlank',
                'message' => '※入力必須項目です。'
            )
        )
	);


	public $actsAs = array('Search.Searchable');

	public $filterArgs = array (
		array('name' => 'keyword',
			  'type' => 'like',
		      'field' => 'Post.title',
			  'connectorAnd' => ' ',
			  'connectorOr' => ','
		),
		array('name' => 'category_id',
			  'type' => 'value',
		      'field' => 'Post.category_id'
		),
		array('name' => 'tag_id',
			  'type' => 'subquery',
			  'method' => 'findByTags',
			  'field' => 'Post.id'
		),
	);

	public function findByTags($data = array()) {
	    $this->PostTag->Behaviors->attach('Containable', array('autoFields' => false));
	    $this->PostTag->Behaviors->attach('Search.Searchable');
	    $query = $this->PostTag->getQuery('all',array(
	        'conditions' => array(
	            'tag_id' => $data['tag_id']
	        ),
	        'fields' => array('post_id'),
	        'contain' => array('Tag')
	    ));
	    return $query;
	}


	public $findMethods = array('existPosts' => true);

	protected function _findExistPosts($state, $query, $results = array()) {

		if ($state == 'before') {
			$query['conditions']['Post.delete_flag'] = 0;
			// $query['limit'] = 5;
			$query['order']['Post.id'] = 'desc';
			return $query;
		}
		return $results;
	}

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
			'joinTable' => 'post_tags',
			'foreignKey' => 'post_id',
			'associationForeignKey' => 'tag_id',
			'with' => 'PostTag',
			'unique' => true
		 )
	 );

	 public $hasMany = array (
		 'Image' => array (
			 'className' => 'Image',
			 'foreignKey' => 'post_id',
			 'conditions' => array(
			  'Image.delete_flag' => 0
			 )
		 )
	 );
}
