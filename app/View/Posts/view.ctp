<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('modal_window', array('inline' => false)); ?>
<?php echo $this->Html->script('popup_comment', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container-fluid centering">
    <div class="row">
        <div class="col-sm-8 posts view">

            <p class="post_date"><?php echo h($post['Post']['created_fmt']); ?>&nbsp;by <?php echo h($post['User']['username']) ?></p>
            <h3 class="post_title"><strong><?php echo h($post['Post']['title']); ?></strong></h3>

        	<div class="post_body">
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
                    <?php echo __('Categories'); ?>
                </dt>
                <dd>
                    <?php echo $this->Html->link($post['Category']['category_name']
                                                , array('action' => 'index'
                                                ,'?' => array('category_id' => $post['Category']['id']))
                                                , array('class' => 'btn btn-xs btn-info')); ?>
                    &nbsp;
                </dd>

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
<!--             <div>
                <button id="popup_comment_open" class="btn btn-default">コメントを書く</button>
            </div>
            <div id="comment_form">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>
                                投稿者
                            </th>
                            <td>
                                <input type="text" name="commentator">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                コメント
                            </th>
                            <td>
                                <textarea name="comment_body" rows="5" cols="50"></textarea>
                            </td>
                        </tr>
                        <tr class="submit">
                            <td colspan="2" align="center">
                                <input type="submit" class="btn btn-primary btn_s" value="投稿">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> -->

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
