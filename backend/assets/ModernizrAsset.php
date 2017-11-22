<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class ModernizrAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes/adminox';
    public $css = [
    ];

    public $js = [
        'js/modernizr.min.js',
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}
