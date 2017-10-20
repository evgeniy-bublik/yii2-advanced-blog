<?php

namespace app\modules\core\models;

use Yii;
use common\models\core\Setting as BaseSetting;
use yii\helpers\ArrayHelper;

class Setting extends BaseSetting
{
    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['admin_email', 'support_email'], 'email'],
                ['admin_phone', 'match', 'pattern' => '/(^\+?\d{12}$)|(^\d{10}$)/'],
            ]
        );
    }
}