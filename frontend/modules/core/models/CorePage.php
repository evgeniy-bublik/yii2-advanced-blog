<?php

namespace app\modules\core\models;

use Yii;
use common\models\core\CorePage as BaseCorePage;
use yii\helpers\Url;
use DateTime;

class CorePage extends BaseCorePage
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
        $pages = static::find()
            ->where(['active' => 1])
            ->all();

        foreach ($pages as $page) {
            $dateUpdatePage = new DateTime($page->updated_at);

            $items[] = [
                'loc'         => Url::toRoute(['/' . $page->route], true),
                'lastmod'     => $dateUpdatePage->format(DateTime::W3C),
                'changefreq'  => $frequently,
                'priority'    => $priority,
            ];
        }

        return $items;
    }
}
