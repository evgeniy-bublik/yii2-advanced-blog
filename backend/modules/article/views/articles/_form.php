<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use xtarantulz\preview\PreviewAsset;
use kartik\tabs\TabsX;

//PreviewAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\modules\article\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= TabsX::widget([
        'items' => [
            [
                'label' => 'Article',
                'content' => $this->render('_form_tab_article', [
                    'model' => $model,
                    'form' => $form,
                ]),
            ],
            [
                'label' => 'SEO',
                'content' => $this->render('_form_tab_seo', [
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
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
