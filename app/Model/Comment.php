<?php

App::uses('Model', 'AppModel');

class Comment extends AppModel {

    public $virtualFields = array(

        'created_fmt' => 'DATE_FORMAT(Comment.created,"%Y年%c月%e日 %T")'
    );

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