<!-- ACL / categories index -->
<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container categories index">
	<h2 class="table_title">Categories</h2>
	<?php echo $this->Html->link(__('Add Category'), array('action' => 'add'), array('class' => 'btn btn-success btn_add')); ?>

	<div class="table-responsive">
		<table class="table table-border table-striped table-hover">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('category_name'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($categories as $category): ?>
				<tr>
					<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
					<td><?php echo $this->Html->link($category['Category']['category_name'], array('action' => 'view', $category['Category']['id'])); ?></td>
					<td><?php echo h($category['Category']['created']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['modified']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])
															   , array('class' => 'btn btn-primary btn-xs')); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id'])
															   , array('class' => 'btn btn-primary btn-xs')
															   , array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']))); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	
	<?php echo $this->element('pagination') ?>
</div>
