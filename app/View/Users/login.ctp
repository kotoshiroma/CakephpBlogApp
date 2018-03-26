<?php echo $this->Html->script('jquery-1.12.4', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap'); ?>

<div class="container">
<?php
echo $this->Form->create('User', array('url' => 'login'));
echo $this->Form->inputs(array(
    'legend' => __('Login'),
    'username',
    'password'
));

echo $this->Form->end(array('label' => __('Login'), 'class' => 'btn btn-primary btn_sm'));
?>

</div>
