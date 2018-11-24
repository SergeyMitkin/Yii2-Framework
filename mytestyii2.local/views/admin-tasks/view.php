<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */

$this->title = $model->task_name;

if(!$hideBreadcrumbs){
    $this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="tasks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?
              echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'task_name',
                    'description:ntext',
                    'dead_line',
                    'id_user_manager',
                    'id_user_accountable',
                ]
            ]);
    ?>

</div>
