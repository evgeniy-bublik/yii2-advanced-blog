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
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title); ?></title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:300,400,500,600" rel="stylesheet">
        <link rel="icon" href="<?= Yii::$app->view->theme->getUrl('/img/favicon.ico'); ?>" type="image/x-icon">
        <?php $this->head(); ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>
        <div id="app_wrapper">

            <?= $this->render('inc/header'); ?>

            <?= $this->render('inc/sidebar-left'); ?>

            <section id="content_outer_wrapper">
                <div id="content_wrapper">
                    <div id="header_wrapper" class="header-sm">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12">
                                    <header id="header">
                                        <h1>Dashboard</h1>
                                    </header>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?= $content; ?>

                    <!-- ENDS $content -->
                </div>
                <footer id="footer_wrapper">
                    <div class="footer-content">
                        <div class="row copy-wrapper">
                            <div class="col-xs-12">
                                <p class="copy">&copy; Copyright <time class="year"></time> MaterialLab - All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </footer>
            </section>

            <?= $this->render('inc/sidebar-right'); ?>

            <?= $this->render('inc/chat'); ?>
        </div>

        <?= $this->render('inc/modals'); ?>

        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>