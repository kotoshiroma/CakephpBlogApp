<!-- ACL / post add -->
<div class="posts form">
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
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
