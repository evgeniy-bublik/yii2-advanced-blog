<?php

use yii\db\Migration;

class m171020_140644_create_core_settings extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%core_settings}}', [
            'id'              => $this->primaryKey(),
            'key'             => $this->string(255)->unique()->notNull(),
            'value'           => $this->text()->null()->defaultValue(null),
        ], $tableOptions);

        $this->insertDefaultValues();
    }

    public function safeDown()
    {
        $this->dropTable('{{%core_settings}}');
    }

    private function insertDefaultValues()
    {
        $this->batchInsert('{{%core_settings}}', ['key', 'value'], [
            [
                'key' => 'admin_email',
                'value' => '',
            ],
            [
                'key' => 'support_email',
                'value' => '',
            ],
            [
                'key' => 'admin_phone',
                'value' => '',
            ],
            [
                'key' => 'admin_address',
                'value' => '',
            ],
            [
                'key' => 'smtp_username',
                'value' => '',
            ],
            [
                'key' => 'smtp_password',
                'value' => '',
            ],
            [
                'key' => 'smtp_host',
                'value' => '',
            ],
            [
                'key' => 'smtp_port',
                'value' => '',
            ],
            [
                'key' => 'smtp_encryption',
                'value' => '',
            ],
        ]);
    }
}
