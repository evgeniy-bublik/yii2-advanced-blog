<?php

namespace app\modules\core\models;

use Yii;
use common\models\core\SocialLink as BaseSocialLink;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use evgeniydev\yii2\behaviors\FormCreatorBehavior;
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
                'class' => FormCreatorBehavior::className(),
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
                    'name' => [
                        'type' => FormCreatorBehavior::TEXT_INPUT_TYPE,
                        //'hint' => 'sdfdsfsdf',
                        //'label' => false,
                        /*'items' => ['test1', 'test2'],
                        'inputOptions' => [
                            'multiple' => true,
                        ],*/
                    ],
                    'link_class' => [
                        'type' => FormCreatorBehavior::INPUT_TYPE,
                        'inputType' => 'tel',
                        'hint' => 'sdfdsfsdf',
                        'label' => '34545354'
                    ],
                    'href' => [
                        'type' => FormCreatorBehavior::DROPDOWNLIST_TYPE,
                        'items' => ['sdfsdf', '32423423'],
                        'inputOptions' => [
                            'prompt' => 'тест',
                        ],
                    ],
                    'display_order',
                    'active' => [
                        'type'        => FormCreatorBehavior::WIDGET_TYPE,
                        'widgetClass' => ToggleCheckbox::className(),
                    ],
                ],
            ],
        ];
    }
}