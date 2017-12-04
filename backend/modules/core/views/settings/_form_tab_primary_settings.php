<?= $form->field($model, 'admin_email')->textInput(['maxlength' => true]); ?>

<?= $form->field($model, 'support_email')->textInput(['maxlength' => true]); ?>

<?= $form->field($model, 'admin_phone')->textInput(['maxlength' => true]); ?>

<?= $form->field($model, 'admin_address')->textarea(['rows' => 5]); ?>