<?php
namespace app\modules\article\models;

use Yii;
use app\models\user\models\User;
use common\models\article\Article as BaseArticle;
use yii\behaviors\TimestampBehavior;
use zxbodya\yii2\imageAttachment\ImageAttachmentBehavior;
use common\behaviors\ThumbBehavior;

class Article extends BaseArticle
{
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
                'value' => time(),
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
}
