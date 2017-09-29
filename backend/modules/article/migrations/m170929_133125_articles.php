<?php

use yii\db\Migration;

class m170929_133125_articles extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%article_categories}}', [
            'id'                => $this->primaryKey(),
            'parent_id'         => $this->integer()->defaultValue(0),
            'title'             => $this->string(255)->notNull(),
            'alias'             => $this->string(255)->notNull()->unique(),
            'description'       => $this->text()->null(),
            'display_order'     => $this->integer()->defaultValue(0),
            'active'            => $this->smallInteger(1)->defaultValue(0),
            'meta_title'        => $this->string(255)->null(),
            'meta_description'  => $this->string(255)->null(),
            'meta_keywords'     => $this->string(255)->null(),
            'created_at'        => $this->integer()->notNull(),
            'updated_at'        => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%article_articles}}', [
            'id'                => $this->primaryKey(),
            'user_id'           => $this->integer(11)->null(),
            'title'             => $this->string(255)->notNull(),
            'alias'             => $this->string(255)->notNull()->unique(),
            'small_description' => $this->string(255)->notNull(),
            'description'       => $this->text()->notNull(),
            'date'              => $this->timestamp()->notNull(),
            'image'             => $this->string(255)->defaultValue(NULL),
            'display_order'     => $this->integer()->defaultValue(0),
            'active'            => $this->smallInteger(1)->defaultValue(0),
            'meta_title'        => $this->string(255)->null(),
            'meta_description'  => $this->string(255)->null(),
            'meta_keywords'     => $this->string(255)->null(),
        ], $tableOptions);

        $this->createTable('{{%article_links_article_category}}', [
            'id'          => $this->primaryKey(),
            'article_id'  => $this->integer(11)->notNull(),
            'category_id' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createRelations();
    }

    public function safeDown()
    {
        $this->dropRelations();

        $this->dropTable('{{%article_links_article_category}}');
        $this->dropTable('{{%article_articles}}');
        $this->dropTable('{{%article_categories}}');
    }

    private function createRelations()
    {
        $this->createIndex('ix_article_articles_user_id', '{{%article_articles}}', 'user_id');
        $this->addForeignKey('fk_article_articles_user_id', '{{%article_articles}}', 'user_id', '{{%user_users}}', 'id', 'SET NULL', 'CASCADE');

        $this->createIndex('ix_article_links_article_category_article_id', '{{%article_links_article_category}}', 'article_id');
        $this->createIndex('ix_article_links_article_category_category_id', '{{%article_links_article_category}}', 'category_id');

        $this->addForeignKey('fk_article_links_article_category_article_id', '{{%article_links_article_category}}', 'article_id', '{{%article_articles}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_article_links_article_category_category_id', '{{%article_links_article_category}}', 'category_id', '{{%article_categories}}', 'id', 'CASCADE', 'CASCADE');
    }

    private function dropRelations()
    {
        $this->dropForeignKey('fk_article_articles_user_id', '{{%article_articles}}');
        $this->dropIndex('ix_article_articles_user_id', '{{%article_articles}}');

        $this->dropForeignKey('fk_article_links_article_category_article_id', '{{%article_links_article_category}}');
        $this->dropForeignKey('fk_article_links_article_category_category_id', '{{%article_links_article_category}}');
        $this->dropIndex('ix_article_links_article_category_article_id', '{{%article_links_article_category}}');
        $this->dropIndex('ix_article_links_article_category_category_id', '{{%article_links_article_category}}');
    }
}
