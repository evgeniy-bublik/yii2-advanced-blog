<?php

namespace app\modules\article\models;

use Yii;
use common\models\article\ArticleCategory as BaseArticleCategory;
use yii\db\Expression;
use DateTime;
use yii\helpers\Url;

class ArticleCategory extends BaseArticleCategory
{
    /**
     * Get count articles in current category
     *
     * @return integer
     */
    public function getCountArticles()
    {
        return $this->getArticles()
            ->where(['active' => 1])
            ->andWhere(['<=', 'date', new Expression('NOW()')])
            ->count();
    }

    /**
     * Generate list url for sitemap
     *
     * @param string $frequently Value frequently
     * @param string $priority Value priority
     * @return array
     */
    public static function getListItemsForSitemap($frequently, $priority = '0.5')
    {
        $items      = [];
        $categories = static::find()
            ->where(['active' => 1])
            ->all();

        foreach ($categories as $category) {
            $dateUpdateCategory = new DateTime($category->updated_at);

            $items[] = [
                'loc'         => Url::toRoute(['/article/articles/category', 'categoryAlias' => $category->alias], true),
                'lastmod'     => $dateUpdateCategory->format(DateTime::W3C),
                'changefreq'  => $frequently,
                'priority'    => $priority,
            ];
        }

        return $items;
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
