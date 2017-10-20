<?php

namespace common\models\article\base;

use Yii;

/**
 * This is the model class for table "{{%article_categories}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property integer $display_order
 * @property integer $active
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property ArticleLinksArticleCategory[] $articleLinksArticleCategories
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'display_order', 'active'], 'integer'],
            [['title', 'alias'], 'required'],
            [['description'], 'string'],
            [['title', 'alias', 'meta_title', 'meta_description', 'meta_keywords'], 'string', 'max' => 255],
            [['alias'], 'unique'],
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
            'parent_id' => 'Parent ID',
            'title' => 'Title',
            'alias' => 'Alias',
            'description' => 'Description',
            'display_order' => 'Display Order',
            'active' => 'Active',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleLinksArticleCategories()
    {
        return $this->hasMany(ArticleLinksArticleCategory::className(), ['category_id' => 'id']);
    }
}
