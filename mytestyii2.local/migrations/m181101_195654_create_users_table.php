<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m181101_195654_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string(50)->notNull(),
            'password' =>$this->string(100)->notNull()
        ]);

        $this->createIndex(
            'x-users-login',
            'users',
            'login',
            'true'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
