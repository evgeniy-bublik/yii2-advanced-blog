<?php

use yii\db\Migration;

class m171020_140644_create_core_settings extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%core_settings}}', [
            'id'              => $this->primaryKey(),
            'admin_email'     => $this->string(100)->null()->defaultValue(null),
            'support_email'   => $this->string(100)->null()->defaultValue(null),
            'admin_phone'     => $this->string(15)->null()->defaultValue(null),
            'admin_address'   => $this->string(255)->null()->defaultValue(null),
            'smtp_username'   => $this->string(100)->null()->defaultValue(null),
            'smtp_password'   => $this->string(100)->null()->defaultValue(null),
            'smtp_host'       => $this->string(100)->null()->defaultValue(null),
            'smtp_port'       => $this->integer()->null()->defaultValue(null),
            'smtp_encryption' => $this->string(10)->null()->defaultValue(null),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%core_settings}}');
    }
}
