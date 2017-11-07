<?php
use app\assets\MaterialAsset;
use yii\helpers\Html;

MaterialAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
    <head>
        <meta charset="<?= Yii::$app->charset; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?= Html::encode($this->title); ?></title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:300,400,500,600" rel="stylesheet">
        <link rel="icon" href="<?= Yii::$app->view->theme->getUrl('/img/favicon.ico'); ?>" type="image/x-icon">
        <?php $this->head(); ?>
    </head>
    <?php $this->beginBody(); ?>
    <body id="auth_wrapper" >

        <?= $content; ?>

        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>