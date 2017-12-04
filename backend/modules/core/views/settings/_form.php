<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\modules\core\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<?= Tabs::widget([
    'items' => [
        [
            'label' => 'Contact',
            'content' => $this->render('_form_tab_primary_settings', [
                'model' => $model,
                'form' => $form,
            ]),
            'active' => true,
        ],
        [
            'label' => 'SMTP',
            'content' => $this->render('_form_tab_smtp_settings', [
                'model' => $model,
                'form' => $form,
            ]),
        ],
        [
            'label' => 'Post',
            'content' => $this->render('_form_tab_post_settings', [
                'model' => $model,
                'form' => $form,
            ]),
        ],

    ],
]); ?>

<div class="form-group">
    <?= Html::submitButton('Update', ['class' => 'btn btn-primary']); ?>
</div>

<?php ActiveForm::end(); ?>