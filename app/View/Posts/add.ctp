<!-- ACL / post add -->
<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>
<?php echo $this->Html->script('addForm', array('inline' => false)); ?>

<div class="container-fluid post_form posts form">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2 posts form">
		<?php echo $this->Form->create('Post', array('type' => 'file', 'novalidate' => true)); ?>
			<fieldset>
				<legend><?php echo __('Add Post'); ?></legend>
				<?php
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

				<?php
					echo $this->Form->input('category_id', array ('label' => 'Categories',
																		'multiple' => 'select'));
					echo $this->Form->input('Tag.tag_id', array ('label' => 'Tags',
																   'multiple' => 'checkbox'));
				?>
			</fieldset>
		<?php echo $this->Form->end(array('label' => '送信', 'class' => 'btn btn-primary btn_sm')); ?>
		</div>
	</div>
</div>