<?php
namespace common\models\article;

use Yii;
use common\models\article\base\ArticleCategory as BaseArticleCategory;

class ArticleCategory extends BaseArticleCategory
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinksArticleCategories()
    {
        return $this->hasMany(ArticleLinksArticleCategory::className(), ['category_id' => 'id']);
    }
}
