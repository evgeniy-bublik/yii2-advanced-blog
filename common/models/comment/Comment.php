<?php

namespace common\models\comment;

use Yii;
use common\models\comment\base\Comment as BaseComment;
use common\models\user\User;

class Comment extends BaseComment
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}