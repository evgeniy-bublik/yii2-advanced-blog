<?php

namespace common\models\core\base;

use Yii;

/**
 * This is the model class for table "{{%core_social_links}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $link_class
 * @property string $href
 * @property integer $display_order
 * @property integer $active
 * @property string $created_at
 * @property string $updated_at
 */
class SocialLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%core_social_links}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'href'], 'required'],
            [['display_order', 'active'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['link_class', 'href'], 'string', 'max' => 255],
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
            'link_class' => 'Link Class',
            'href' => 'Href',
            'display_order' => 'Display Order',
            'active' => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
