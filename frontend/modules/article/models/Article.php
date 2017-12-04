<?php

namespace app\modules\article\models;

use Yii;
use app\models\user\models\User;
use common\models\article\Article as BaseArticle;
use common\behaviors\ThumbBehavior;

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

    public function getDate()
    {
        $articleDatePartials = explode(' ', $this->date);

        $articleDayDatePartials = explode('-', $articleDatePartials[ 0 ]);

        return $articleDayDatePartials[ 2 ] . ' ' . $this->getMonthByNumber($articleDayDatePartials[ 1 ]) . ' ' . $articleDayDatePartials[ 0 ];
    }

    protected function getMonthByNumber($monthNumber)
    {
        switch ((int)$monthNumber) {
            case 1:
                return 'Января';
            case 2:
                return 'Февраля';
            case 3:
                return 'Марта';
            case 4:
                return 'Апреля';
            case 5:
                return 'Мая';
            case 6:
                return 'Июня';
            case 7:
                return 'Июля';
            case 8:
                return 'Августа';
            case 9:
                return 'Сентября';
            case 10:
                return 'Октября';
            case 11:
                return 'Ноября';
            case 12:
                return 'Декабря';
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