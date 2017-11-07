<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>

<div id="login_wrapper">
    <div id="login_content">
        <div class="logo">
            <img src="<?= Yii::$app->view->theme->getUrl('/img/logo/ml-logo.png'); ?>" alt="logo" class="logo-img">
        </div>
        <h1 class="login-title">
            Sign In to your account
        </h1>
        <div class="login-body">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'options' => [
                        'class' => 'label-floating form-group',
                    ],
                    'template' => '{label}{input}',
                ],
            ]); ?>

                <?= $form->field($model, 'email')->textInput(); ?>

                <?= $form->field($model, 'password')->passwordInput(); ?>

                <a href="javascript:void(0)" class="forgot-pass pull-right">Forgot Password?</a>

                <?= $form->field($model, 'rememberMe', [
                    'checkboxTemplate' => '<div class="checkbox inline-block">{beginLabel}{input}{labelTitle}{endLabel}{error}{hint}</div>',
                    'options' => [
                        'tag' => false,
                    ]
                ])->checkbox(); ?>

                <?= Html::submitButton('Sign In', ['class' => 'btn btn-info btn-block m-t-40', 'name' => 'login-button']) ?>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>