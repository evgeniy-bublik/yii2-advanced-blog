<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class StubAsset extends AssetBundle
{
    public $basePath  = '@webroot';
    public $baseUrl   = '@web/stub';

    public $css = [
        'css/reset.css',
        'css/main.css',
    ];

    public $js = [
        'js/jquery.js',
        'js/TimeCircles.js',
        'js/backstretch.js',
        'js/ajaxchimp.js',
        'js/main.js',
    ];

    /*public $depends = [
        'yii\web\JqueryAsset',
    ];*/

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

    public $options = [
        'forceCopy' => true,
    ];
}