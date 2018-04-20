<div class="sidebar">

    <div class="about">
        <h3><?php echo __('About'); ?></h3>
        <p>
            研修用ブログです。
        </p>
    </div>

    <div class="search">
        <?php echo $this->Form->create('Post', array('url'=>'index', 'novalidate' => true)); ?>
            <fieldset>
                <h3><?php echo __('Search'); ?></h3>
                <?php 
                    echo $this->Form->input('keyword', array(
                         'class' => 'input-form'
                        ,'placeholder' => '記事タイトルで検索'
                        ,'label' => __('keyword')
                        ,'div' => array('class' => 'input-div')
                        )
                    ); 

                    echo $this->Form->input('category_id', array(
                         'multiple' => 'select'
                        ,'empty' => '未選択'
                        ,'label' => __('Categories')
                        ,'div' => array('class' => 'input-div categories_sidebar')
                        ,'class' => 'input-select-category width-full'
                        )
                    );

                    echo $this->Form->input('tag_id', array(
                         'multiple' => 'checkbox'
                        ,'label' => array(__('Tags'), 'class' => 'checkbox-heading')
                        ,'div' => array('class' => 'input-div')
                        ,'class' => 'chkbox'
                        )
                    );
                ?>

<!--
                 <div class="input-div">
                    <?php echo $this->Form->label(__('Tags')); ?>

                    <?php foreach($tags as $tagId => $tagName): ?>
                        <div>
                            <?php
                                echo $this->Form->checkbox('tag_id.', array(
                                     'class' => 'chkbox'
                                    ,'value' => $tagId
                                    ,'hiddenField' => false
                                    )
                                );
                                echo $this->Form->label($tagName);
                            ?>
                        </div>
                    <?php endforeach; ?>
                </div> 
-->
            </fieldset>
        <?php echo $this->Form->end(array('class' => 'btn btn-primary width-full', 'label' => __('Search'))); ?>
    </div>

    <div class="archives">
        <h3><?php echo __('Archives'); ?></h3>
        <ul>
            <?php foreach($created_years as $created_year): ?>
                <li><?php
                        echo $this->Html->link(
                             $created_year['Post']['created_year'].' ('.$created_year['Post']['cnt_of_post'].') '
                            ,array(
                                 'action' => 'index'
                                ,'?' => array(
                                    'year' => $created_year['Post']['created_year']
                                )
                            )
                        );
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
