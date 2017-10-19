<?php

use yii\db\Migration;

class m171019_062432_create_table_comments extends Migration
{
    public function safeUp()
    {
        $tableSchema = Yii::$app->db->schema->getTableSchema('{{%user_users}}');

        if (!$tableSchema) {
            throw new \Exception("Table user_users not exist", 1);
        }

        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%comment_comments}}', [
            'id'          => $this->primaryKey(),
            'parent_id'   => $this->integer()->defaultValue(0),
            'user_id'     => $this->integer(11)->null(),
            'user_name'   => $this->string(100)->notNull(),
            'user_email'  => $this->string(100)->notNull(),
            'page'        => $this->string(255)->notNull(),
            'text'        => $this->text()->notNull(),
            'active'      => $this->smallInteger(1)->defaultValue(0),
            'is_new'      => $this->smallInteger(1)->defaultValue(1),
            'created_at'  => $this->timestamp()->null()->defaultValue(null),
            'updated_at'  => $this->timestamp()->null()->defaultValue(null),
            'deleted_at'  => $this->timestamp()->null()->defaultValue(null),
        ], $tableOptions);

        $this->createRelations();
    }

    public function safeDown()
    {
        $this->dropRelations();

        $this->dropTable('{{%comment_comments}}');
    }

    private function createRelations()
    {
        // связь комментариев с пользователем
        $this->createIndex('ix_comment_comments_user_id', '{{%comment_comments}}', 'user_id');
        $this->addForeignKey('fk_comment_comments_user_id', '{{%comment_comments}}', 'user_id', '{{%user_users}}', 'id', 'SET NULL', 'CASCADE');

        $this->createIndex('ix_comment_comments_page', '{{%comment_comments}}', 'page');
    }

    private function dropRelations()
    {
        $this->dropForeignKey('fk_comment_comments_user_id', '{{%comment_comments}}');
        $this->dropIndex('ix_comment_comments_user_id', '{{%comment_comments}}');

        $this->dropIndex('ix_comment_comments_page', '{{%comment_comments}}');
    }
}