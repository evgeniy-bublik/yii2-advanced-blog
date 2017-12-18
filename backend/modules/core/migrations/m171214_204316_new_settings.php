<?php

use yii\db\Migration;
use common\models\core\Setting;

/**
 * Class m171214_204316_new_settings
 */
class m171214_204316_new_settings extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->batchInsert('{{%core_settings}}', ['key', 'value'], [
            [
                'key' => 'admin_skype',
                'value' => '',
            ],
            [
                'key' => 'admin_photo',
                'value' => '',
            ],
            [
                'key' => 'admin_linkedin',
                'value' => '',
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        Setting::deleteAll(['key' => ['admin_skype', 'admin_photo', 'admin_linkedin']]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171214_204316_new_settings cannot be reverted.\n";

        return false;
    }
    */
}
