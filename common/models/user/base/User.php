<?php

namespace common\models\user\base;

use Yii;

/**
 * This is the model class for table "{{%user_users}}".
 *
 * @property integer $id
 * @property string $login
 * @property string $email
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $confirm_email_at
 * @property integer $blocked_at
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property UserUserProfiles[] $userProfile
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'email', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['confirm_email_at', 'blocked_at', 'created_at', 'updated_at'], 'integer'],
            [['login', 'email', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['login'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'confirm_email_at' => 'Confirm Email At',
            'blocked_at' => 'Blocked At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasMany(UserProfile::className(), ['user_id' => 'id']);
    }
}
