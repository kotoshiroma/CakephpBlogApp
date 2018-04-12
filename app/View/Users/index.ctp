<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container users index">

	<h2 class="table_title"><?php echo __('Users'); ?></h2>
	<!-- <?php echo $this->Html->link(__('Add User'), array('action' => 'add'), array('class' => 'btn btn-success btn_add')); ?> -->

	<div class="table-responsive" style="clear: both;">
		<table class="table table-striped table-hover" >
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort( __('username')); ?></th>
					<th><?php echo $this->Paginator->sort(__('group_id')); ?></th>
					<th><?php echo $this->Paginator->sort(__('created')); ?></th>
					<th><?php echo $this->Paginator->sort(__('modified')); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user): ?>
				<tr>
					<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
					<td><?php echo $this->Html->link($user['User']['username'], array('action' => 'view', $user['User']['id'])); ?></td>
					<td><?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?></td>
					<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])
															   , array('class' => 'btn btn-primary btn-xs')); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id'])
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