<?php
use yii\helpers\Url;

/** @var $model \app\models\tables\Task */
?>

<div class="task-container">
    <a class="task-preview-link" href="<?= Url::to(['task/one', 'id' => $model->id, 'login' => $model->userAccountable->login]); ?>">
        <div class="task-preview">
            <div class="task-preview-header"><?= $model->task_name ?></div>
            <div class="task-preview-content"><?= $model->description ?></div>
            <div class="task-preview-user">Ответственный: <?= $model->userAccountable->login ?>
            <div class="task-preview-user">Руководитель: <?= $model->userManager->login ?></div>
        </div>
    </a>
</div>


