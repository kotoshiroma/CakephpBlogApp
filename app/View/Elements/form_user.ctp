<?php
	echo $this->Form->input('username',  array('label' => __('Username')
											  ,'placeholder' => '50文字以内で入力してください'
											  ));
	echo $this->Form->input('password',  array('label' => __('password')
											  ,'placeholder' => '6文字以上、14文字以内の半角英数字で入力してください'
											  ));
	echo $this->Form->input('password_conf', array('label' => __('password（Confirm）'), 'type' => 'password'
											  ,'placeholder' => '確認のためにパスワードをもう一度入力してください'
											  ));
    echo $this->Form->input('group_id', array('label' => __('Group')));

    echo $this->Form->input('post_code', array('label' => __('Post_Code')
    										 , 'class' => 'post_code'
    										 , 'maxlength' => 7
    										 , 'placeholder' => 'ハイフン(-)なし'
    										));
    echo $this->Form->input('address1', array('label' => __('Address1')
    										, 'class' => 'address1'
    										, 'placeholder' => '100文字以内で入力してください'
    									));
    echo $this->Form->input('address2', array('label' => __('Address2')
    										, 'class' => 'address2'
    										, 'placeholder' => '100文字以内で入力してください'
    									));
?>