<!-- ACL / Tag index-->
<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container tags index">
	<h2 class="table_title">Tags</h2>
	<?php echo $this->Html->link(__('Add Tag'), array('action' => 'add'), array('class' => 'btn btn-success btn_add')); ?>

	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('tag_name'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tags as $tag): ?>
				<tr>
					<td><?php echo h($tag['Tag']['id']); ?>&nbsp;</td>
					<td><?php echo $this->Html->link($tag['Tag']['tag_name'], array('action' => 'view', $tag['Tag']['id'])); ?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tag['Tag']['id'])
															   , array('class' => 'btn btn-primary btn-xs')); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tag['Tag']['id'])
																	 , array('class' => 'btn btn-primary btn-xs')
																	 , array('confirm' => __('Are you sure you want to delete # %s?', $tag['Tag']['id']))); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $this->element('pagination') ?>
</div>
