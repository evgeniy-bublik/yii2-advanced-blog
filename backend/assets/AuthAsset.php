<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class AuthAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes/adminox';
    public $css = [
        'plugins/bootstrap-select/css/bootstrap-select.min.css',
        'css/bootstrap.min.css',
        'css/core.css',
        'css/components.css',
        'css/icons.css',
        'css/pages.css',
        'css/menu.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/metisMenu.min.js',
        'js/waves.js',
        'js/jquery.slimscroll.js',
        'plugins/bootstrap-select/js/bootstrap-select.min.js',
        'js/jquery.core.js',
        'js/jquery.app.js',
    ];
}