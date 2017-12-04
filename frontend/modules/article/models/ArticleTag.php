<?php

namespace app\modules\article\models;

use Yii;
use common\models\article\ArticleTag as BaseArticleTag;

class ArticleTag extends BaseArticleTag
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleLinksTagArticles()
    {
        return $this->hasMany(ArticleLinksTagArticle::className(), ['tag_id' => 'id']);
    }
}