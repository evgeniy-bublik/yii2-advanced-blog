<?php

namespace app\modules\core\models;

use Yii;
use common\models\core\SocialLink as BaseSocialLink;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use app\modules\core\behaviors\FormBehavior;
use app\modules\core\widgets\ToggleCheckbox;

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
            'formBehavior' => [
                'class' => FormBehavior::className(),
                'formOptions' => [
                    'options' => [
                        'class' => 'form-horizontal',
                    ],
                    'fieldConfig' => [
                        'labelOptions' => [
                            'class' => 'col-md-1 control-label',
                        ],
                        'template' => '{label}<div class="col-md-11">{input}{error}</div>',
                    ],
                ],
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
                    'name',
                    'link_class',
                    'href',
                    'display_order',
                    'active' => [
                        'type'        => FormBehavior::WIDGET_TYPE,
                        'widgetClass' => ToggleCheckbox::className(),
                    ],
                ],
            ],
        ];
    }
}