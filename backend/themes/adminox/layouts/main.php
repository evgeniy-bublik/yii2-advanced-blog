<?php
use app\assets\AdminoxAsset;
use app\assets\ModernizrAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\YiiAsset;
use yii\helpers\Html;

ModernizrAsset::register($this);
AdminoxAsset::register($this);
//BootstrapPluginAsset::register($this);
YiiAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
    <head>
        <meta charset="<?= Yii::$app->charset; ?>" />
        <title><?= Html::encode($this->title); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <?= Html::csrfMetaTags() ?>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= $this->theme->getUrl('/images/favicon.ico'); ?>">
        <?php $this->head(); ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>
        <!-- Begin page -->
        <div id="wrapper">

            <?= $this->render('inc/topbar'); ?>

            <?= $this->render('inc/left-sidebar'); ?>
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title"><?= Html::encode($this->title); ?></h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Adminox</a>
                                        </li>
                                        <li>
                                            <a href="#">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Dashboard 1
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <?= $content; ?>

                    </div>
                    <!-- container -->
                </div>
                <!-- content -->
                <footer class="footer text-right">
                    2017 © Adminox. - Coderthemes.com
                </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>