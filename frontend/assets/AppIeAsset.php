<?php

namespace app\assets;

use yii\web\View;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppIeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
    ];
    public $js = [
        //'lt IE 10' => 'js/html5shiv.min.js',
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}
