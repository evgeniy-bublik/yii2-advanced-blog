<?php

namespace common\models\portfolio;

use Yii;

/**
 * This is the model class for table "{{%portfolio_categories}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $display_order
 * @property string $created_at
 * @property string $updated_at
 *
 * @property LinksWorkToCategory[] $linksWorkToCategory
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%portfolio_categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['display_order'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
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
            'description' => 'Description',
            'display_order' => 'Display Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinksWorkToCategory()
    {
        return $this->hasMany(LinksWorkToCategory::className(), ['category_id' => 'id']);
    }
}
