<!-- ACL / post add -->
<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container post_form posts form">
<?php echo $this->Form->create('Post', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Post'); ?></legend>

		<?php
		 echo $this->Form->input('title');
		 echo $this->Form->input('body');
		 echo $this->Form->input('Image.0.file_name', array('type' => 'file', 'default' => NULL));
		 // echo $this->Form->input('Image.0.model', array('type' => 'hidden', 'value' => 'Post'));

		 echo $this->Form->input('category_id', array ('label' => 'Categories',
															'multiple' => 'select'));
		 echo $this->Form->input('Tag.tag_id', array ('label' => 'Tags',
													   'multiple' => 'checkbox'));
		 ?>
	</fieldset>
<?php echo $this->Form->end(array('label' => '送信', 'class' => 'btn btn-primary btn_sm')); ?>
</div>