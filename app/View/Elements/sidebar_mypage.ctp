<ul>
  <li><?php echo $this->Html->link(__('Dashboard'), array('controller' => 'posts', 'action' => 'mypage')); ?></li>
  <li>
    <i class="fas fa-edit fa-fw"></i>
    <!-- <i class="far fa-edit fa-fw"></i> -->
    <?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?>
  </li>
  <li>
    <i class="far fa-file-alt fa-fw"></i>
    <?php echo $this->Html->link(__('Post Management'), array('controller' => 'posts', 'action' => 'mypage_index')); ?>
  </li>
  <li>
    <i class="far fa-folder fa-fw"></i>
    <?php echo $this->Html->link(__('Category'), array('controller' => 'categories', 'action' => 'index')); ?>
  </li>
  <li>
    <i class="fas fa-tag fa-fw"></i>
    <?php echo $this->Html->link(__('Tag'), array('controller' => 'tags', 'action' => 'index')); ?>    
  </li>
</ul>