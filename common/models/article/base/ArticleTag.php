<?php

namespace common\models\article\base;

use Yii;

/**
 * This is the model class for table "{{%article_tags}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $frequency
 * @property integer $display_order
 * @property integer $active
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property ArticleLinksTagArticle[] $articleLinksTagArticles
 */
class ArticleTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_tags}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['frequency', 'display_order', 'active'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['created_at', 'updated_at', 'deleted_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'frequency' => 'Frequency',
            'display_order' => 'Display Order',
            'active' => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleLinksTagArticles()
    {
        return $this->hasMany(ArticleLinksTagArticle::className(), ['tag_id' => 'id']);
    }
}
