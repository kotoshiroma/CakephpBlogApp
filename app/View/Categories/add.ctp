<!-- ACL / category add -->
<div class="container categories form">
	<?php echo $this->Form->create('Category', array('novalidate' => true)); ?>
		<fieldset>
			<legend><?php echo __('Add Category'); ?></legend>
			<?php 
				echo $this->Form->input('category_name');
			?>
		</fieldset>
	<?php echo $this->Form->end(array('label' => '送信', 'class' => 'btn btn-primary btn_sm')); ?>
</div>
