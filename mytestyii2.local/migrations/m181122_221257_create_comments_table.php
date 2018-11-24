<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m181122_221257_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'comment_text' =>$this->text(1000),
            'user_id' => $this->integer(),
            'task_id' => $this->integer()
        ]);

        $this->addForeignKey('fk_comments_users', 'comments', 'user_id', 'users', 'id');
        $this->addForeignKey('fk_comments_tasks', 'comments', 'task_id', 'tasks', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comments');
    }
}
