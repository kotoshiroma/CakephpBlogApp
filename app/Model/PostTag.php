<?php
App::uses('AppModel', 'Model');

class PostTag extends AppModel {
    public $name = 'PostTag';
    public $primaryKey = 'post_id';

    public $belongsTo = array(
        'Tag' => array(
            'className' => 'Tag',
            'foreignKey' => 'tag_id',
        ),
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'post_id',
        )
    );
}
