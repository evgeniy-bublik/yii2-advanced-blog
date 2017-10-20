<?php

namespace app\modules\core\models;

use Yii;
use common\models\core\SocialLink as BaseSocialLink;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

class SocialLink extends BaseSocialLink
{
    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                ['display_order', 'default', 'value' => 0],
                ['href', 'url'],
            ]
        );

    }

    public function behaviors()
    {
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}