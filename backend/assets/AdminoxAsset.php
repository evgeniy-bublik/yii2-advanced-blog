<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class AdminoxAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes/adminox';
    public $css = [
        'plugins/c3/c3.min.css',
        'css/bootstrap.min.css',
        'css/core.css',
        'css/components.css',
        'css/icons.css',
        'css/pages.css',
        'css/menu.css',
        'css/responsive.css',
    ];
    public $js = [
        //'js/jquery.min.js',
        'js/metisMenu.min.js',
        //'js/waves.js',
        'js/jquery.slimscroll.js',
        'plugins/waypoints/jquery.waypoints.min.js',
        'plugins/counterup/jquery.counterup.min.js',
        'plugins/d3/d3.min.js',
        'plugins/c3/c3.min.js',
        'plugins/echart/echarts-all.js',
        'pages/jquery.dashboard.js',
        'js/jquery.core.js',
        'js/jquery.app.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
    /*public $jsOptions = [
        'position' => View::POS_BEGIN,
    ];*/
}
