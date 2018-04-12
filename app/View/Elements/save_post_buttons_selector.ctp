<div class="btn-group dropup">
    <?php echo $this->Form->end(array('label' => __('Pubish')
                                    , 'class' => 'btn btn-primary btn_m'
                                    , 'id' => 'submit_publish'
                                    , 'name' => 'submit_publish'
                                    , 'div' => false
                                    )); ?>

    <?php echo $this->Form->end(array('label' => __('Draft')
                                    , 'class' => 'btn btn-primary btn_m'
                                    , 'id' => 'submit_draft'
                                    , 'name' => 'submit_draft'
                                    , 'div' => false
                                    )); ?>

    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="dropdown_publish"><?php echo __('Pubish'); ?></a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="dropdown_draft"><?php echo __('Draft'); ?></a></li>
    </ul>
</div>