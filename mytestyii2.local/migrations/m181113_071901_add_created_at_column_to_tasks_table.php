<?php

use yii\db\Migration;

/**
 * Handles adding created_at to table `tasks`.
 */
class m181113_071901_add_created_at_column_to_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tasks', 'created_at', $this->timestamp(14));
        $this->addColumn('tasks', 'updated_at', $this->timestamp(14));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tasks', 'created_at');
        $this->dropColumn('tasks', 'updated_at');
    }
}
