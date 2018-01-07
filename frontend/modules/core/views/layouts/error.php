<?php

use yii\helpers\Html;
use app\assets\NotFoundAsset;

NotFoundAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="<?= Yii::$app->language; ?>">
    <head>
        <!-- Site Title-->
        <title><?= Html::encode($this->title); ?></title>
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="<?= Yii::$app->charset; ?>">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <!-- Stylesheets-->
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300,400,600,700%7CLato:300,300italic,400,700">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <?php $this->head(); ?>
        <!--[if lt IE 10]>
        <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="/images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
        <script src="js/html5shiv.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php $this->beginBody(); ?>

            <?= $content; ?>

        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>