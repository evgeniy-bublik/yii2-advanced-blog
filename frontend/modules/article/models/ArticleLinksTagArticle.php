<?php

namespace app\modules\article\models;

use Yii;
use common\models\article\ArticleLinksTagArticle as BaseArticleLinksTagArticle;

class ArticleLinksTagArticle extends BaseArticleLinksTagArticle
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(ArticleTag::className(), ['id' => 'tag_id']);
    }
}