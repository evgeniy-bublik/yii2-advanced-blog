<?php

use yii\db\Migration;

class m171016_084159_core_social_links extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%core_social_links}}', [
            'id'            => $this->primaryKey(),
            'name'          => $this->string(50)->notNull(),
            'link_class'    => $this->string(255)->null()->defaultValue(null),
            'href'          => $this->string(255)->notNull(),
            'display_order' => $this->integer(11)->null()->defaultValue(0),
            'active'        => $this->smallInteger(1)->defaultValue(0),
            'created_at'    => $this->timestamp()->null()->defaultValue(null),
            'updated_at'    => $this->timestamp()->null()->defaultValue(null),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%core_social_links}}');
    }
}
