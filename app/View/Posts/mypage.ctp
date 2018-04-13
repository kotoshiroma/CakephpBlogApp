<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 sidebar_mypage">
            <?php echo $this->element('sidebar_mypage'); ?>
        </div>
        <div class="col-sm-10">
            <div class="mypage_header">
                <h2><?php echo __('Dashboard'); ?></h2>
            </div>

            <table class="table table_mypage">
                <tr>
                    <th><?php echo __('Posts') ?></th>
                    <td><?php echo $posts_count; ?></td>
                </tr>              
                 <tr>
                    <th><?php echo __('Comments') ?></th>
                    <td><?php echo $comments_count; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
