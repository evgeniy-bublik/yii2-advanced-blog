<?php

namespace app\modules\article\models;

use Yii;
use common\models\article\ArticleCategory as BaseArticleCategory;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class ArticleCategory extends BaseArticleCategory
{

    public function behaviors()
    {
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
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
