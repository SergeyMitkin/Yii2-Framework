<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181103_145549_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'task_name' => $this->string(50),
            'description' => $this->text(1000),
            'dead_line' => $this->dateTime(),
            'id_user_manager' => $this->integer(),
            'id_user_accountable' => $this->integer()
        ]);

        $this->addForeignKey('fk_tasks_users', 'tasks',
            'id_user_manager', 'users', 'id');
        $this->addForeignKey('fk2_tasks_users', 'tasks',
            'id_user_accountable', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}
