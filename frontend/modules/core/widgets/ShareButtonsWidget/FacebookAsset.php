<?php

namespace app\modules\core\widgets\ShareButtonsWidget;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Asset for register facebook assets source
 */
class FacebookAsset extends AssetBundle
{
    /**
     * @var array $js List of JavaScript files that this bundle contains.
     */
    public $js = [
        'js/facebook-root.js',
        'js/facebook-share.js',
    ];

    /**
     * @var array $jsOptions The options that will be passed to yii\web\View::registerJsFile() when registering the JS files in this bundle.
     */
    public $jsOptions = [
        'position' => View::POS_BEGIN,
    ];

    /**
     * @var array $publishOptions The options to be passed to yii\web\AssetManager::publish() when the asset bundle is being published.
     */
    public $publishOptions = [
        'forceCopy' => YII_DEBUG ? true : false,
    ];

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function init()
    {
        parent::init();
        $this->sourcePath = __DIR__ . DIRECTORY_SEPARATOR . 'assets';
    }
}
