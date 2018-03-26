<!-- ACL / category add -->
<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container categories form">
	<?php echo $this->Form->create('Category', array('novalidate' => true)); ?>
		<fieldset>
			<legend><?php echo __('Add Category'); ?></legend>
			<?php 
				echo $this->Form->input('category_name');
			?>
		</fieldset>
	<?php echo $this->Form->end(array('label' => __('Submit'), 'class' => 'btn btn-primary btn_sm')); ?>
</div>
