<?php

use yii\db\Migration;

/**
 * Class m180107_111734_updated_at_core_pages
 */
class m180107_111734_updated_at_core_pages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // дата обновления страницы
        $this->addColumn('{{%core_pages}}', 'updated_at', $this->timestamp());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%core_pages}}', 'updated_at');
    }
}
