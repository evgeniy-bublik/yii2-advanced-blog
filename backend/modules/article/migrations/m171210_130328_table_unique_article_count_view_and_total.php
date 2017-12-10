<?php

use yii\db\Migration;

/**
 * Class m171210_130328_table_unique_article_count_view_and_total
 */
class m171210_130328_table_unique_article_count_view_and_total extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        // общее количество просмотров публикации
        $this->addColumn('{{%article_articles}}', 'total_views', $this->integer()->unsigned()->defaultValue(0) . ' after meta_keywords');
        // количество уникальных просмотров публикации
        $this->addColumn('{{%article_articles}}', 'unique_views', $this->integer()->unsigned()->defaultValue(0) . ' after total_views');

        // таблица уникальных просмотров публикацц
        $this->createTable('{{%article_unique_article_views}}', [
            'id'          => $this->primaryKey(),
            'article_id'  => $this->integer(11)->notNull(),
            'ip'          => $this->string(16)->notNull(),
        ]);

        // связь с публикациями
        $this->createIndex('ix_article_unique_article_views_article_id', '{{%article_unique_article_views}}', 'article_id');
        $this->addForeignKey('fk_article_unique_article_views_article_id', '{{%article_unique_article_views}}', 'article_id', '{{%article_articles}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('{{%article_articles}}', 'total_views');
        $this->dropColumn('{{%article_articles}}', 'unique_views');

        $this->dropForeignKey('fk_article_unique_article_views_article_id', '{{%article_unique_article_views}}');
        $this->dropIndex('ix_article_unique_article_views_article_id', '{{%article_unique_article_views}}');

        $this->dropTable('{{%article_unique_article_views}}');
    }
}