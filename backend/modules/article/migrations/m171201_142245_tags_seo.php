<?php

use yii\db\Migration;

/**
 * Class m171201_142245_tags_seo
 */
class m171201_142245_tags_seo extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%article_tags}}', 'meta_title', $this->string(255)->null() . ' after active');
        $this->addColumn('{{%article_tags}}', 'meta_keywords', $this->text()->null() . ' after meta_title');
        $this->addColumn('{{%article_tags}}', 'meta_description', $this->text()->null() . ' after meta_keywords');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('{{%article_tags}}', 'meta_title');
        $this->dropColumn('{{%article_tags}}', 'meta_keywords');
        $this->dropColumn('{{%article_tags}}', 'meta_description');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171201_142245_tags_seo cannot be reverted.\n";

        return false;
    }
    */
}
