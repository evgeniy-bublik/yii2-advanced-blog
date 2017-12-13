<?php

namespace common\models\user;

use Yii;

/**
 * This is the model class for table "{{%user_proffessional_skills}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property string $color_bar
 * @property integer $display_order
 * @property integer $active
 */
class ProffessionalSkill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_proffessional_skills}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'required'],
            [['display_order', 'active'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['value', 'color_bar'], 'string', 'max' => 20],
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
            'value' => 'Value',
            'color_bar' => 'Color Bar',
            'display_order' => 'Display Order',
            'active' => 'Active',
        ];
    }
}
