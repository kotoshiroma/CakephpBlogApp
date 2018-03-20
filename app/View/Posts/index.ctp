<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-8 posts index">
			<?php echo $this->Html->link(__('New Post'), array('action' => 'add'), array('class' => 'btn btn-success')); ?>

			<?php foreach ($posts as $post): ?>
				<div class="post">
			        <h2><?php echo $this->Html->link(h($post['Post']['title']), array('action' => 'view', $post['Post']['id'])); ?></h2>
					<p><?php echo h($post['Post']['created']); ?>&nbsp;</p>
			        <p><?php echo h($post['Post']['body']); ?>&nbsp;</p>

			        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id']), 
			        											array('class' => 'btn btn-primary btn-xs')); ?>
			        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), 
			        								array('class' => 'btn btn-primary btn-xs'),
			                                        array('confirm' => __('Are you sure you want to delete # %s?', $post['Post']['id']))); ?>

		    	</div>
			<?php endforeach; ?>

		 	<div class="paging text-center">
		 		 <ul class="pagination">
					<li><?php echo $this->Paginator->prev('<  ', array(), null, array('class' => 'prev disabled')); ?></li>
					<li>
						<?php echo $this->Paginator->numbers(array('separator' => '  ',
															 'first' => 1,
															 'last'=> 1)); 
						?>
					</li>
					<li><?php echo $this->Paginator->next('  >', array(), null, array('class' => 'next disabled')); ?></li>				
				</ul>
			</div>
		</div>

		<div class="col-sm-4">
			<?php echo $this->element('sidebar', array()); ?>
		</div>
	</div>
</div>