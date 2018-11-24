<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_roles`.
 */
class m181102_162634_create_user_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /*$this->createTable('user_roles', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)
        ]);

        $this->addColumn('users', 'role_id', $this->integer());*/
        $this->addForeignKey('fk_users_user_roles', 'users', 'role_id', 'user_roles', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_roles');
    }
}
