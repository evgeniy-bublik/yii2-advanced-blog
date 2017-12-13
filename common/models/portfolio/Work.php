<?php

namespace common\models\portfolio;

use Yii;

/**
 * This is the model class for table "{{%portfolio_works}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $description
 * @property string $image
 * @property string $date
 * @property integer $active
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property LinksWorkToCategory[] $linksWorkToCategory
 * @property LinksWorkToTag[] $linksWorkToTag
 */
class Work extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%portfolio_works}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'alias'], 'required'],
            [['description', 'meta_keywords', 'meta_description'], 'string'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['active'], 'integer'],
            [['name', 'meta_title', 'alias'], 'string', 'max' => 255],
            [['image'], 'safe'],
            [['alias'], 'unique'],
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
            'alias' => 'Alias',
            'description' => 'Description',
            'image' => 'Image',
            'date' => 'Date',
            'active' => 'Active',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinksWorkToCategory()
    {
        return $this->hasMany(LinksWorkToCategory::className(), ['work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinksWorkToTag()
    {
        return $this->hasMany(LinksWorkToTag::className(), ['work_id' => 'id']);
    }
}
