<?php
$form = \yii\widgets\ActiveForm::begin();
echo $form->field($model, 'userName')->textInput();
echo $form->field($model, 'comment')->textInput();
echo $form->field($model, 'file')->fileInput();
echo\yii\helpers\Html::submitButton('Send', ['class' => 'btn btn-success']);
\yii\widgets\ActiveForm::end();
