<?php

use yii\db\Migration;

/**
 * Class m171213_194517_text_blocks
 */
class m171213_194517_text_blocks extends Migration
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

        $this->createTable('{{%core_text_blocks}}', [
            'id'          => $this->primaryKey(),
            'name'        => $this->string(255)->notNull(),
            'description' => $this->text()->null(),
            'text'        => $this->text()->notNull(),
            'code'        => $this->string(100)->unique()->notNull(),
            'active'      => $this->smallInteger(1)->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%core_text_blocks}}');
    }
}
