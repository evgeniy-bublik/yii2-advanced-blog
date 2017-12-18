<?php

namespace app\modules\core\models;

use Yii;
use common\models\core\Setting as BaseSetting;

class Setting extends BaseSetting
{

    public static function getRules()
    {
        return [
            [['admin_email', 'support_email'], 'email'],
            [['admin_email', 'support_email', 'admin_skype', 'admin_linkedin'], 'string', ['max' => 100]],
            [['admin_address'], 'string'],
            [['admin_phone'], 'string', ['max' => 15]],
            [['smtp_username', 'smtp_password', 'smtp_password', 'smtp_host'], 'string', ['max' => 50]],
            [['smtp_port'], 'integer', ['max' => 65535]],
            [['smtp_encryption'], 'string', ['max' => 10]],
            [['posts_on_page'], 'integer'],
            [['order_posts'], 'in', ['range' => self::getListPostTypesOrder()]],
            [['admin_photo'], 'safe'],
        ];
    }

    public static function getListPostTypesOrder()
    {
        return [
            'id_asc',
            'id_desc',
            'title_asc',
            'title_desc',
            'date_asc',
            'date_desc',
            'created_at_asc',
            'created_at_desc',
            'random',
        ];
    }

    public static function getListPostOrders()
    {
        return [
            'id_asc'          => 'ID ASC',
            'id_desc'         => 'ID_DESC',
            'title_asc'       => 'Title ASC',
            'title_desc'      => 'Title DESC',
            'date_asc'        => 'Date ASC',
            'date_desc'       => 'Date DESC',
            'created_at_asc'  => 'Created at ASC',
            'created_at_desc' => 'Created at DESC',
            'random'          => 'Random',
        ];
    }

}