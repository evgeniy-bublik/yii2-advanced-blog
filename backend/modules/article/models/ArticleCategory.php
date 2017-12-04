<?php

namespace app\modules\article\models;

use Yii;
use common\models\article\ArticleCategory as BaseArticleCategory;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use evgeniydev\yii2\behaviors\FormCreatorBehavior;
use app\modules\core\widgets\Switchery;

class ArticleCategory extends BaseArticleCategory
{
    public function behaviors()
    {
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
            'formBehavior' => [
                'class' => FormCreatorBehavior::className(),
                'type' => FormCreatorBehavior::TAB_FORM,
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
                    'title',
                    'alias',
                    'description' => [
                        'type' => FormCreatorBehavior::TEXTAREA_TYPE,
                        'inputOptions' => [
                            'rows' => 5,
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
                    'meta_title',
                    'meta_description' => [
                        'type' => FormCreatorBehavior::TEXTAREA_TYPE,
                        'inputOptions' => [
                            'rows' => 5,
                        ],
                    ],
                    'meta_keywords' => [
                        'type' => FormCreatorBehavior::TEXTAREA_TYPE,
                        'inputOptions' => [
                            'rows' => 5,
                        ],
                    ],
                ],
                'tabOptions' => [
                    'tabs' => [
                        [
                            'label' => 'Primary',
                            'tabAttributes' => [
                                'title',
                                'alias',
                                'description',
                                'active',
                            ],
                        ],
                        [
                            'label' => 'Meta',
                            'tabAttributes' => [
                                'meta_title',
                                'meta_description',
                                'meta_keywords',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                ['alias', 'unique'],
                ['alias', 'match', 'pattern' => '/^[a-z\d-]+[a-z\d]$/'],
                ['display_order', 'default', 'value' => 0],
            ]
        );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinksArticleCategories()
    {
        return $this->hasMany(ArticleLinksArticleCategory::className(), ['category_id' => 'id']);
    }
}
