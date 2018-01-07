<?php

namespace app\modules\core\models;

use yii\helpers\ArrayHelper;
use app\modules\core\models\CorePage;
use app\modules\article\models\Article;
use app\modules\portfolio\models\Work;
use app\modules\portfolio\models\Tag as PortfolioTag;
use app\modules\article\models\ArticleTag;
use app\modules\article\models\ArticleCategory;

/**
 * Class for generate sitemap
 */
class SitemapGenerator
{
    /**
     * @var string Always frequently for url
     */
    const CHANGEFREQ_ALWAYS = 'always';

    /**
     * @var string Hourly frequently for url
     */
    const CHANGEFREQ_HOURLY = 'hourly';

    /**
     * @var string Daily frequently for url
     */
    const CHANGEFREQ_DAILY = 'daily';

    /**
     * @var string Weekly frequently for url
     */
    const CHANGEFREQ_WEEKLY = 'weekly';

    /**
     * @var string Monthly frequently for url
     */
    const CHANGEFREQ_MONTHLY = 'monthly';

    /**
     * @var string Yearly frequently for url
     */
    const CHANGEFREQ_YEARLY = 'yearly';

    /**
     * @var string Never frequently for url
     */
    const CHANGEFREQ_NEWER = 'never';

    /**
     * Generate list url for sitemap
     *
     * @return array
     */
    public static function generate()
    {
        $urls     = [];
        $classes  = [
            [
                'class'       => CorePage::className(),
                'frequently'  => self::CHANGEFREQ_MONTHLY,
                'priority'    => '0.5',
            ],
            [
                'class'       => PortfolioTag::className(),
                'frequently'  => self::CHANGEFREQ_MONTHLY,
                'priority'    => '0.5',
            ],
            [
                'class'       => Work::className(),
                'frequently'  => self::CHANGEFREQ_MONTHLY,
                'priority'    => '0.5',
            ],
            [
                'class'       => Article::className(),
                'frequently'  => self::CHANGEFREQ_WEEKLY,
                'priority'    => '0.7',
            ],
            [
                'class'       => ArticleTag::className(),
                'frequently'  => self::CHANGEFREQ_MONTHLY,
                'priority'    => '0.7',
            ],
            [
                'class'       => ArticleCategory::className(),
                'frequently'  => self::CHANGEFREQ_MONTHLY,
                'priority'    => '0.7',
            ],
        ];

        foreach ($classes as $itemClass) {

            $urls = ArrayHelper::merge(
                $urls,
                call_user_func_array(
                    [
                        $itemClass[ 'class' ],
                        'getListItemsForSitemap'
                    ],
                    [
                        $itemClass[ 'frequently' ],
                        $itemClass[ 'priority' ]
                    ]
                )
            );
        }

        return $urls;
    }
}
