<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 */
class Tag extends AppModel {
    public $name = 'Tag';
    // public $actsAs = array('Search.Searchable');
    // public $filterArgs = array (
    //     'tag_id' => array ('type' => 'value')
    // );

    public $hasandbelongstomany = array ('Post' => array (
                                        'classname' => 'Post',
                                        'jointable'  => 'post_tags',
                                        'foreignkey' => 'tag_id',
                                        'associationforeignkey'=> 'post_id',
                                        'with' => 'PostsTag',
                                        'unique' => true
                                     )
                                );


    // public $hasMany = array ('PostTag' => array (
    //                                     'classname' => 'PostTag',
    //                                     // 'jointable'  => 'posts_tags',
    //                                     'foreignkey' => 'id',
    //                                     // 'associationforeignkey'=> 'post_id'
    //                                  )
    //                             );


}
