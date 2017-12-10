<?php

namespace common\models\article\base;

use Yii;

/**
 * This is the model class for table "{{%article_unique_article_views}}".
 *
 * @property integer $id
 * @property integer $article_id
 * @property string $ip
 *
 * @property Article $article
 */
class UniqueArticleView extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_unique_article_views}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'ip'], 'required'],
            [['article_id'], 'integer'],
            [['ip'], 'string', 'max' => 16],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'ip' => 'Ip',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }
}
