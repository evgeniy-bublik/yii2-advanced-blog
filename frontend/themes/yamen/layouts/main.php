<?php
use yii\helpers\Html;
use app\assets\YamenAsset;
use app\modules\core\widgets\SettingWidget;
use yii\helpers\Url;

YamenAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
    <meta charset="<?= Yii::$app->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="style/images/favicon.ico">
    <title><?= Html::encode($this->title); ?></title>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="style/js/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
  </head>
<body>
<?php $this->beginBody(); ?>

<?= $this->render('inc/preloader'); ?>

<?= $this->render('inc/sidebar'); ?>

<div class="content-wrap">
    <div id="home" class="body-wrapper">
        <!-- Start Section Header style3 -->
        <section class="Header-Style3">
            <div class="TopHeader">
                <div class="container">
                    <div class="row">
                        <div class="Contact-h col-md-6">

                            <?php if ($adminPhone = SettingWidget::widget(['key' => 'admin_phone'])) : ?>

                                <div class="PhoneNamber">
                                    <p><i class="fa fa-phone"></i><?= $adminPhone; ?></p>
                                </div>

                            <?php endif; ?>
                            <?php if ($adminEmail = SettingWidget::widget(['key' => 'admin_email'])) : ?>

                                <div class="Email-Site">
                                    <p><i class="fa fa-envelope"></i><?= $adminEmail; ?></p>
                                </div>

                            <?php endif; ?>

                        </div>
                        <div class="col-md-6">
                            <div class="Link-ul">
                                <ul class="icons-ul">
                                    <li><a href="<?= Url::toRoute(['/core/index/about']); ?>"><span>О себе</span></a></li>
                                    <li><a href="#"><span>Join our Community</span></a></li>
                                    <li class="sidebar-menu"><a href="#" id="open-button" ><span>Login / Sign Up</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?= $this->render('inc/nav'); ?>

        </section>
        <!-- End Section Header style3 -->

        <?= $content; ?>

        <?= $this->render('inc/footer'); ?>

    </div>
    <!-- Back to top Link -->
    <div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>
</div>

<?php $this->endBody(); ?>

</body>
</html>
<?php $this->endPage() ?>