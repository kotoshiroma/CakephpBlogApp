<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="header">

    <nav class="navbar">
        <div class="header-start container-fluid">
            <ul class="nav navbar-nav">
                <?php if (is_null($auth->user('id'))) { ?>
                    <li><?php echo $this->Html->link(__('ABOUT'), array('controller' => 'posts', 'action' => 'index'), array('class' => 'header-font-color')); ?></li>
                    <li><?php echo $this->Html->link(__('CONTACT'), array('controller' => 'posts', 'action' => 'index'), array('class' => 'header-font-color')); ?></li>
                <?php } ?>
            </ul>
        </div>
        <div class="header-end container-fluid">
            <ul class="navbar-nav">
                  
                <?php if ($auth->user('id') !== null) { ?>
                        <li class="dropdown active header-font-color header-end__username">
                            <a class="dropdown-toggle header-font-color" data-toggle="dropdown" role="button"><?php echo $auth->user('username'); ?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <?php echo $this->Html->link(__('AccountSetting'), array('controller' => 'users', 'action' => 'view', $auth->user('id'))); ?>
                                </li>
                                <li><?php echo $this->Html->link(__('MyPage'), array('controller' => 'posts', 'action' => 'mypage')); ?></li>
                                
                                <?php if ($auth->user('group_id') === $ADMIN_ID) { ?>
                                    <li>
                                        <?php echo $this->Html->link(__('User Management'), array('controller' => 'users', 'action' => 'index')); ?>    
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link(__('Group Management'), array('controller' => 'groups', 'action' => 'index')); ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')
                                                                   , array('class' => 'btn header-end__btn header-font-color')
                                                      );
                            ?>
                        </li>

                <?php } else { ?>
                        <li>
                            <?php
                                echo $this->Html->link(__('sign up'), array('controller' => 'users', 'action' => 'add')
                                                                  , array('class' => 'btn header-end__btn header-font-color')
                                                      );
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')
                                                                  , array('class' => 'btn header-end__btn header-font-color')
                                                      );
                            ?>
                        </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <div class="blog-title container-fluid">
        <h1><?php echo $this->Html->link(__('研修用 ブログ'), array('controller' => 'posts', 'action' => 'index')); ?></h1>
    </div>
</div>
