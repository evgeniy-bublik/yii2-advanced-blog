<?php
use yii\helpers\Html;
use app\assets\StubAsset;

StubAsset::register($this);

/* @var yii\web\View $this */
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
    <head>
        <title><?= Html::encode($this->title); ?></title>
        <meta charset="<?= Yii::$app->charset; ?>">
        <?= Html::csrfMetaTags() ?>
        <?php $this->head(); ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>

        <?= $content; ?>

        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>