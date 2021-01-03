<h1>Login</h1>
<?php $form = \app\system\form\Form::begin('','POST') ?>

    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>

    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo \app\system\form\Form::end() ?>