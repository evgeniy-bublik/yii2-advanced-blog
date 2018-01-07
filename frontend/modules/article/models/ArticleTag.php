<?php

namespace app\modules\article\models;

use Yii;
use common\models\article\ArticleTag as BaseArticleTag;
use DateTime;
use yii\helpers\Url;

class ArticleTag extends BaseArticleTag
{
    /**
     * Generate list url for sitemap
     *
     * @param string $frequently Value frequently
     * @param string $priority Value priority
     * @return array
     */
    public static function getListItemsForSitemap($frequently, $priority = '0.5')
    {
        $items  = [];
        $tags   = static::find()
            ->where(['active' => 1])
            ->all();

        foreach ($tags as $tag) {
            $dateUpdateTag = new DateTime($tag->updated_at);

            $items[] = [
                'loc'         => Url::toRoute(['/article/articles/tag', 'tagАAlias' => $tag->alias], true),
                'lastmod'     => $dateUpdateTag->format(DateTime::W3C),
                'changefreq'  => $frequently,
                'priority'    => $priority,
            ];
        }

        return $items;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleLinksTagArticles()
    {
        return $this->hasMany(ArticleLinksTagArticle::className(), ['tag_id' => 'id']);
    }
}
