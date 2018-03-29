<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 */
class Category extends AppModel {

	public $validate = array(
        'category_name' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => '※入力必須項目です。'
            ),
            'maxLength' => array(
                'rule' => array('maxLength',50),
                'message' => '※50文字以内で入力してください。'
            )
        )
    );
}
