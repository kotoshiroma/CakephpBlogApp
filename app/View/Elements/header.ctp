<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="header">

    <nav class="navbar">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><?php echo $this->Html->link(__('HOME'), array('controller' => 'posts', 'action' => 'index'), array('class' => 'nav_li')); ?></li>
                
                <?php if ($auth->user('group_id') === $ADMIN_ID) { ?>
                        <li class="dropdown active">
                            <a class="dropdown-toggle nav_li" data-toggle="dropdown" role="button"><?php echo __('MENU'); ?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link(__('User'), array('controller' => 'users', 'action' => 'index')); ?></li>
                                <li><?php echo $this->Html->link(__('Group'), array('controller' => 'groups', 'action' => 'index')); ?></li>
                                <li><?php echo $this->Html->link(__('Category'), array('controller' => 'categories', 'action' => 'index')); ?></li>
                                <li><?php echo $this->Html->link(__('Tag'), array('controller' => 'tags', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                <?php } ?>

                <li><?php echo $this->Html->link(__('ABOUT'), array('controller' => 'posts', 'action' => 'index'), array('class' => 'nav_li')); ?></li>
                <li><?php echo $this->Html->link(__('CONTACT'), array('controller' => 'posts', 'action' => 'index'), array('class' => 'nav_li')); ?></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                  
                <?php if ($auth->user('id') !== null) { ?>
                        <li class="nav_li nav_username">
                            <?php echo $auth->user('username'); ?>
                        </li>
                        <li>
                        <?php
                            echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')
                                                               , array('class' => 'btn btn_login nav_li')
                                                  );
                        ?>
                        </li>

                <?php } else { ?>
                        <li>
                        <?php
                            echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')
                                                              , array('class' => 'btn btn_logout nav_li')
                                                  );
                        ?>
                        </li>
                        <li>
                        <?php
                            echo $this->Html->link(__('sign up'), array('controller' => 'users', 'action' => 'add')
                                                              , array('class' => 'btn btn_addUser nav_li')
                                                  );
                        ?>
                        </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <div class="container-fluid blog_name ">
        <h1><?php echo $this->Html->link(__('The BootStrap Blog'), array('controller' => 'posts', 'action' => 'index')); ?></h1>
    </div>
</div>
