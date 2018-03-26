<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container tags view">

	<h2 class="table_title"><?php echo h($tag['Tag']['tag_name']); ?></h2>

	<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $tag['Tag']['id']), 
											array('class' => 'btn btn-primary btn_sm btn_delete')); ?>

	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tag['Tag']['id']), 
										  array('class' => 'btn btn-primary btn_sm btn_edit', 'style' => 'margin-right: 5px;')); ?>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<td>
					<?php echo h($tag['Tag']['id']); ?>
					&nbsp;
				</td>
			</tr>
<!-- 			<tr>
				<th><?php echo __('Tag Name'); ?></th>
				<td>
					<?php echo h($tag['Tag']['tag_name']); ?>
					&nbsp;
				</td>
			</tr> -->
		</table>
	</div>
</div>
