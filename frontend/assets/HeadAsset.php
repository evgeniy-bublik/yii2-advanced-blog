<?php

namespace app\assets;

use yii\web\View;
use yii\web\AssetBundle;

/**
 * Asset bundle position head.
 */
class HeadAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
    ];
    public $js = [
        'js/google-tag-manager.js',
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}
