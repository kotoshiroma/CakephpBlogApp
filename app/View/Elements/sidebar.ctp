<div class="sidebar">

    <div class="about">
        <h3>About</h3>
        <p>
            研修用ブログです。
        </p>
    </div>

    <div class="search">
        <?php echo $this->Form->create('Post', array('url'=>'index')); ?>
            <fieldset>
                <h3>Search</h3>
                <?php echo $this->Form->input('keyword', array('class' => 'keyword')); ?>
                <?php echo $this->Form->input('category_id', array ('label' => 'Categories',
                                                                    'multiple' => 'select')); ?>
                <?php echo $this->Form->input('tag_id', array ('label' => 'Tags',
                                                               'multiple' => 'checkbox')); ?>
            </fieldset>
        <?php echo $this->Form->end(array('class' => 'btn btn-primary btn_sm', 'label' => '検索')); ?>
    </div>

<!--     <div class="actions">
    	<h3><?php echo __('Actions'); ?></h3>
    	<ul>
    		<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?></li>
    		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?></li>
    		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?></li>
    	</ul>
    </div>
 -->    <div class="archives">
        <h3>Archives</h3>
        <ul>
            <li><a>2018年</a></li>
            <li><a>2017年</a></li>
            <li><a>2016年</a></li>
        </ul>
    </div>
</div>
