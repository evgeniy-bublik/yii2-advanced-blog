<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;
use mihaildev\elfinder\InputFile;
use xtarantulz\preview\PreviewAsset;
use yii\helpers\Url;

PreviewAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\modules\article\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'small_description')->textarea(['rows' => 5]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
            'preset' => 'full',
        ]),
    ]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'initialPreviewAsData' => true,
            'initialPreview' => ($model->image) ? [$model->getFullImage()] : [],
            'overwriteInitial' => true,
            'deleteUrl' => Url::toRoute(['/article/article/delete-preview', 'id' => $model->id]),
        ],
    ]);  ?>

    <?= ''//$form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'display_order')->textInput() ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textarea(['rows' => 5]) ?>

    <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 5]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
