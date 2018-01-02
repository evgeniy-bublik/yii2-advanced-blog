<?php

namespace app\modules\core\models;

use Yii;
use common\models\core\SocialLink as BaseSocialLink;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use evgeniydev\yii2\behaviors\FormCreatorBehavior;
use app\modules\core\widgets\Switchery;

class SocialLink extends BaseSocialLink
{
    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                ['display_order', 'default', 'value' => 0],
                //['href', 'url'],
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
            'formBehavior' => [
                'class' => FormCreatorBehavior::className(),
                'wrapperBlockButtonsOptions' => [
                    'class' => 'card-footer',
                ],
                'cancelButtonOptions' => [
                    'updateButtonOptions' => [
                        'htmlOptions' => [
                            'class' => 'btn btn-green btn-flat',
                        ],
                    ],
                    'createButtonOptions' => [
                        'htmlOptions' => [
                            'class' => 'btn btn-primary btn-flat',
                        ],
                    ],
                ],
                'attributes' => [
                    'name' => [
                        'type' => FormCreatorBehavior::TEXT_INPUT_TYPE,
                    ],
                    'link_class' => [
                        'type' => FormCreatorBehavior::TEXT_INPUT_TYPE,
                    ],
                    'href' => [
                        'type' => FormCreatorBehavior::TEXT_INPUT_TYPE,
                    ],
                    'display_order',
                    'active' => [
                        'type'        => FormCreatorBehavior::WIDGET_TYPE,
                        'widgetClass' => Switchery::className(),
                        'widgetOptions' => [
                            'options' => [
                                'label' => false,
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}