<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 */
class Tag extends AppModel {

    public $validate = array(
        'tag_name' => array(
            'rule' => 'notBlank',
            'message' => '※入力必須項目です。'
        )
    );

    public $hasandbelongstomany = array ('Post' => array (
                                        'classname' => 'Post',
                                        'jointable'  => 'post_tags',
                                        'foreignkey' => 'tag_id',
                                        'associationforeignkey'=> 'post_id',
                                        'with' => 'PostsTag',
                                        'unique' => true
                                     )
                                );


}
