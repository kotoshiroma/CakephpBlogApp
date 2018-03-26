<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container categories view">

	<h2 class="table_title"><?php echo h($category['Category']['category_name']); ?></h2>

	<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $category['Category']['id']), 
											array('class' => 'btn btn-primary btn_sm btn_delete')); ?>

	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id']), 
										  array('class' => 'btn btn-primary btn_sm btn_edit', 'style' => 'margin-right: 5px;')); ?>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<td>
					<?php echo h($category['Category']['id']); ?>
					&nbsp;
				</td>
			</tr>
<!-- 			<tr>
				<th><?php echo __('Category Name'); ?></th>
				<td>
					<?php echo h($category['Category']['category_name']); ?>
					&nbsp;
				</td>
			</tr> -->
			<tr>
				<th><?php echo __('Created'); ?></th>
				<td>
					<?php echo h($category['Category']['created']); ?>
					&nbsp;
				</td>
			<tr>
				<th><?php echo __('Modified'); ?></th>
				<td>
					<?php echo h($category['Category']['modified']); ?>
					&nbsp;
				</td>
			</tr>
		</table>
	</div>
</div>
