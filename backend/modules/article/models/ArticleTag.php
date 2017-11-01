<?php

namespace app\modules\article\models;

use Yii;
use common\models\article\ArticleTag as BaseArticleTag;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

class ArticleTag extends BaseArticleTag
{
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

    public function behaviors()
    {
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleLinksTagArticles()
    {
        return $this->hasMany(ArticleLinksTagArticle::className(), ['tag_id' => 'id']);
    }
}
