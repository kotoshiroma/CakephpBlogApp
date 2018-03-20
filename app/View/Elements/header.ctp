<!-- <?php echo $this->Html->css('bootstrap'); ?> -->
<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="header">

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><?php echo $this->Html->link('HOME', array('controller' => 'posts', 'action' => 'index')); ?></li>
                
                <li class="dropdown active">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button">MENU <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><?php echo $this->Html->link('ユーザー', array('controller' => 'users', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('グループ', array('controller' => 'groups', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('カテゴリー', array('controller' => 'categories', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link('タグ', array('controller' => 'tags', 'action' => 'index')); ?></li>
                    </ul>
                </li>

                <li><?php echo $this->Html->link('ABOUT', array('controller' => 'posts', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link('CONTACT', array('controller' => 'posts', 'action' => 'index')); ?></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                 <li>
                    <div>
                        <h4>
                            <span>
                                <?php echo $auth->user('username'); ?>
                            
                                <?php
                                    

                                    $user_id = $auth->user('id');
                                    if (isset($user_id)) {
                                        echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));

                                    } else {
                                        echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'));
                                    }
                                ?>
                            </span>
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid blog_name ">
        <h1>The BootStrap Blog</h1>
    </div>
</div>
