<!-- ACL / post edit -->
<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>
<?php echo $this->Html->script('addForm', array('inline' => false)); ?>
<?php echo $this->Html->script('save_post_buttons_selector', array('inline' => false)); ?>

<div class="container-fluid centering">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 posts form">
		<?php echo $this->Form->create('Post', array('type' => 'file', 'novalidate' => true)); ?>
			<fieldset>
				<legend><?php echo __('Edit Post'); ?></legend>
				<?php
					echo $this->Form->input('id');

					echo $this->Form->input('title', array(
						 'label' => __('title')
						,'div' => array('class' => 'input-div')
						)
					);
					echo $this->Form->input('body', array(
						'label' => __('body')
						,'div' => array('class' => 'input-div')
						)
					);
				?>

				<?php echo $this->element('form_add_img'); ?>


				<div class="images floatContainer">
					<?php $baseUrl = $this->Html->url('/files/image/file_name/'); ?>

					<?php foreach ($post['Image'] as $image): ?>
						<div style="float: left; margin-right: 10px;">
					        <?PHP echo $this->Html->image($baseUrl.$image['dir'].'/thumb_'.$image['file_name']); ?>
		 					<div class="checkbox">
					            <input type="checkbox" name="chkBox[]" value="<?php echo $image['id']?>" id="<?php echo $image['id']?>">
					            <label for="<?php echo $image['id']?>"><?php echo __('Delete'); ?></label>
					        </div>
				    	</div>
					<?php endforeach; ?>
					
				</div>

				<?php
                    echo $this->Form->input('category_id', array(
                    	 'class' => 'input-select-category'
                        ,'multiple' => 'select'
                        ,'empty' => '未選択'
                        ,'label' => __('Categories')
                        ,'div' => array('class' => 'input-div')
                        )
                    );

					echo $this->Form->input('Tag.tag_id', array (
						 'class' => 'checkbox checkbox_tag_edit'
						,'multiple' => 'checkbox'
						,'selected' => $tagVal
						,'label' => array(__('Tags'), 'id' => 'tagG_label')
						,'div' => array('class' => 'input-div floatContainer')
						)
					);
				?>
			</fieldset>

			<?php echo $this->element('save_post_buttons_selector'); ?>
		</div>

	</div>
</div>
