<?php
namespace app\modules\user\models;

use Yii;
use common\models\user\User as BaseUser;
use yii\behaviors\TimestampBehavior;

class User extends BaseUser
{

    public function behaviors()
    {
        return  [
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
                'value' => time(),
            ],
        ];
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::find()
                            ->where(['email' => $email])
                            ->andWhere(['not', ['confirm_email_at' => NULL]])
                            ->andWhere(['is', 'blocked_at', NULL])
                            ->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::className(), ['user_id' => 'id']);
    }

}