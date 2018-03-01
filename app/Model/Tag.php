<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 */
class Tag extends AppModel {
    public $name = 'Tag';
    public $hasandbelongstomany = array ('Post' => array (
                                        'classname' => 'Post',
                                        'jointable'  => 'posts_tags',
                                        'foreignkey' => 'tag_id',
                                        'associationforeignkey'=> 'post_id'
                                     )
                                );

}
