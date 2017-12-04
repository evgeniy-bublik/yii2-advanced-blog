<?php

namespace app\modules\article\models;

use Yii;
use common\models\article\base\ArticleLinksArticleCategory as BaseArticleLinksArticleCategory;

class ArticleLinksArticleCategory extends BaseArticleLinksArticleCategory
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
    public function getCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'category_id']);
    }
}