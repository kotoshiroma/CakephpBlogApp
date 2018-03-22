<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 * @property Group $Group
 * @property Post $Post
 */
class User extends AppModel {

	public $validate = array(
		'username' => array(
			'rule' => 'notBlank',
			'message' => '※入力必須項目です。'
		),
		'password' => array(
			'rule' => 'notBlank',
			'message' => '※入力必須項目です。'
		),
		'post_code' => array(
			'rule1' => array(
				'rule' => 'notBlank',
				'message' => '※入力必須項目です。'
			),
			'rule2' => array(
				'rule' => 'numeric',
				'message' => '※数字を入力してください。'
			),
			'rule3' => array(
				'rule' => array('between', 7, 7),
				'message' => '※7桁の数字を入力してください。'
			),

		),
		'address1' => array(
			'rule' => 'notBlank',
			'message' => '※入力必須項目です。'
		),
		'address2' => array(
			'rule' => 'notBlank',
			'message' => '※入力必須項目です。'
		),
	);

 	public $actsAs = array('Acl' => array('type' => 'requester',
										  'enabled' => false));

	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
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


	public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }

	public function bindNode($user) {
	    return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}

	public function beforeSave($options = array()) {
		$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		return true;
	}
}
