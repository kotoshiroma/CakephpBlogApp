<?php

App::uses('Model', 'AppModel');

class Comment extends AppModel {

    public $belongsTo = array(
        'Post' => array(
            'className' => 'Post'
           ,'foreignKey' => 'post_id'
        )
       ,'User' => array(
            'className' => 'User'
           ,'foreignKey' => 'user_id'
        )
    );
}