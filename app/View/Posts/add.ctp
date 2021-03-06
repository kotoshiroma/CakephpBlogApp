<!-- ACL / post add -->
<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>
<?php echo $this->Html->script('addForm', array('inline' => false)); ?>
<?php echo $this->Html->script('save_post_buttons_selector', array('inline' => false)); ?>

<div class="container-fluid centering">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
		<?php echo $this->Form->create('Post', array('type' => 'file', 'novalidate' => true)); ?>
			<fieldset>
				<legend><?php echo __('Add Post'); ?></legend>
				<?php
					echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $auth->user('id')));
					
					echo $this->Form->input('title', array(
                         'class' => 'input-form'
						,'label' => __('title')
						,'div' => array('class' => 'input-div')
						)
					);
					echo $this->Form->input('body', array(
                         'class' => 'input-form'
						,'label' => __('body')
						,'div' => array('class' => 'input-div')
						)
					);

					echo $this->element('form_add_img');

                    echo $this->Form->input('category_id', array(
                    	 'class' => 'input-select-category'
                        ,'multiple' => 'select'
                        ,'empty' => '未選択'
                        ,'label' => __('Categories')
                        ,'div' => array('class' => 'input-div')
                        )
                    );

					echo $this->Form->input('Tag.tag_id', array (
						 'class' => 'checkbox--inline'
						,'multiple' => 'checkbox'
						,'label' => array(__('Tags'), 'class' => 'checkbox-heading')
						,'div' => array('class' => 'input-div')
						)
					);
				?>
			</fieldset>

			<?php echo $this->element('save_post_buttons_selector'); ?>
		</div>
	</div>
</div>