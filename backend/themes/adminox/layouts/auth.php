<?php
    use yii\helpers\Html;
    use app\assets\AuthAsset;
    use app\assets\ModernizrAsset;
    use yii\bootstrap\BootstrapPluginAsset;
    use yii\web\YiiAsset;

    ModernizrAsset::register($this);
    AuthAsset::register($this);
    BootstrapPluginAsset::register($this);
    YiiAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
    <head>
        <meta charset="<?= Yii::$app->charset; ?>" />
        <title><?= Html::encode($this->title); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= $this->theme->getUrl('/images/favicon.ico'); ?>">
        <?php $this->head(); ?>
    </head>
    <?php $this->beginBody(); ?>
    <body class="bg-accpunt-pages">
        <!-- HOME -->
        <section>
            <div class="container">

                <?= $content; ?>

            </div>
        </section>
        <!-- END HOME -->
        <?php $this->registerJs('var resizefunc = [];'); ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>