<?php

use yii\db\Migration;

/**
 * Class m171204_121744_add_setting_count_posts_on_page
 */
class m171204_121744_add_setting_count_posts_on_page extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->batchInsert('{{%core_settings}}', ['key', 'value'], [
            [
                'key'   => 'posts_on_page',
                'value' => 10,
            ],
            [
                'key'   => 'order_posts',
                'value' => '',
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171204_121744_add_setting_count_posts_on_page cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171204_121744_add_setting_count_posts_on_page cannot be reverted.\n";

        return false;
    }
    */
}
