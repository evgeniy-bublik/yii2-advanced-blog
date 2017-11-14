<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\tabs\TabsX;
use app\modules\core\widgets\Tabs;

/* @var $this yii\web\View */
/* @var $model backend\modules\article\models\ArticleCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Category',
                'content' => $this->render('_form_tab_category_article', [
                    'model' => $model,
                    'form' => $form,
                ]),
                'active' => true,
            ],
            [
                'label' => 'SEO',
                'content' => $this->render('_form_tab_seo', [
                    'model' => $model,
                    'form' => $form,
                ]),
            ]
        ],
        //'position' => TabsX::POS_LEFT,
        //'encodeLabels' => false,
        //'bordered' => true,
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
