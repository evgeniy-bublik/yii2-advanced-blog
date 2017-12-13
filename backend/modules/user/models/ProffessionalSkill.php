<?php

namespace app\modules\user\models;

use Yii;
use common\models\user\ProffessionalSkill as BaseProffessionalSkill;
use yii\helpers\ArrayHelper;
use evgeniydev\yii2\behaviors\FormCreatorBehavior;
use kartik\color\ColorInput;
use app\modules\core\widgets\Switchery;

class ProffessionalSkill extends BaseProffessionalSkill
{
    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['display_order'], 'default', 'value' => 0],
            ]
        );
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function behaviors()
    {
        return [
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
                    'name',
                    'value',
                    'color_bar' => [
                        'type' => FormCreatorBehavior::WIDGET_TYPE,
                        'widgetClass' => ColorInput::className(),
                        'widgetOptions' => [
                            'options' => [
                                'placeholder' => 'Select color',
                            ],
                        ],
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
