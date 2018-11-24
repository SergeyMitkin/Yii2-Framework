<?php

use yii\db\Migration;

/**
 * Class m181123_204954_add_column_task_id_to_picture
 */
class m181123_204954_add_column_task_id_to_picture extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('picture', 'task_id', $this->integer());
        $this->addForeignKey('fk_picture_tasks', 'picture', 'task_id', 'tasks', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('picture', 'task_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181123_204954_add_column_task_id_to_picture cannot be reverted.\n";

        return false;
    }
    */
}
