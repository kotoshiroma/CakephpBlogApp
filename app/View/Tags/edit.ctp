<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container tags form">
	<?php echo $this->Form->create('Tag', array('novalidate' => true)); ?>
		<fieldset>
			<legend><?php echo __('Edit Tag'); ?></legend>
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('tag_name');
			?>
		</fieldset>
	<?php echo $this->Form->end(array('label' => '送信', 'class' => 'btn btn-primary btn_sm')); ?>
</div>
