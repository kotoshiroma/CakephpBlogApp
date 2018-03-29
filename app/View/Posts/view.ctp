<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('modal_window', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 posts view">

        	<div>
        		<h3><strong><?php echo h($post['Post']['title']); ?></strong><h3>
        	</div>

            <div>
                <p class="post_date post_date_view">
                    <?php echo __('Created'); ?>
                    <?php echo h($post['Post']['created_fmt']); ?>
                </p>
                <p class="post_date post_date_view">
                    <?php echo __('Modified'); ?>
                    <?php echo h($post['Post']['modified_fmt']); ?>
                </p>

                <p class="post_writer post_writer_view">
                    <?php echo __('by'); ?>
                    <?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
                &nbsp;
                </p>
            </div>

        	<div class="post_body">
        		<?php echo h($post['Post']['body']); ?>
                &nbsp;
        	</div>
        	<div>
                <div class="Images_thumb">
        			<?php
        				$baseUrl = $this->Html->url('/files/image/file_name/');

        				foreach ($post['Image'] as $image) {
        					echo $this->Html->image($baseUrl.$image['dir'].'/thumb_'.$image['file_name'],
                                                    array('data_target' => $image['dir'],
                                                          'class' => 'modal_open'));
        				}
        			?>
                </div>
                &nbsp;
        	</div>

        	<dl>
                <dt>
                    <?php echo __('Categories'); ?>
                </dt>
                <dd>
                    <?php echo h($post['Category']['category_name']); ?>
                    &nbsp;
                </dd>
                <dt>
                    <?php echo __('Tags'); ?>
                </dt>
                <dd>
                    <?php
            			$length = count($post['Tag']);
            			$count = 0;
            			foreach ($post['Tag'] as $tag) {
            				echo h($tag['tag_name']);
            				if ($count !== $length-1) {
            					echo ", ";
            				}
            				$count++;
            			};
            		?>
                    &nbsp;
                </dd>
        	</dl>
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
        <div class="col-sm-4">
            <?php echo $this->element('sidebar'); ?>
        </div>
    </div>
</div>
<!-- オーバーレイ&モーダルウィンドウ -->
<div id="overlay"></div>
    <?php
        echo $this->Html->div(
            'modal_content',                                                  //divのクラス名
             '<a id="prev" class="slide_arrow" style="display: block;"></a>'. //divのテキスト
             '<a id="next" class="slide_arrow" style="display: block;"></a>'
        );
    ?>
