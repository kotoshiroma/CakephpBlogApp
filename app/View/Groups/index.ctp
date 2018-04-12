<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container-fluid centering groups index">
	
	<h2 class="table_title"><?php echo __('Groups') ?></h2>
	<?php echo $this->Html->link(__('Add Group'), array('action' => 'add'), array('class' => 'btn btn-success float_right')); ?>

	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($groups as $group): ?>
				<tr>
					<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
					<td><?php echo $this->Html->link($group['Group']['name'], array('action' => 'view', $group['Group']['id'])); ?>&nbsp;</td>
					<td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
					<td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id'])
															   , array('class' => 'btn btn-primary btn-xs')); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id'])
																	 , array('class' => 'btn btn-warning btn-xs')
																	 , '削除してよろしいですか？'
																	 ); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $this->element('pagination') ?>
</div>
