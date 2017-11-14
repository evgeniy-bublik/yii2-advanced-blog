<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\core\widgets\ToggleCheckbox;
/* @var $this yii\web\View */
/* @var $model app\modules\core\models\SocialLink */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'options' => [
        'class' => 'form-horizontal',
    ],
    'fieldConfig' => [
        'labelOptions' => [
            'class' => 'col-md-1 control-label',
        ],
        'template' => '{label}<div class="col-md-11">{input}{error}</div>',
    ]
]); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'link_class')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'href')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'display_order')->textInput() ?>

<?= $form->field($model, 'active')->widget(ToggleCheckbox::className(), [
    'options' => [
        'class' => 'toggle-success',
    ],
]) ?>

<div class="card-footer text-right">
    <?= Html::a('Cancel', ['index'], ['class' => ($model->isNewRecord) ? 'btn btn-green btn-flat' : 'btn btn-primary btn-flat']); ?>
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>