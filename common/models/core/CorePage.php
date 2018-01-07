<?php

namespace common\models\core;

use Yii;

/**
 * This is the model class for table "{{%core_pages}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $route
 * @property integer $active
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $updated_at
 */
class CorePage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%core_pages}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'route'], 'required'],
            [['active'], 'integer'],
            [['meta_keywords', 'meta_description'], 'string'],
            [['name', 'meta_title'], 'string', 'max' => 255],
            [['route'], 'string', 'max' => 100],
            [['route'], 'unique'],
            [['updated_at'], 'safe'],
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
            'route' => 'Route',
            'active' => 'Active',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'updated_at' => 'Updated At',
        ];
    }
}
