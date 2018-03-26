<?php
	echo $this->Form->input('username',  array('label' => __('Username')));
	echo $this->Form->input('password',  array('label' => __('password')));
	echo $this->Form->input('password_conf', array('label' => __('password（Confirm）'), 'type' => 'password'));
    echo $this->Form->input('group_id', array('label' => __('Group')));

    echo $this->Form->input('post_code', array('label' => __('Post_Code'), 'class' => 'post_code', 'maxlength' => 7));
    echo $this->Form->input('address1', array('label' => __('Address1'), 'class' => 'address1'));
    echo $this->Form->input('address2', array('label' => __('Address2'), 'class' => 'address2'));
?>