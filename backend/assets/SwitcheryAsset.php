<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * SwitcherAsset widget asset bundle.
 */
class SwitcheryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes/adminox';
    public $css = [
        'plugins/switchery/switchery.min.css',
    ];
    public $js = [
        'plugins/switchery/switchery.min.js',
    ];
}