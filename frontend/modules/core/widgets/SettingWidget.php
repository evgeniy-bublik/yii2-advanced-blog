<?php

namespace app\modules\core\widgets;

use yii\base\Widget;
use app\modules\core\models\Setting;

class SettingWidget extends Widget
{
    public $key;

    public function run()
    {
        $setting = Setting::find()
            ->where(['key' => $this->key])
            ->one();

        if ($setting) {
            return $setting->value;
        }

        return '';
    }
}