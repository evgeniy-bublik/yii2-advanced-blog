<?= ''//$form->field($model, 'parent_id')->textInput() ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'display_order')->textInput() ?>

<?= $form->field($model, 'active')->checkbox() ?>