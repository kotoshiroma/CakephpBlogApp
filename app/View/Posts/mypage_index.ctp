<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>
<?php echo $this->Html->script('get_post'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 sidebar_mypage">
            <?php echo $this->element('sidebar_mypage'); ?>
        </div>
        <div class="col-sm-10">
            <div class="mypage_header">
                <h2><?php echo __('Post Management'); ?></h2>
            </div>

            <ul class="nav-tabs nav post_management">
                <li id="publish_post" class="active"><a href="#" data-toggle="tab">公開</a></li>
                <li id="draft_post"><a href="#" data-toggle="tab">下書き</a></li>
                <li id="all_post"><a href="#" data-toggle="tab">すべて</a></li>
            </ul>

            <form action="/posts/delete" method="post">
                <div class="floatContainer">
                        <button id="btn-post-delete" type="submit" class="btn btn-warning btn_xl float-r" disabled>
                            <i class="fas fa-trash fa-fw"></i>
                            チェックした記事を削除
                        </button>
                </div>

                <div class="tab-pane active margin" id="posts_table_pane">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo __(''); ?></th>
                                <th><?php echo __('post_title'); ?></th>
                                <th><?php echo __('edit'); ?></th>
                                <th><?php echo __('category'); ?></th>
                                <th><?php echo __('comment'); ?></th>
                                <th><?php echo __('created'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($posts_publish as $post): ?>
                            <tr>
                                <td><input class="chkbox" type="checkbox" name="post_id[]" value="<?php echo $post['Post']['id']; ?>"></td>
                                <td><?php echo h($post['Post']['title']); ?></td>
                                <td>
                                    <?php 
                                        echo $this->Html->link(__('Edit')
                                            , array('action' => 'edit', $post['Post']['id'])
                                            , array('class' => 'btn btn-primary btn-xs')
                                        ); 
                                    ?>
                                </td>
                                <td><?php echo h($post['Category']['category_name']); ?></td>
                                <td><?php echo count($post['Comment']); ?></td>
                                <td><?php echo h($post['Post']['created_fmt']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?php echo $this->element('pagination'); ?>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    $(document).on('change', '.chkbox', function(){

        if ($('.chkbox:checked').length > 0) {

            $('#btn-post-delete').prop('disabled', false);
        } else {
            
            $('#btn-post-delete').prop('disabled', true );
        }
    });

    $(document).on('click', '#btn-post-delete', function(){

        if (confirm("削除してよろしいですか？")) {
            return true;
        } else {
            return false;
        }
    });
});
</script>

