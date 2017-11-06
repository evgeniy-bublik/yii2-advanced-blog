<?php

namespace app\modules\article\models;

use Yii;
use app\models\user\models\User;
use common\models\article\Article as BaseArticle;
use yii\behaviors\TimestampBehavior;
use common\behaviors\ThumbBehavior;
use common\behaviors\DateTimeBehavior;
use yii\helpers\ArrayHelper;
use yii\db\Expression;

class Article extends BaseArticle
{
    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                ['alias', 'unique'],
                ['alias', 'match', 'pattern' => '/^[a-z\d-]+[a-z\d]$/'],
                //['tagsIds', 'exist', 'targetClass' => ArticleTag::className(), 'targetAttribute' => 'id'],
                ['tagsIds', 'safe'],
            ]
        );
    }

    public function behaviors()
    {
        return  [
            'thumbBehavior' => [
                'class' => ThumbBehavior::className(),
                'fileAttribute' => 'image', //атрибут модели для картинки
                'saveDir' => 'files/articles/', //путь для сохранения картинок
                'thumbsSaveDir' => 'files/articles/thumbs/', // путь для сохранения превью картинок
                'previewSize' => [[100, 100], [250, 250]] //размеры генерируемых превью
            ],
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
            'dateBehavior' => [
                'class' => DateTimeBehavior::className(),
                'dateTimeFields' => [
                    'date'
                ],
            ],
            'tagsBahevior' => [
                'class' => \voskobovich\behaviors\ManyToManyBehavior::className(),
                'relations' => [
                    'tagsIds' => 'tags',
                ],
            ],
        ];
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

    public function getListTags()
    {
        return ArrayHelper::map(ArticleTag::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
    }
}
