<?php

use yii\db\Migration;

/**
 * Class m171213_202212_my_skills
 */
class m171213_202212_my_skills extends Migration
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

        $this->createTable('{{%user_proffessional_skills}}', [
            'id'            => $this->primaryKey(),
            'name'          => $this->string(100)->notNull(),
            'value'         => $this->string(20)->notNull(),
            'color_bar'     => $this->string(20)->null(),
            'display_order' => $this->integer()->defaultValue(0),
            'active'        => $this->smallInteger(1)->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_proffessional_skills}}');
    }
}
