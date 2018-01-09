<?php

namespace app\modules\core\widgets\ShareButtonsWidget;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Asset for register twitter widgets js
 */
class TwitterAsset extends AssetBundle
{
    /**
     * @var array $js List of JavaScript files that this bundle contains.
     */
    public $js = [
        'https://platform.twitter.com/widgets.js',
    ];

    /**
     * @var array $jsOptions The options that will be passed to yii\web\View::registerJsFile() when registering the JS files in this bundle.
     */
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

    /**
     * @var array $publishOptions The options to be passed to yii\web\AssetManager::publish() when the asset bundle is being published.
     */
    public $publishOptions = [
        'forceCopy' => true,
    ];
}
