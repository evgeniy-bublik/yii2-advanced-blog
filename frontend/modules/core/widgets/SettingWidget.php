<?php

namespace app\modules\core\widgets;

use yii\base\Widget;
use app\modules\core\models\Setting;

/**
 * Setting widget witch find setting value by key.
 */
class SettingWidget extends Widget
{
    /**
     * @var string $key Key string
     */
    public $key;

    /**
     * {@inheritdoc}
     *
     * @return string|null
     */
    public function run()
    {
        $setting = Setting::find()
            ->where(['key' => $this->key])
            ->one();

        if ($setting) {
            return $setting->value;
        }

        return null;
    }
}
