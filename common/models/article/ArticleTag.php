<?php
namespace common\models\article;

use Yii;
use common\models\article\base\ArticleTag as BaseArticleTag;

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
