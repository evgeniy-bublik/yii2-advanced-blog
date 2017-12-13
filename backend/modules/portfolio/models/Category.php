<?php

namespace app\modules\portfolio\models;

use Yii;
use common\models\portfolio\Category as BaseCategory;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use evgeniydev\yii2\behaviors\FormCreatorBehavior;

class Category extends BaseCategory
{
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
                    'description' => [
                        'type' => FormCreatorBehavior::TEXTAREA_TYPE,
                        'inputOptions' => [
                            'rows' => 5,
                        ],
                    ],
                    'display_order',
                ],
            ],
        ];
    }

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
                [['display_order'], 'default', 'value' => 0],
            ]
        );
    }

    /**
     * Generate hash map table by indexName, valueName
     *
     * @param string $indexName Field name with be key array
     * @param string $valueName Field name with be value array
     * @return array
     */
    public static function hashListCategories($indexName = 'id', $valueName = 'name')
    {
        return ArrayHelper::map(static::find()->all(), $indexName, $valueName);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinksWorkToCategory()
    {
        return $this->hasMany(LinksWorkToCategory::className(), ['category_id' => 'id']);
    }
}
