<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container-fluid centering">
	<?php echo $this->Form->create('Group', array('novalidate' => true)); ?>
		<fieldset>
			<legend><?php echo __('Add Group'); ?></legend>
			<?php
				echo $this->Form->input('name');
			?>
		</fieldset>
	<?php echo $this->Form->end(array('label' =>  __('Save'), 'class' => 'btn btn-primary btn_s')); ?>
</div>