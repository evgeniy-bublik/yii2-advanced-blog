<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var \yii\web\View $this */
?>

<?php $form = ActiveForm::begin([
    'action'  => Url::toRoute(['/article/articles/search']),
    'method'  => 'GET',
    'options' => [
        'class' => 'rd-search',
    ],
]); ?>

    <?= $form->field($model, 'search', [
        'options' => [
            'class' => 'form-wrap',
        ],
        'inputOptions' => [
            'class' => 'form-input',
            'autocomplete' => 'off',
        ],
    ]); ?>

    <button class="rd-search-submit" type="submit"></button>

<?php ActiveForm::end(); ?>