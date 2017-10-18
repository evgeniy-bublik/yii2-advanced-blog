<?php

namespace common\models\article\base;

use Yii;
use common\models\user\base\User;

/**
 * This is the model class for table "{{%article_articles}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $alias
 * @property string $small_description
 * @property string $description
 * @property string $date
 * @property string $image
 * @property integer $display_order
 * @property integer $active
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 *
 * @property UserUsers $user
 * @property ArticleLinksArticleCategory[] $articleLinksArticleCategories
 * @property ArticleLinksTagArticle[] $articleLinksTagArticles
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_articles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'display_order', 'active', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['title', 'alias', 'small_description', 'description'], 'required'],
            [['description'], 'string'],
            [['date', 'image'], 'safe'],
            [['title', 'alias', 'small_description', 'meta_title', 'meta_description', 'meta_keywords'], 'string', 'max' => 255],
            [['alias'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'alias' => 'Alias',
            'small_description' => 'Small Description',
            'description' => 'Description',
            'date' => 'Date',
            'image' => 'Image',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleLinksArticleCategories()
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
}
