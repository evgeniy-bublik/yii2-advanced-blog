<?php

namespace app\modules\portfolio\models;

use Yii;
use common\models\portfolio\Tag as BaseTag;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use evgeniydev\yii2\behaviors\FormCreatorBehavior;


class Tag extends BaseTag
{
    /**
     * @inheritdoc
     *
     * @return array
     */
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
     * @inheritdoc
     *
     * @return array
     */
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
                    'name',
                    'alias',
                    'display_order',
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
                                'name',
                                'alias',
                                'display_order',
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

    /**
     * Generate hash map table by indexName, valueName
     *
     * @param string $indexName Field name with be key array
     * @param string $valueName Field name with be value array
     * @return array
     */
    public static function hashListTags($indexName = 'id', $valueName = 'name')
    {
        return ArrayHelper::map(static::find()->all(), $indexName, $valueName);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinksWorkToTag()
    {
        return $this->hasMany(LinksWorkToTag::className(), ['tag_id' => 'id']);
    }
}
