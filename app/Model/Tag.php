<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 */
class Tag extends AppModel {

    public $validate = array(
        'tag_name' => array(
            'rule1' => array(
                'rule' => 'notBlank',
                'message' => '※入力必須項目です。'
            ),
            'rule2' => array(
                'rule' => array('maxLength',50),
                'message' => '※50文字以内で入力してください。'
            )
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
