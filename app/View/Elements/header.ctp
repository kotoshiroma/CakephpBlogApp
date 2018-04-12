<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="header">

    <nav class="navbar">
        <div class="header_start container-fluid">
            <ul class="nav navbar-nav">
                <li>
                    <!-- <i class="fas fa-home"></i> -->
                    <?php echo $this->Html->link(__('HOME'), array('controller' => 'posts', 'action' => 'index'), array('class' => 'nav_li')); ?>
                </li>

                <?php if (is_null($auth->user('id'))) { ?>
                    <li><?php echo $this->Html->link(__('ABOUT'), array('controller' => 'posts', 'action' => 'index'), array('class' => 'nav_li')); ?></li>
                    <li><?php echo $this->Html->link(__('CONTACT'), array('controller' => 'posts', 'action' => 'index'), array('class' => 'nav_li')); ?></li>
                <?php } ?>
            </ul>
        </div>
        <div class="header_end container-fluid">
            <ul class="header_end navbar-nav">
                  
                <?php if ($auth->user('id') !== null) { ?>
                        <li class="dropdown active nav_li username">
                            <a class="dropdown-toggle nav_li username" data-toggle="dropdown" role="button"><?php echo $auth->user('username'); ?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <?php echo $this->Html->link(__('AccountSetting'), array('controller' => 'users', 'action' => 'view', $auth->user('id'))); ?>
                                </li>
                                <li><?php echo $this->Html->link(__('MyPage'), array('controller' => 'posts', 'action' => 'mypage')); ?></li>
                                
                                <?php if ($auth->user('group_id') === $ADMIN_ID) { ?>
                                    <li>
                                        <?php echo $this->Html->link(__('ユーザー管理'), array('controller' => 'users', 'action' => 'index')); ?>    
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link(__('グループ管理'), array('controller' => 'groups', 'action' => 'index')); ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')
                                                                   , array('class' => 'btn btn_logout nav_li')
                                                      );
                            ?>
                        </li>

                <?php } else { ?>
                        <li>
                            <?php
                                echo $this->Html->link(__('sign up'), array('controller' => 'users', 'action' => 'add')
                                                                  , array('class' => 'btn btn_addUser nav_li')
                                                      );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')
                                                                  , array('class' => 'btn btn_login nav_li')
                                                      );
                            ?>
                        </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <div class="container-fluid blog_name ">
        <h1><?php echo $this->Html->link(__('研修用 ブログ'), array('controller' => 'posts', 'action' => 'index')); ?></h1>
    </div>
</div>
