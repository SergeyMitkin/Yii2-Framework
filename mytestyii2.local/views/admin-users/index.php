<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\UsersFilter */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <? //echo
        echo \app\widgets\MyWidget::widget([

        ]);

       echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'login',
            'password',
            'role_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    /*\yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => 'view',
            'viewParams' => [
                    'hideBreadcrumbs' => true
            ]
    ])*/
    ?>
</div>
