<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="wrapper-page">
            <div class="account-pages">
                <div class="account-box">
                    <div class="account-logo-box">
                        <h2 class="text-uppercase text-center">
                            <a href="index.html" class="text-success">
                            <span><img src="<?= $this->theme->getUrl('/images/logo_dark.png'); ?>" alt="" height="30"></span>
                            </a>
                        </h2>
                        <h5 class="text-uppercase font-bold m-b-5 m-t-50">Sign In</h5>
                        <p class="m-b-0">Login to your Admin account</p>
                    </div>
                    <div class="account-content">

                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'fieldConfig' => [
                                'options' => [
                                    'class' => 'form-group m-b-20',
                                ],
                                'template' => '<div class="col-xs-12">{label}{input}{error}</div>',
                            ],
                            'options' => [
                                'class' => 'form-horizontal',
                            ],
                        ]); ?>
                            <?= $form->field($model, 'email')->textInput([
                                'required' => 'required',
                            ]); ?>

                            <?= $form->field($model, 'password')->passwordInput([
                                'required' => 'required',
                            ]); ?>

                            <?= $form->field($model, 'rememberMe', ['checkboxTemplate' => '<div class="col-xs-12"><div class="checkbox">{input}{label}</div></div>'])->checkbox(); ?>

                            <div class="form-group text-center m-t-10">
                                <div class="col-xs-12">
                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                </div>
                            </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>
        <!-- end wrapper -->
    </div>
</div>