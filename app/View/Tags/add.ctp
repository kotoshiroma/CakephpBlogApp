<!-- ACL / Tag add-->
<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container-fluid centering tags form">
	<?php echo $this->Form->create('Tag', array('novalidate' => true)); ?>
		<fieldset>
			<legend><?php echo __('Add Tag'); ?></legend>
			<?php
				echo $this->Form->input('tag_name');
			?>
		</fieldset>
	<?php echo $this->Form->end(array('label' => __('Save'), 'class' => 'btn btn-primary btn_s')); ?>
</div>