<?php
use app\assets\AppAsset;
use app\assets\AppIeAsset;
use yii\helpers\Html;

AppIeAsset::register($this);
AppAsset::register($this);
/* @var yii\web\View $this*/
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="<?= Yii::$app->language; ?>">
    <head>
        <title><?= Html::encode($this->title); ?></title>
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="<?= Yii::$app->charset; ?>">
        <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,700%7CLato:300,300italic,400,400italic,700,900%7CPlayfair+Display:700italic,900">
        <!--[if lt IE 10]> 
        <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="/images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
        <![endif]--> 
        <?php $this->head(); ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>
        <div class="page">
            <div class="page-loader page-loader-variant-1">
                <div>
                    <a class="brand brand-md" href="index.html"><img src="/images/logo-white.svg" width="139" height="22" alt="logo"/></a>
                    <div class="page-loader-body">
                        <div id="spinningSquaresG">
                            <div class="spinningSquaresG" id="spinningSquaresG_1"></div>
                            <div class="spinningSquaresG" id="spinningSquaresG_2"></div>
                            <div class="spinningSquaresG" id="spinningSquaresG_3"></div>
                            <div class="spinningSquaresG" id="spinningSquaresG_4"></div>
                            <div class="spinningSquaresG" id="spinningSquaresG_5"> </div>
                            <div class="spinningSquaresG" id="spinningSquaresG_6"></div>
                            <div class="spinningSquaresG" id="spinningSquaresG_7"></div>
                            <div class="spinningSquaresG" id="spinningSquaresG_8"></div>
                        </div>
                    </div>
                </div>
            </div>

            <?= $this->render('includes/header'); ?>
          
            <?= $content; ?>

            <?= $this->render('includes/prefooter'); ?>

            <?= $this->render('includes/footer'); ?>

        </div>
        <div class="snackbars" id="form-output-global"></div>
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--share" title="Share"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__cent"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>