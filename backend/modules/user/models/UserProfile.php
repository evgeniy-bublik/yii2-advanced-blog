<?php
namespace backend\modules\user\models;

use Yii;
use common\models\user\UserProfile as BaseUserProfile;

class UserProfile extends BaseUserProfile
{

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}