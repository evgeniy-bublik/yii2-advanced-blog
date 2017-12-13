<?php

use yii\db\Migration;

/**
 * Class m171211_105952_portfolio
 */
class m171211_105952_portfolio extends Migration
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

        $this->createTable('{{%portfolio_tags}}', [
            'id'                => $this->primaryKey(),
            'name'              => $this->string(100)->notNull(),
            'alias'             => $this->string(100)->unique()->notNull(),
            'description'       => $this->text()->null(),
            'display_order'     => $this->integer()->defaultValue(0),
            'meta_title'        => $this->string(255)->null()->defaultValue(null),
            'meta_keywords'     => $this->text()->null()->defaultValue(null),
            'meta_description'  => $this->text()->null()->defaultValue(null),
            'created_at'        => $this->timestamp()->null()->defaultValue(null),
            'updated_at'        => $this->timestamp()->null()->defaultValue(null),
        ], $tableOptions);

        $this->createTable('{{%portfolio_categories}}', [
            'id'                => $this->primaryKey(),
            'name'              => $this->string(100)->notNull(),
            'description'       => $this->text()->null(),
            'display_order'     => $this->integer()->defaultValue(0),
            'created_at'        => $this->timestamp()->null()->defaultValue(null),
            'updated_at'        => $this->timestamp()->null()->defaultValue(null),
        ], $tableOptions);

        $this->createTable('{{%portfolio_works}}', [
            'id'                => $this->primaryKey(),
            'name'              => $this->string(255)->notNull(),
            'alias'             => $this->string(255)->unique()->notNull(),
            'description'       => $this->text()->notNull(),
            'image'             => $this->string(255)->defaultValue(null),
            'date'              => $this->date(),
            'active'            => $this->smallInteger(1)->defaultValue(0),
            'meta_title'        => $this->string(255)->null()->defaultValue(null),
            'meta_keywords'     => $this->text()->null()->defaultValue(null),
            'meta_description'  => $this->text()->null()->defaultValue(null),
            'created_at'        => $this->timestamp()->null()->defaultValue(null),
            'updated_at'        => $this->timestamp()->null()->defaultValue(null),
        ], $tableOptions);

        $this->createTable('{{%portfolio_links_work_to_category}}', [
            'id'          => $this->primaryKey(),
            'work_id'     => $this->integer(11)->notNull(),
            'category_id' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createTable('{{%portfolio_links_work_to_tag}}', [
            'id'      => $this->primaryKey(),
            'work_id' => $this->integer(11)->notNull(),
            'tag_id'  => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createRelations();
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropRelations();

        $this->dropTable('{{%portfolio_links_work_to_tag}}');
        $this->dropTable('{{%portfolio_links_work_to_category}}');
        $this->dropTable('{{%portfolio_works}}');
        $this->dropTable('{{%portfolio_categories}}');
        $this->dropTable('{{%portfolio_tags}}');
    }

    /**
     * Create relations from portfolio
     */
    private function createRelations()
    {
        // создание связей многие ко многим между таблицами портфолио и тегами
        $this->createIndex('ix_portfolio_links_work_to_tag_work_id', '{{%portfolio_links_work_to_tag}}', 'work_id');
        $this->addForeignKey('fk_portfolio_links_work_to_tag_work_id', '{{%portfolio_links_work_to_tag}}', 'work_id', '{{%portfolio_works}}', 'id', 'CASCADE', 'CASCADE');
        $this->createIndex('ix_portfolio_links_work_to_tag_tag_id', '{{%portfolio_links_work_to_tag}}', 'tag_id');
        $this->addForeignKey('fk_portfolio_links_work_to_tag_tag_id', '{{%portfolio_links_work_to_tag}}', 'tag_id', '{{%portfolio_tags}}', 'id', 'CASCADE', 'CASCADE');

        // создание связей многие ко многим между таблицами портфолио и категориями
        $this->createIndex('ix_portfolio_links_work_to_category_work_id', '{{%portfolio_links_work_to_category}}', 'work_id');
        $this->addForeignKey('fk_portfolio_links_work_to_category_work_id', '{{%portfolio_links_work_to_category}}', 'work_id', '{{%portfolio_works}}', 'id', 'CASCADE', 'CASCADE');
        $this->createIndex('ix_portfolio_links_work_to_category_category_id', '{{%portfolio_links_work_to_category}}', 'category_id');
        $this->addForeignKey('fk_portfolio_links_work_to_category_category_id', '{{%portfolio_links_work_to_category}}', 'category_id', '{{%portfolio_categories}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * Remove relations from portfolio
     */
    private function dropRelations()
    {
        // удаление связей между таблицами портфолио и тегами
        $this->dropForeignKey('fk_portfolio_links_work_to_tag_work_id', '{{%portfolio_links_work_to_tag}}');
        $this->dropForeignKey('fk_portfolio_links_work_to_tag_tag_id', '{{%portfolio_links_work_to_tag}}');
        $this->dropIndex('ix_portfolio_links_work_to_tag_work_id', '{{%portfolio_links_work_to_tag}}');
        $this->dropIndex('ix_portfolio_links_work_to_tag_tag_id', '{{%portfolio_links_work_to_tag}}');

        // удаление связей между таблицами портфолио и категориями
        $this->dropForeignKey('fk_portfolio_links_work_to_category_work_id', '{{%portfolio_links_work_to_category}}');
        $this->dropForeignKey('fk_portfolio_links_work_to_category_category_id', '{{%portfolio_links_work_to_category}}');
        $this->dropIndex('ix_portfolio_links_work_to_category_work_id', '{{%portfolio_links_work_to_category}}', 'work_id');
        $this->dropIndex('ix_portfolio_links_work_to_category_category_id', '{{%portfolio_links_work_to_category}}', 'category_id');
    }
}
