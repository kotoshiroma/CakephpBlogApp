<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

App::import('Model', 'PostCode');


class User extends AppModel {

	public $validate = array(
        'username' => array(
            'rule1' => array(
                'rule' => 'notBlank',
                'message' => '※入力必須項目です。'
            ),
            'rule2' => array(
                'rule' => array('maxLength',50),
                'message' => '※50文字以内で入力してください。'
            )
        ),
		'password' => array(
			'rule1' => array(
				'rule' => 'notBlank',
				'message' => '※入力必須項目です。'
			),
			'rule2' => array(
				'rule' => 'alphaNumeric',
				'message' => '※半角英数字で入力してください。'
			),
			'rule3' => array(
				'rule' => array('between', 6, 14),
				'message' => '※6文字以上、14文字以内で入力してください。'
			)
		),
		'password_conf' => array(
			'rule1' => array(
				'rule' => 'notBlank',
				'message' => '※確認のためにパスワードをもう一度入力してください。'
			),
			'rule2' => array(
				'rule' => 'checkPassword',
				'message' => '※一度目に入力したパスワードと異なります。'
			)
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
			'rule4' => array(
				'rule' => 'checkPostCode',
				'message' => '※入力した郵便番号は存在しません。'
			)
		),
        'address1' => array(
            'rule1' => array(
                'rule' => 'notBlank',
                'message' => '※入力必須項目です。'
            ),
            'rule2' => array(
                'rule' => array('maxLength',100),
                'message' => '※100文字以内で入力してください。'
            )
        ),
        'address2' => array(
            'rule1' => array(
                'rule' => 'notBlank',
                'message' => '※入力必須項目です。'
            ),
            'rule2' => array(
                'rule' => array('maxLength',100),
                'message' => '※100文字以内で入力してください。'
            )
        ),
	);

	public function checkPassword($check) {

		if ($this->data['User']['password'] === $this->data['User']['password_conf']) {
			return true;
		} else {
			return false;
		}
	}

	public function checkPostCode($check) {

		$postCode = new PostCode();
		$data_count = $postCode->find('count', array('conditions' => array('post_code' => $check['post_code'])));
		if ($data_count >= 1) {
			return true;
		} else {
			return false;
		}
	}


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
       ,'Comment' => array (
            'className' => 'Comment',
            'foreignKey' => 'user_id',
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
