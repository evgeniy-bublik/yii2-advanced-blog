<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class MaterialAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes/material';
    public $css = [
        'css/vendor.bundle.css',
        'css/app.bundle.css',
        'css/theme-a.css',
        'css/main.css',
    ];
    public $js = [
        'js/vendor.bundle.js',
        'js/app.bundle.js',
    ];
    public $jsOptions = [
        'position' => View::POS_BEGIN,
    ];
}
