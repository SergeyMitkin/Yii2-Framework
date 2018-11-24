<?php

use yii\db\Migration;

/**
 * Handles adding created_at to table `userss`.
 */
class m181113_073654_add_created_at_column_to_userss_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'created_at', $this->timestamp(14));
        $this->addColumn('users', 'updated_at', $this->timestamp(14));
        $this->addColumn('user_roles', 'created_at', $this->timestamp(14));
        $this->addColumn('user_roles', 'updated_at', $this->timestamp(14));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'created_at');
        $this->dropColumn('users', 'updated_at');
        $this->dropColumn('user_roles', 'created_at');
        $this->dropColumn('user_roles', 'updated_at');
    }
}
