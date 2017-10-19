<?php

namespace common\models\comment\base;

use Yii;
use common\models\user\User;

/**
 * This is the model class for table "{{%comment_comments}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_email
 * @property string $page
 * @property string $text
 * @property integer $active
 * @property integer $is_new
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment_comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'user_id', 'active', 'is_new'], 'integer'],
            [['user_name', 'user_email', 'page', 'text'], 'required'],
            [['text'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['user_name', 'user_email'], 'string', 'max' => 100],
            [['page'], 'string', 'max' => 255],
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
            'parent_id' => 'Parent ID',
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'user_email' => 'User Email',
            'page' => 'Page',
            'text' => 'Text',
            'active' => 'Active',
            'is_new' => 'Is New',
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
}
