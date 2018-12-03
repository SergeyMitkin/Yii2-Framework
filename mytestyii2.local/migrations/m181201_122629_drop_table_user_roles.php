<?php

use yii\db\Migration;

/**
 * Class m181201_122629_drop_table_user_roles
 */
class m181201_122629_drop_table_user_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk_users_user_roles', 'users');
        $this->dropTable('user_roles');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181201_122629_drop_table_user_roles cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181201_122629_drop_table_user_roles cannot be reverted.\n";

        return false;
    }
    */
}
