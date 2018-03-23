<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 * @property User $User
 */
class Group extends AppModel {

	public $validate = array(
        'name' => array(
            'rule1' => array(
                'rule' => 'notBlank',
                'message' => '※入力必須項目です。'
            ),
            'rule2' => array(
                'rule' => array('maxLength',100),
                'message' => '※100文字以内で入力してください。'
            )
        )
    );

	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'group_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public $actsAs = array('Acl' => array('type' => 'requester'));

    public function parentNode() {
        return null;
    }
}
