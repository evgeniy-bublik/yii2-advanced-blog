<?php

namespace app\modules\core\components;

use yii\web\Controller;
use app\modules\core\models\Setting;
use yii\base\InvalidConfigException;

class FrontController extends Controller
{
    public $settings;

    public function init()
    {
        parent::init();

        $settings = Setting::find()->one();

        if (!$settings) {
            throw new InvalidConfigException('Settings not found');
        }

        $this->settings = $settings;
    }

}