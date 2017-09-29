<?php

namespace common\models\user\base;

use Yii;

/**
 * This is the model class for table "{{%user_user_profiles}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $surname
 * @property string $name
 * @property string $patronimyc
 * @property string $phone
 *
 * @property UserUsers $user
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_user_profiles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['surname', 'name', 'patronimyc'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 20],
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
            'user_id' => 'User ID',
            'surname' => 'Surname',
            'name' => 'Name',
            'patronimyc' => 'Patronimyc',
            'phone' => 'Phone',
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
