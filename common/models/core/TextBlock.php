<?php

namespace common\models\core;

use Yii;

/**
 * This is the model class for table "{{%core_text_blocks}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $text
 * @property string $code
 * @property integer $active
 */
class TextBlock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%core_text_blocks}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'text', 'code'], 'required'],
            [['description', 'text'], 'string'],
            [['active'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 100],
            [['code'], 'unique'],
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
            'text' => 'Text',
            'code' => 'Code',
            'active' => 'Active',
        ];
    }
}
