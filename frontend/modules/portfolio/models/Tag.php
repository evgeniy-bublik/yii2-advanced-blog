<?php

namespace app\modules\portfolio\models;

use Yii;
use common\models\portfolio\Tag as BaseTag;
use yii\helpers\Url;
use DateTime;

class Tag extends BaseTag
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
        $items = [];
        $tags = static::find()
            ->all();

        foreach ($tags as $tag) {
            $dateUpdateTag = new DateTime($tag->updated_at);

            $items[] = [
                'loc'         => Url::toRoute(['/portfolio/works/tag', 'tagAlias' => $tag->alias], true),
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
    public function getLinksWorkToTag()
    {
        return $this->hasMany(LinksWorkToTag::className(), ['tag_id' => 'id']);
    }
}
