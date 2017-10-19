<?php

namespace app\modules\comment\models;

use Yii;
use common\models\comment\Comment as BaseComment;
use app\modules\user\models\User;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

class Comment extends BaseComment
{
    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                ['page', 'url'],
            ]
        );
    }

    public function behaviors()
    {
        return  [
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }

    public function attachUser()
    {
        $this->user_id     = Yii::$app->user->identity->id;
        $this->user_email  = Yii::$app->user->identity->email;
        $this->user_name   = Yii::$app->user->identity->userProfile->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}