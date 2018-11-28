<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin();
    $roles = \app\models\tables\UserRoles::find()->all();

    $items = yii\helpers\ArrayHelper::map($roles, 'id', 'name');

    $params = [
            'prompt' => 'Выберите статус...'
    ];
    ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]);
   
    ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role_id')->dropDownList($items, $params) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
