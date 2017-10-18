<?php

use yii\db\Migration;
use yii\db\Expression;

class m170929_120122_user extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_users}}', [
            'id'                    => $this->primaryKey(),
            'login'                 => $this->string()->notNull()->unique(),
            'email'                 => $this->string()->notNull()->unique(),
            'auth_key'              => $this->string(32)->notNull(),
            'password_hash'         => $this->string()->notNull(),
            'password_reset_token'  => $this->string()->unique(),
            'confirm_email_at'      => $this->integer()->null(),
            'blocked_at'            => $this->integer()->null(),
            'created_at'            => $this->integer()->notNull(),
            'updated_at'            => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%user_user_profiles}}', [
            'id'                    => $this->primaryKey(),
            'user_id'               => $this->integer(11)->notNull(),
            'surname'               => $this->string(100)->null(),
            'name'                  => $this->string(100)->null(),
            'patronimyc'            => $this->string(100)->null(),
            'phone'                 => $this->string(20)->null(),
        ], $tableOptions);

        $this->createIndex('ix_user_user_profiles_user_id', '{{%user_user_profiles}}', 'user_id');
        $this->addForeignKey('fk_user_user_profiles_user_id', '{{%user_user_profiles}}', 'user_id', '{{%user_users}}', 'id', 'CASCADE', 'CASCADE');

        $this->createAdmins();
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_user_user_profiles_user_id', '{{%user_user_profiles}}');
        $this->dropIndex('ix_user_user_profiles_user_id', '{{%user_user_profiles}}');
        $this->dropTable('{{%user_user_profiles}}');
        $this->dropTable('{{%user_users}}');
    }

    private function createAdmins()
    {
        $time = time();

        $this->batchInsert('user_users', [
            'login',
            'email',
            'auth_key',
            'password_hash',
            'confirm_email_at',
            'created_at',
            'updated_at'
        ], [
            [
                'login'             => 'jeka.deadline',
                'email'             => 'jeka.deadline@gmail.com',
                'auth_key'          => Yii::$app->security->generateRandomString(),
                'password_hash'     => Yii::$app->security->generatePasswordHash('admin'),
                'confirm_email_at'  => $time,
                'created_at'        => $time,
                'updated_at'        => $time,
            ]
        ]);

        $this->batchInsert('{{%user_user_profiles}}', [
            'user_id',
            'surname',
            'name',
            'patronimyc',
            'phone',
        ], [
            [
                'user_id'     => 1,
                'surname'     => 'Бублик',
                'name'        => 'Евгений',
                'patronimyc'  => 'Владимирович',
                'phone'       => null,
            ],
        ]);
    }
}
