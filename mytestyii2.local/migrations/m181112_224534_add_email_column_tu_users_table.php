<?php

use yii\db\Migration;

/**
 * Class m181112_224534_add_email_column_tu_users_table
 */
class m181112_224534_add_email_column_tu_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'email', $this->string(50));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'email');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181112_224534_add_email_column_tu_users_table cannot be reverted.\n";

        return false;
    }
    */
}
