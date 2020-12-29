<h1>Register</h1>
<?php $form = \app\system\form\Form::begin('','POST') ?>

    <?php echo $form->field($model, 'name') ?>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'pw1')->passwordField() ?>
    <?php echo $form->field($model, 'pw2')->passwordField() ?>

    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo \app\system\form\Form::end() ?>