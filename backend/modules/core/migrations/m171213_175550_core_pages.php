<?php

use yii\db\Migration;

/**
 * Class m171213_175550_core_pages
 */
class m171213_175550_core_pages extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%core_pages}}', [
            'id'                => $this->primaryKey(),
            'name'              => $this->string(255)->notNull(),
            'route'             => $this->string(100)->unique()->notNull(),
            'active'            => $this->smallInteger(1)->defaultValue(0),
            'meta_title'        => $this->string(255)->null(),
            'meta_keywords'     => $this->text()->null(),
            'meta_description'  => $this->text()->null(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%core_pages}}');
    }
}