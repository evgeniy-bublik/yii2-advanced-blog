<?php

namespace common\models\portfolio;

use Yii;

/**
 * This is the model class for table "{{%portfolio_tags}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $description
 * @property integer $display_order
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property LinksWorkToTag[] $linksWorkToTag
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%portfolio_tags}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias'], 'required'],
            [['display_order'], 'integer'],
            [['description', 'meta_keywords', 'meta_description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'alias'], 'string', 'max' => 100],
            [['meta_title'], 'string', 'max' => 255],
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
            'alias'   => 'Alias',
            'description' => 'Description',
            'display_order' => 'Display Order',
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
    public function getLinksWorkToTag()
    {
        return $this->hasMany(LinksWorkToTag::className(), ['tag_id' => 'id']);
    }
}
