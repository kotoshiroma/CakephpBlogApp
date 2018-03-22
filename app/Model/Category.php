<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 */
class Category extends AppModel {

	public $validate = array(
		'category_name' => array(
			'rule' => 'notBlank',
			'message' => '※入力必須項目です。'
		)
	);
}
