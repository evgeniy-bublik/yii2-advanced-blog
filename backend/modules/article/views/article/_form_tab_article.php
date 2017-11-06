<?php
use yii\helpers\Url;
use trntv\yii\datetime\DateTimeWidget;
use kartik\select2\Select2;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;
?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]); ?>

<?= $form->field($model, 'alias')->textInput(['maxlength' => true]); ?>

<?= $form->field($model, 'small_description')->textarea(['rows' => 5]); ?>

<?= $form->field($model, 'description')->widget(CKEditor::className(), [
    'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
        'preset' => 'full',
    ]),
]); ?>

<?= $form->field($model, 'date')->widget(DateTimeWidget::className(), [
    'phpDatetimeFormat' => 'dd.MM.yyyy, HH:mm:ss',
    'clientOptions'     => [
        'sideBySide'        => true,
        'showClear'         => true,
        'showClose'         => true,
        'toolbarPlacement'  => 'bottom'
    ],
]); ?>

<?= $form->field($model, 'image')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
    'pluginOptions' => [
        'initialPreviewAsData' => true,
        'initialPreview' => ($model->image) ? [$model->getFullImage()] : [],
        'overwriteInitial' => false,
        'deleteUrl' => Url::toRoute(['/article/article/delete-preview', 'id' => $model->id]),
    ],
]); ?>

<?= $form->field($model, 'tagsIds')->widget(Select2::classname(), [
    'data' => $model->getListTags(),
    'options' => [
        'placeholder' => 'Select a tag ...',
        'multiple' => true
    ],
]); ?>

<?= $form->field($model, 'active')->checkbox(); ?>
