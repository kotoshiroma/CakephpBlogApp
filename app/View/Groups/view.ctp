<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container groups view">

	<h2 class="table_title"><?php echo h($group['Group']['name']); ?></h2>

	<?php echo $this->Html->link( __('Delete'), array('action' => 'delete', $group['Group']['id']), 
											array('class' => 'btn btn-primary btn_sm btn_delete')); ?>

	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id']), 
										  array('class' => 'btn btn-primary btn_sm btn_edit', 'style' => 'margin-right: 5px;')); ?>


	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<td>
					<?php echo h($group['Group']['id']); ?>
					&nbsp;
				</td>
			</tr>
			<tr>
				<th><?php echo __('Created'); ?></th>
				<td>
					<?php echo h($group['Group']['created']); ?>
					&nbsp;
				</td>
			</tr>
			<tr>
				<th><?php echo __('Modified'); ?></th>
				<td>
					<?php echo h($group['Group']['modified']); ?>
					&nbsp;
				</td>
			</tr>
		</table>
	</div>

	<div class="related">
		<h2 class="table_title"><?php echo __('Related Users'); ?></h2>

		<?php if (!empty($group['User'])): ?>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<tr>
						<th><?php echo __('Id'); ?></th>
						<th><?php echo __('Username'); ?></th>
						<th><?php echo __('Group Id'); ?></th>
						<th><?php echo __('Created'); ?></th>
						<th><?php echo __('Modified'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>

					<?php foreach ($group['User'] as $user): ?>
					<tr>
						<td><?php echo $user['id']; ?></td>
						<td>
							<?php echo $this->Html->link($user['username'], array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
						</td>
						<td><?php echo $user['group_id']; ?></td>
						<td><?php echo $user['created']; ?></td>
						<td><?php echo $user['modified']; ?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])
																   , array('class' => 'btn btn-primary btn-xs')); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id'])
																		 , array('class' => 'btn btn-primary btn-xs')
																		 , array('confirm' => __('Are you sure you want to delete # %s?', $user['id']))); ?>
						</td>
					</tr>
					<?php endforeach; ?>

				</table>
			</div>
		<?php endif; ?>

	</div>
</div>


