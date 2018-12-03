<?php

use yii\db\Migration;

/**
 * Class m181201_123541_drop_column_role_id
 */
class m181201_123541_drop_column_role_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropIndex('fk_users_user_roles', 'users');
        $this->dropColumn('users', 'role_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181201_123541_drop_column_role_id cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181201_123541_drop_column_role_id cannot be reverted.\n";

        return false;
    }
    */
}
