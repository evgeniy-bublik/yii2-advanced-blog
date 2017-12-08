<?php

namespace app\modules\article\models;

use Yii;
use app\models\user\models\User;
use common\models\article\Article as BaseArticle;
use common\behaviors\ThumbBehavior;
use yii\helpers\Url;
use yii\helpers\Html;

class Article extends BaseArticle
{
    const PATH_NO_IMAGE = '/files/no-image.jpeg';

    public function getNoImage()
    {
        return static::PATH_NO_IMAGE;
    }

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

        return $articleDayDatePartials[ 2 ] . ' ' . $this->getMonthByNumber($articleDayDatePartials[ 1 ]) . ' ' . $articleDayDatePartials[ 0 ];
    }

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

    public function getTags()
    {
        return $this->hasMany(ArticleTag::className(), ['id' => 'tag_id'])
            ->viaTable(ArticleLinksTagArticle::tableName(), ['article_id' => 'id']);
    }

    public function getCategories()
    {
        return $this->hasMany(ArticleCategory::className(), ['id' => 'category_id'])
            ->viaTable(ArticleLinksArticleCategory::tableName(), ['article_id' => 'id']);
    }
}