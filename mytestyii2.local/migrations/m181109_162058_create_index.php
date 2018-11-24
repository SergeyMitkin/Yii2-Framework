<?php

use yii\db\Migration;

/**
 * Class m181109_162058_create_index
 */
class m181109_162058_create_index extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropIndex('x-users-login', 'users', 'login');
        $this->createIndex('x-users-login', 'users', 'login', 'true');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('x-users-login', 'users', 'login');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181109_162058_create_index cannot be reverted.\n";

        return false;
    }
    */
}
