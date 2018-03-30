<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container users view">

	<h2 class="table_title"><?php echo h($user['User']['username']); ?></h2>

	<?php echo $this->Html->link( __('Delete'), array('action' => 'delete', $user['User']['id']), 
											array('class' => 'btn btn-primary btn_sm  btn_delete')); ?>

	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), 
										  array('class' => 'btn btn-primary btn_sm btn_edit', 'style' => 'margin-right: 5px;')); ?>

	<div class="table-responsive" style="clear: both;">
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<td>
					<?php echo h($user['User']['id']); ?>
					&nbsp;
				</td>
			</tr>
			<tr>
				<th><?php echo __('Group'); ?></th>
				<td>
					<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
					&nbsp;
				</td>
			</tr>
			<tr>
				<th><?php echo __('Post_Code'); ?></th>
				<td>
					<?php echo h($user['User']['post_code']); ?>
					&nbsp;
				</td>
			</tr>				<tr>
				<th><?php echo __('Address'); ?></th>
				<td>
					<?php echo h($user['User']['address1']).' '.h($user['User']['address2']); ?>
					&nbsp;
				</td>
			</tr>			
			<tr>
				<th><?php echo __('Created'); ?></th>
				<td>
					<?php echo h($user['User']['created']); ?>
					&nbsp;
				</td>
			</tr>
			<tr>
				<th><?php echo __('Modified'); ?></th>
				<td>
					<?php echo h($user['User']['modified']); ?>
					&nbsp;
				</td>
			</tr>
		</table>
	</div>

	<div class="related">
		<h3><?php echo __('Related Posts'); ?></h3>

		<?php if (!empty($user['Post'])): ?>
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th><?php echo __('Title'); ?></th>
					<th><?php echo __('Body'); ?></th>
					<th><?php echo __('Created'); ?></th>
					<th><?php echo __('Modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php foreach ($user['Post'] as $post): ?>
				<tr>
					<td class="td_title">
						<?php echo $this->Html->link($post['title'], array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
					</td>
					<td class="td_post_body"><?php echo $post['body']; ?></td>
					<td class="td_created"><?php echo $post['created']; ?></td>
					<td class="td_modified"><?php echo $post['modified']; ?></td>
					<td class="td_actions">
						<?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id'])
																,array('class' => 'btn btn-primary btn-xs')); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id'])
																	 , array('class' => 'btn btn-primary btn-xs')
																	 , array('confirm' => __('Are you sure you want to delete # %s?', $post['id']))); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<?php endif; ?>
	</div>
</div>

