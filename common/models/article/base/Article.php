<?php
namespace common\models\article\base;

use Yii;
use common\models\user\User;

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
 *
 * @property User $user
 * @property ArticleLinksArticleCategory[] $articleLinksArticleCategory
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
            [['user_id', 'display_order', 'active'], 'integer'],
            [['title', 'alias', 'small_description', 'description'], 'required'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['title', 'alias', 'small_description', 'image', 'meta_title', 'meta_description', 'meta_keywords'], 'string', 'max' => 255],
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
