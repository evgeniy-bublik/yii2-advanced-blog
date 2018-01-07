<?php

namespace app\modules\article\models;

use Yii;
use app\models\user\models\User;
use common\models\article\Article as BaseArticle;
use common\behaviors\ThumbBehavior;
use yii\helpers\Url;
use yii\helpers\Html;
use DateTime;

class Article extends BaseArticle
{
    /**
     * @var string Path for article no image
     */
    const PATH_NO_IMAGE = '/files/no-image.jpeg';

    /**
     * Get no image path
     *
     * @return string
     */
    public function getNoImage()
    {
        return static::PATH_NO_IMAGE;
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function behaviors()
    {
        return  [
            'thumbBehavior' => [
                'class' => ThumbBehavior::className(),
                'fileAttribute' => 'image', //атрибут модели для картинки
                'saveDir' => 'files/articles/', //путь для сохранения картинок
                'thumbsSaveDir' => 'files/articles/thumbs/', // путь для сохранения превью картинок
                'previewSize' => [[700, 300]] //размеры генерируемых превью
            ],
        ];
    }

    /**
     * Get date article by format
     *
     * @param string $format Return date format by this format
     * @param bool $monthType
     * @return string
     */
    public function getDate($format = '{day}/{monthNumber}/{year}', $monthType = 'simple')
    {
        $articleDatePartials      = explode(' ', $this->date);
        $articleDayDatePartials   = explode('-', $articleDatePartials[ 0 ]);
        $articleTimeDatePartials  = explode(':', $articleDatePartials[ 1 ]);

        $monthType = ($monthType === 'simple') ? true : false;

        $monthName = $this->getMonthByNumber($articleDayDatePartials[ 1 ]);

        return strtr($format, [
            '{day}'         => $articleDayDatePartials[ 0 ],
            '{monthNumber}' => $articleDayDatePartials[ 1 ],
            '{monthName}'   => $monthName,
            '{year}'        => $articleDayDatePartials[ 2 ],
            '{hour}'        => $articleTimeDatePartials[ 0 ],
            '{minutes}'     => $articleTimeDatePartials[ 1 ],
            '{seconds}'     => $articleTimeDatePartials[ 2 ],
        ]);
    }

    /**
     * Generate string tags for this article
     *
     * @param string $template Template for tag url
     * @return string
     */
    public function getArticleTags($template = '{linkTag}')
    {
        $blockTags = null;

        foreach ($this->tags as $tag) {
            $tagUrl = Url::toRoute(['/article/articles/tag', 'tagAlias' => $tag->alias]);

            $blockTags .= strtr($template, [
                '{linkTag}'   => Html::a($tag->name, $tagUrl),
                '{tagUrl}'    => $tagUrl,
                '{tagTitle}'  => $tag->name,
            ]);
        }

        return $blockTags;
    }

    /**
     * Update count article view
     *
     * @return void
     */
    public function updateTotalViews()
    {
        $this->updateCounters(['total_views' => 1]);
    }

    /**
     * Check if view this article by ip
     *
     * @param string $ip
     * @return integer
     */
    public function hasUniqueView($ip)
    {
        return UniqueArticleView::find()
            ->where(['article_id' => $this->id, 'ip' => $ip])
            ->count();
    }

    /**
     * Update article count unique view
     *
     * @param string $ip
     * @return void
     */
    public function setUniqueView($ip)
    {
        $uniqueArticleView = new UniqueArticleView();

        $uniqueArticleView->article_id  = $this->id;
        $uniqueArticleView->ip          = $ip;

        $uniqueArticleView->save();

        $this->updateCounters(['unique_views' => 1]);
    }

    /**
     * Get name month by number
     *
     * @param integer $monthNumber Month number
     * @param bool $simple
     * @return string
     */
    protected function getMonthByNumber($monthNumber, $simple = true)
    {
        switch ((int)$monthNumber) {
            case 1:
                return ($simple) ? 'Январь' : 'Января';
            case 2:
                return ($simple) ? 'Февраль' : 'Февраля';
            case 3:
                return ($simple) ? 'Март' : 'Марта';
            case 4:
                return ($simple) ? 'Апрель' : 'Апреля';
            case 5:
                return ($simple) ? 'Май' : 'Мая';
            case 6:
                return ($simple) ? 'Июнь' : 'Июня';
            case 7:
                return ($simple) ? 'Июль' : 'Июля';
            case 8:
                return ($simple) ? 'Август' : 'Августа';
            case 9:
                return ($simple) ? 'Сентябрь' : 'Сентября';
            case 10:
                return ($simple) ? 'Октябрь' : 'Октября';
            case 11:
                return ($simple) ? 'Ноябрь' : 'Ноября';
            case 12:
                return ($simple) ? 'Декабрь' : 'Декабря';
        }
    }

    /**
     * Get first article category
     *
     * @return null|\app\modules\article\models\ArticleCategory
     */
    public function getCategory()
    {
        if ($this->categories) {
            $categories = $this->categories;

            return array_shift($categories);
        }

        return null;
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
        $items    = [];
        $articles = static::find()
            ->where(['active' => 1])
            ->andWhere(['<=', 'date', date('Y-m-d H:i:s')])
            ->all();

        foreach ($articles as $article) {
            $dateUpdateArticle = new DateTime($article->updated_at);

            $items[] = [
                'loc'         => Url::toRoute(['/article/articles/article', 'articleAlias' => $article->alias], true),
                'lastmod'     => $dateUpdateArticle->format(DateTime::W3C),
                'changefreq'  => $frequently,
                'priority'    => $priority,
            ];
        }

        return $items;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinksArticleCategory()
    {
        return $this->hasMany(ArticleLinksArticleCategory::className(), ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleLinksTagArticles()
    {
        return $this->hasMany(ArticleLinksTagArticle::className(), ['article_id' => 'id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getUniqueArticleViews()
    {
       return $this->hasMany(UniqueArticleView::className(), ['article_id' => 'id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getTags()
    {
        return $this->hasMany(ArticleTag::className(), ['id' => 'tag_id'])
            ->viaTable(ArticleLinksTagArticle::tableName(), ['article_id' => 'id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getCategories()
    {
        return $this->hasMany(ArticleCategory::className(), ['id' => 'category_id'])
            ->viaTable(ArticleLinksArticleCategory::tableName(), ['article_id' => 'id']);
    }
}
