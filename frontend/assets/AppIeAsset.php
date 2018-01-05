<?php

namespace app\assets;

use yii\web\View;
use yii\web\AssetBundle;

/**
 * Asset bundle for lt ie 10.
 */
class AppIeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
    ];
    public $js = [
        'js/html5shiv.min.js',
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
        'condition' => 'lt IE 10',
    ];
}
