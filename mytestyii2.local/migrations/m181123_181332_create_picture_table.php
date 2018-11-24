<?php

use yii\db\Migration;

/**
 * Handles the creation of table `picture`.
 */
class m181123_181332_create_picture_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('picture', [
            'id' => $this->primaryKey(),
            'picture_source' =>$this->text(255),
            'picture_title' => $this->text(255),
            'picture_alt' => $this->text(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('picture');
    }
}
