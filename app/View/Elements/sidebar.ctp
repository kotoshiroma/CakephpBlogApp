<div class="sidebar">

    <div class="about">
        <h3><?php echo __('About'); ?></h3>
        <p>
            研修用ブログです。
        </p>
    </div>

    <div class="search">
        <?php echo $this->Form->create('Post', array('url'=>'index')); ?>
            <fieldset>
                <h3><?php echo __('Search'); ?></h3>
                <?php echo $this->Form->input(__('keyword'), array('class' => 'keyword')); ?>
                <?php echo $this->Form->input('category_id', array ('label' => __('Categories'),
                                                                    'multiple' => 'select',
                                                                    'empty' => '未選択')); ?>
                <?php echo $this->Form->input('tag_id', array ('label' => __('Tags'),
                                                               'multiple' => 'checkbox')); ?>
            </fieldset>
        <?php echo $this->Form->end(array('class' => 'btn btn-primary', 'label' => __('Search'))); ?>
    </div>

    <div class="archives">
        <h3><?php echo __('Archives'); ?></h3>
        <ul>
            <?php foreach($created_years as $created_year): ?>
                <li><?php echo $this->Html->link($created_year['Post']['created_year'].' ('.$created_year['Post']['cnt_of_post'].') ',
                                                 array('action' => 'index', $created_year['Post']['created_year'])); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
