<!-- ACL / post add -->
<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>
<?php echo $this->Html->script('addForm', array('inline' => false)); ?>

<div class="container-fluid posts form">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 posts form">
		<?php echo $this->Form->create('Post', array('type' => 'file', 'novalidate' => true)); ?>
			<fieldset>
				<legend><?php echo __('Add Post'); ?></legend>
				<?php
					echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $auth->user('id')));
					
					echo $this->Form->input('title', array('label' => __('title')));
					echo $this->Form->input('body', array('label' => __('body')));
				?>

				<?php echo $this->element('form_add_img'); ?>

				<?php
					echo $this->Form->input('category_id', array ('label' => __('Categories'),
																  'multiple' => 'select',
																  'empty' => '未選択'));
					echo $this->Form->input('Tag.tag_id', array ('label' => __('Tags'),
																 'multiple' => 'checkbox'));
				?>
			</fieldset>
		<?php echo $this->Form->end(array('label' => __('Submit'), 'class' => 'btn btn-primary btn_sm')); ?>
		</div>
	</div>
</div>