<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container groups form">
	<?php echo $this->Form->create('Group', array('novalidate' => true)); ?>
		<fieldset>
			<legend><?php echo __('Edit Group'); ?></legend>
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('name');
			?>
		</fieldset>
	<?php echo $this->Form->end(array('label' => __('Submit'), 'class' => 'btn btn-primary btn_sm')); ?>
</div>
