<?= $form->field($model, 'smtp_username')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'smtp_password')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'smtp_host')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'smtp_port')->textInput() ?>

<?= $form->field($model, 'smtp_encryption')->textInput(['maxlength' => true]) ?>