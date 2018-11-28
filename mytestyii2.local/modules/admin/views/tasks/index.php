<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\TasksFilter */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?
    $key = 'indexView' . Yii::$app->user->identity->id;

    if($this->beginCache('indexView', [
             'duration' => 200,
             'variations' => [Yii::$app->user->identity->id]
     ])){
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'task_name',
            'description:ntext',
            'dead_line',
            'id_user_manager',
            'id_user_accountable',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    $this->endCache();
        }

   /* \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'view',
        'viewParams' => [
            'hideBreadcrumbs' => true
        ]
    ])*/
    ?>
</div>
