<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Page not found asset bundle.
 */
class NotFoundAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/404.css',
    ];
    public $js = [
        'js/404/core.min.js',
        'js/404/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $publishOptions = [
        'forceCopy' => true,
    ];
}
