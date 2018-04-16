<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('modal_window', array('inline' => false)); ?>
<?php echo $this->Html->script('popup_comment', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container-fluid centering">
    <div class="row">
        <div class="col-sm-8 posts view">

            <p class="post__date"><?php echo h($post['Post']['created_fmt']); ?>&nbsp;by <?php echo h($post['User']['username']) ?></p>
            <h3 class="post__title"><strong><?php echo h($post['Post']['title']); ?></strong></h3>

            <?php 
                echo $this->Html->link($post['Category']['category_name']
                    , array('action' => 'index'
                    ,'?' => array('category_id' => $post['Category']['id']))
                    , array('class' => 'btn btn-xs btn-default margin-l-S margin-t-XS')
                ); 
            ?>
        	<div class="post__body">
                <?php echo h($post['Post']['body']); ?>
                &nbsp;
        	</div>
            <div>
                <div class="Images_thumb">
        			<?php $baseUrl = $this->Html->url('/files/image/file_name/'); ?>
        			<?php foreach ($post['Image'] as $image): ?>
                        <a href="#" alt="">
            				<?php echo $this->Html->image($baseUrl.$image['dir'].'/'.$image['file_name'],
                                                        array('data_target' => $image['dir'],
                                                              'class' => 'modal_open img_view'));
            				?>
                        </a>
        			<?php endforeach; ?>
                    
                </div>
                &nbsp;
        	</div>

        	<dl>
                <dt>
                    <?php echo __('Tags'); ?>
                </dt>
                <dd>
                    <?php foreach ($post['Tag'] as $tag): ?>
                        
                        <?php echo $this->Html->link($tag['tag_name'], array('action' => 'index'
                                                                            ,'?' => array('tag_id' => $tag['id']))
                                                                      ,array('class' => 'btn btn-xs btn-info')); ?>
                        
                    <?php endforeach;?>
                    &nbsp;
                </dd>
        	</dl>

            <!-- コメント欄 -->
            <div class="comments_view">
                
                <?php foreach ($post['Comment'] as $comment):?>
                    <div class="comment_view">
                        <div class="comment_view_contents">
                            <h5 class="comment_contributor"><?php echo $comment['contributor']; ?></h5>
                            <p><?php echo $comment['comment']; ?></p>
                            <p class="comment_datetime"><?php echo $comment['created_fmt']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- コメントを書く -->
            <div>
                <button id="popup_comment_open" class="btn btn-default"><?php echo __('Write Comment'); ?></button>
            </div>

            <div id="popup_comment">
                <div class="floatContainer">
                    <i class="far fa-window-close popup_close_icon"></i>
                </div>

                <?php 
                    echo $this->Form->create(
                        'Comment', 
                        array(
                            'url' => array('controller' => 'posts', 'action' => 'add_comment'), 
                            'novalidate' => true
                        )
                    ); 
                ?>

                    <?php echo $this->Form->input('Comment.user_id', array('type' => 'hidden', 'value' => $auth->user('id'))); ?>
                    <?php echo $this->Form->input('Comment.post_id', array('type' => 'hidden', 'value' => $post['Post']['id'])); ?>
                    <table class="">
                        <tbody>
                            <tr>
                                <th>
                                    <?php echo __('contributor'); ?>
                                </th>
                                <td class="contributor">
                                    <?php echo $this->Form->input('contributor', array('class' => 'form_contributor', 'label' => false, 'div' => false)); ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php echo __('comment'); ?>
                                </th>
                                <td class="comment">
                                    <?php echo $this->Form->textarea('comment', array('class' => 'form_comment', 'rows' => '5', 'cols' => '50')); ?>
                                </td>
                            </tr>
                            <tr class="submit">
                                <td colspan="2" align="center">
                                    <?php echo $this->Form->button(__('Contribute'), array('class' => 'btn btn-primary btn_m btn_contribute', 'disabled' => true)); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php echo $this->Form->end(); ?>
            </div>

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
            'modal_content',                                                  
             '<a id="prev" class="slide_arrow" style="display: block;"></a>'. 
             '<a id="next" class="slide_arrow" style="display: block;"></a>'
        );
    ?>
