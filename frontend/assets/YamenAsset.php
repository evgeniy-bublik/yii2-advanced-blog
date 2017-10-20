<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class YamenAsset extends AssetBundle
{
    public $basePath  = '@webroot';
    public $baseUrl   = '@web/themes/yamen';

    public $css = [
        'css/style.css',
        'css/color/blue.css',
    ];

    public $js = [
        'js/menu-script.js',
        'rs-plugin/js/jquery.themepunch.revolution.min.js',
        'rs-plugin/js/jquery.themepunch.tools.min.js',
        'rs-plugin/js/extensions/revolution.extension.video.min.js',
        'rs-plugin/js/extensions/revolution.extension.slideanims.min.js',
        'rs-plugin/js/extensions/revolution.extension.actions.min.js',
        'rs-plugin/js/extensions/revolution.extension.layeranimation.min.js',
        'rs-plugin/js/extensions/revolution.extension.kenburn.min.js',
        'rs-plugin/js/extensions/revolution.extension.navigation.min.js',
        'rs-plugin/js/extensions/revolution.extension.migration.min.js',
        'rs-plugin/js/extensions/revolution.extension.parallax.min.js',
        'js/rev_custom.js',
        'js/instafeed.min.js',
        'js/isotope.pkgd.min.js',
        'js/jquery.easing.min.js',
        'js/jquery.elevateZoom-3.0.8.min.js',
        'js/jquery.fancybox.js',
        'js/jquery.fancybox.pack.js',
        'js/jquery.fancybox-media.js',
        'js/jquery.inview.min.js',
        'js/jflickrfeed.min.js',
        'js/tweetie.min.js',
        'js/instgram_custom.js',
        'js/modernizr.custom.js',
        'js/classie.js',
        'js/main.js',
        'js/owl.carousel.min.js',
        'js/jquery.counterup.js',
        'js/waypoints.min.js',
        'js/wow.min.js',
        'js/custom.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public $options = [
        'forceCopy' => true,
    ];
}
