<?php

use yii\db\Migration;

/**
 * Class m181201_131408_rbac_init
 */
class m181201_131408_rbac_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $am = Yii::$app->authManager;

        $admin = $am->createRole('admin');
        $moder = $am->createRole('moderator');

        $am->add($admin);
        $am->add($moder);

        $permissionCreateTask = $am->createPermission('createTask');
        $permissionDeleteTask = $am->createPermission('deleteTask');
        $permissionCantactAccess = $am->createPermission('contactAccess');

        $am->add($permissionCreateTask);
        $am->add($permissionDeleteTask);
        $am->add($permissionCantactAccess);

        $am->addChild($admin, $permissionCreateTask);
        $am->addChild($admin, $permissionDeleteTask);
        $am->addChild($admin, $permissionCantactAccess);

        $am->addChild($moder, $permissionCreateTask);

        $am->assign($admin, 1);
        $am->assign($moder, 2);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181201_131408_rbac_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181201_131408_rbac_init cannot be reverted.\n";

        return false;
    }
    */
}
