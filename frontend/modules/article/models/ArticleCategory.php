<?php

namespace app\modules\article\models;

use Yii;
use common\models\article\ArticleCategory as BaseArticleCategory;
use yii\db\Expression;

class ArticleCategory extends BaseArticleCategory
{
    public function getCountArticles()
    {
        return $this->getArticles()
            ->where(['active' => 1])
            ->andWhere(['<=', 'date', new Expression('NOW()')])
            ->count();
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinksArticleCategories()
    {
        return $this->hasMany(ArticleLinksArticleCategory::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['id' => 'article_id'])
            ->viaTable(ArticleLinksArticleCategory::tableName(), ['category_id' => 'id']);
    }
}