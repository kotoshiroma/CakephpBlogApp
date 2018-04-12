<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>
<?php echo $this->Html->script('get_post_code'); ?>

<div class="container users form">
	<?php echo $this->Form->create('User', array('novalidate' => true)); ?>
		<fieldset>
			<legend><?php echo __('Edit User'); ?></legend>
			<?php
				echo $this->Form->input('id');
				echo $this->element('form_user');
			?>
		</fieldset>
	<?php echo $this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-primary btn_s')); ?>
</div>