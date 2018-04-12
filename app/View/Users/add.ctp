<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>
<?php echo $this->Html->script('get_post_code'); ?>

<div class="container-fluid centering">
	<?php echo $this->Form->create('User', array('novalidate' => true)); ?>
		<fieldset>
			<legend><?php echo __('New User'); ?></legend>
			<?php
		        echo $this->element('form_user');
	    	?>
		</fieldset>
	<?php echo $this->Form->end(array('label' => __('New User'), 'class' => 'btn btn-primary btn_s')); ?>
</div>