<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>
<?php echo $this->Html->script('get_post_code'); ?>

<div class="container users form">
	<?php echo $this->Form->create('User', array('novalidate' => true)); ?>
		<fieldset>
			<legend><?php echo __('Add User'); ?></legend>
			<?php
				echo $this->Form->input('username');
				echo $this->Form->input('password');

		        echo $this->Form->input('post_code', array('label' => '郵便番号', 'class' => 'post_code', 'maxlength' => 7));
		        echo $this->Form->input('address1', array('label' => '都道府県', 'class' => 'address1'));
		        echo $this->Form->input('address2', array('label' => '市町区村', 'class' => 'address2'));

		        echo $this->Form->input('group_id');
	    	?>
		</fieldset>
	<?php echo $this->Form->end(array('label' => '送信', 'class' => 'btn btn-primary btn_sm')); ?>
</div>