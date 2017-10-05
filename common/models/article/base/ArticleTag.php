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
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
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
            [['name', 'created_at', 'updated_at'], 'required'],
            [['frequency', 'display_order', 'active', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
