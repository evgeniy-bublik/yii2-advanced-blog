<?php

namespace app\modules\core\widgets\ShareButtonsWidget;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Asset for register vk js
 */
class VkAsset extends AssetBundle
{
    /**
     * @var array $js List of JavaScript files that this bundle contains.
     */
    public $js = [
        'https://vk.com/js/api/share.js?95',
    ];

    /**
     * @var array $jsOptions The options that will be passed to yii\web\View::registerJsFile() when registering the JS files in this bundle.
     */
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}
