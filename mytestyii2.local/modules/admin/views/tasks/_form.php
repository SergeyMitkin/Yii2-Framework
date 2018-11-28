<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\tables\Users;
use app\models\tables\Tasks;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin();
    $users = Users::find()->all();

    $items = \yii\helpers\ArrayHelper::map($users, 'id', 'login');

    $params = [
        'prompt' => 'Выберите сотрудника'
    ];

    ?>

    <?= $form->field($model, 'task_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dead_line')->widget(\yii\jui\DatePicker::class, [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd'
    ])
    ?>

    <?php if(Yii::$app->user->isGuest){?>

    <?= $form->field($model, 'id_user_manager')->dropDownList($items, $params) ?>

    <?= $form->field($model, 'id_user_accountable')->dropDownList($items, $params) ?>

    <?php } else {
        $userName = Yii::$app->user->identity->username;
        $userId = Yii::$app->user->identity->id;
        $items = [$userId => $userName];
        ?>

        <?= $form->field($model, 'id_user_manager')->dropDownList($items) ?>

        <?= $form->field($model, 'id_user_accountable')->dropDownList($items) ?>

    <?php }?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php
    /*echo \yii\jui\DatePicker::widget([
            //'name' => 'My Date',
        'model' => $model,
        'attribute' => 'dead_line',
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd'
    ]);*/

    ActiveForm::end(); ?>

</div>
