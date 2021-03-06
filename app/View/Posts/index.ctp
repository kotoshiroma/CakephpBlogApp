<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container-fluid centering">
	<div class="row">
		<div class="col-sm-8 main-column">
			
			<?php foreach ($posts as $post): ?>
				<div class="post">
					<p class="post__date"><?php echo h($post['Post']['created_fmt']); ?>&nbsp;by <?php echo h($post['User']['username']) ?></p>
			        <h3 class="post__title">
			        	<strong><?php echo $this->Html->link(h($post['Post']['title']), array('action' => 'view', $post['Post']['id'])); ?></strong>
			        </h3>

			        <div class="post__body-index">
	        			<?php
	        				if ($post['Image']) {
	        					$baseUrl = $this->Html->url('/files/image/file_name/');
	        					$image = $post['Image'][0];
								echo $this->Html->image($baseUrl.$image['dir'].'/'.$image['file_name'], array('class' => 'post__img-index'));
	        				}
	        			?>
			        	<?php
			        		$str = $post['Post']['body'];
			        		if (mb_strlen($str) > 195) {
			        			$str = mb_substr($str, 0, 195, 'utf-8').'...';
			        		}
	        				echo h($str);
			        	?>
			        	&nbsp;
			        </div>
		    	</div>
			<?php endforeach; ?>


			<?php if (count($posts) == 0) { ?>
				<h2><?php echo 'まだ記事がありません'; ?></h2>
			<?php } ?>
			

			<?php echo $this->element('pagination'); ?>
		</div>

		<div class="col-sm-4">
			<?php echo $this->element('sidebar', array()); ?>
		</div>
	</div>
</div>