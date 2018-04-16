<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container-fluid centering">

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
</div>

