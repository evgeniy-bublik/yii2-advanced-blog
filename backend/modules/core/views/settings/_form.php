<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\modules\core\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= TabsX::widget([
        'items' => [
            [
                'label' => 'Primary',
                'content' => $this->render('_form_tab_primary_settings', [
                    'model' => $model,
                    'form' => $form,
                ]),
            ],
            [
                'label' => 'SMTP',
                'content' => $this->render('_form_tab_smtp_settings', [
                    'model' => $model,
                    'form' => $form,
                ]),
            ]
        ],
        'position' => TabsX::POS_LEFT,
        'encodeLabels' => false,
        'bordered' => true,
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
