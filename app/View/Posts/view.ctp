<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('modal_window', array('inline' => false)); ?>
<?php echo $this->Html->script('popup', array('inline' => false)); ?>
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
            				<?php
                                echo $this->Html->image($baseUrl.$image['dir'].'/'.$image['file_name']
                                    ,array(
                                         'data_target' => $image['dir']
                                        ,'class' => 'modal_open img_view'
                                    )
                                );
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

            <!-- ポップアップ領域(開始) -->
            <div class="popup-wrapper">
                <!-- コメントを書くボタン -->
                <div>
                    <?php
                        echo $this->Form->button(__('Write Comment'), array(
                             'id' => 'write-comment'
                            ,'class' => 'popup-open btn btn-default'
                            )
                        );
                    ?>
                </div>
                <!-- コメントポップアップ -->
                <div class="popup popup--position-1" id="popup-write-comment">
                    <div class="floatContainer">
                        <i class="far fa-window-close popup-close-icon"></i>
                    </div>

                    <?php 
                        echo $this->Form->create(
                            'Comment', 
                            array(
                                 'url' => array('controller' => 'posts', 'action' => 'add_comment')
                                ,'novalidate' => true
                            )
                        ); 
                    ?>
                        <?php echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $auth->user('id'))); ?>
                        <?php echo $this->Form->input('post_id', array('type' => 'hidden', 'value' => $post['Post']['id'])); ?>
                        <table>
                            <tbody>
                                <tr>
                                    <th>
                                        <?php echo __('contributor'); ?>
                                    </th>
                                    <td class="text">
                                        <?php
                                            echo $this->Form->text('contributor', array('class' => 'input-form input-text input-popup'));
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo __('comment'); ?>
                                    </th>
                                    <td class="textarea">
                                        <?php
                                            echo $this->Form->textarea('comment', array('class' => 'input-form input-textarea input-popup'));
                                        ?>
                                    </td>
                                </tr>
                                <tr class="submit">
                                    <td colspan="2" align="center">
                                        <?php echo $this->Form->button(__('Contribute'), array('class' => 'btn btn-primary btn_m submit-popup', 'disabled' => true)); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
            <!-- ポップアップ領域(終了) -->
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
