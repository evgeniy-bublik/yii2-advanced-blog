<?php
namespace backend\modules\user\models;

use Yii;
use common\models\user\User as BaseUser;

class User extends BaseUser
{

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
                            ->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasMany(UserProfile::className(), ['user_id' => 'id']);
    }

}