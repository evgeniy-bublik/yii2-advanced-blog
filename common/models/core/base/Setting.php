<?php

namespace common\models\core\base;

use Yii;

/**
 * This is the model class for table "{{%core_settings}}".
 *
 * @property integer $id
 * @property string $admin_email
 * @property string $support_email
 * @property string $admin_phone
 * @property string $admin_address
 * @property string $smtp_username
 * @property string $smtp_password
 * @property string $smtp_host
 * @property integer $smtp_port
 * @property string $smtp_encryption
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%core_settings}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_email', 'support_email'], 'required'],
            [['smtp_port'], 'integer'],
            [['admin_email', 'support_email', 'smtp_username', 'smtp_password', 'smtp_host'], 'string', 'max' => 100],
            [['admin_phone'], 'string', 'max' => 15],
            [['admin_address'], 'string', 'max' => 255],
            [['smtp_encryption'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_email' => 'Admin Email',
            'support_email' => 'Support Email',
            'admin_phone' => 'Admin Phone',
            'admin_address' => 'Admin Address',
            'smtp_username' => 'Smtp Username',
            'smtp_password' => 'Smtp Password',
            'smtp_host' => 'Smtp Host',
            'smtp_port' => 'Smtp Port',
            'smtp_encryption' => 'Smtp Encryption',
        ];
    }
}
