<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 sidebar_mypage">
            <?php echo $this->element('sidebar_mypage'); ?>
        </div>
        <div class="col-sm-10">
            <div class="mypage_header">
                <h2><?php echo __('Favorite Post'); ?></h2>
            </div>


            <div class="margin">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo __('post_title'); ?></th>
                            <th><?php echo __('author'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($favorite_posts as $post): ?>
                        <tr>
                            <td><?php echo h($post['Post']['title']); ?></td>
                            <td><?php echo h($post['Post']['User']['username']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <?php echo $this->element('pagination'); ?>
            </div>

        </div>
    </div>
</div>


