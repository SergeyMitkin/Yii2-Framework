<?php
use yii\helpers\Url;
/** @var $model \app\models\tables\Comments */
?>

<div class="task-container">
        <div class="task-preview">
            <div class="task-preview-header"><?= $model->comment_text ?></div>
            <div class="task-preview-user">Комментарий пользователя: <?= $model->user->login ?></div>
        </div>
</div>
