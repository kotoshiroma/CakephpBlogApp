<!-- ACL / post edit -->
<?php echo $this->Html->script('jquery-3.3.1.min', array('inline' => false)); ?>
<?php echo $this->Html->script('addForm', array('inline' => false)); ?>

<div class="posts form">
<?php echo $this->Form->create('Post', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
	?>

	<button id="btnAddForm" type="button">画像追加</button>

	<div id="imageForms">
		<div class="dummyForm input_file" style="display:none;">
			<p class="labelFileName" style="display:none;"></p>
			<input type="file" name="data[Image][0][file_name]" id="Image0FileName">
			<button class="btnDelForm" type="button">画像キャンセル</button>
		</div>
	</div>

	<?php $baseUrl = $this->Html->url('/files/image/file_name/'); ?>

	<?php foreach ($post['Image'] as $image): ?>
		<?PHP echo $this->Html->image($baseUrl.$image['dir'].'/thumb_'.$image['file_name']); ?>
		<p><input type="checkbox" name="chkBox[]" value="<?php echo $image['id']?>" >this delete?</p>
	<?php endforeach; ?>

	<?php
		echo $this->Form->input('category_id', array ('label' => 'Categories',
														   'multiple' => 'select'));
		echo $this->Form->input('Tag.tag_id', array ('label' => 'Tags',
											     'multiple' => 'checkbox',
											     'selected' => $tagVal));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Post.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Post.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
