<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-8 posts index">
			<?php
				if ($auth->user('id') !== null) {
					echo $this->Html->link(__('New Post'), array('action' => 'add'), array('class' => 'btn btn-success btn_add'));
				}
			?>
			<?php foreach ($posts as $post): ?>
				<div class="post">
			        <h3 class="post_title">
			        	<strong><?php echo $this->Html->link(h($post['Post']['title']), array('action' => 'view', $post['Post']['id'])); ?></strong>
			        </h3>
					<!-- <p class="post_date"><?php echo date('Y年n月j日',strtotime($post['Post']['created'])); ?>&nbsp;by <?php echo h($post['User']['username']) ?></p> -->
					<p class="post_date"><?php echo h($post['Post']['created_fmt']); ?>&nbsp;by <?php echo h($post['User']['username']) ?></p>

			        <div class="post_body"><?php echo h($post['Post']['body']); ?>&nbsp;</div>
			        <?php
			        	if ($auth->user('id') !== null) {
			        		if ($auth->user('group_id') === $ADMIN_ID or $auth->user('id') === $post['Post']['user_id']) {
					        	echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id']), 
					        											array('class' => 'btn btn-primary btn-xs', 'style' => 'margin-right: 5px;'));
					        	echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), 
					        								array('class' => 'btn btn-primary btn-xs'),
					                                        array('confirm' => __('Are you sure you want to delete # %s?', $post['Post']['id'])));
			        		}
			        	}
			        ?>
		    	</div>
			<?php endforeach; ?>

			<?php echo $this->element('pagination'); ?>
		</div>

		<div class="col-sm-4">
			<?php echo $this->element('sidebar', array()); ?>
		</div>
	</div>
</div>