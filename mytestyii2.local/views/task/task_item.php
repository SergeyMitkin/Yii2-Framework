<h4>Задача: <?=$taskName?></h4>
<p>Описание: <?=$taskDescription?></p>
<p>Ответсвенный: <?=$userName?></p>
<p>Срок выполнения: <?=$date?></p>
<h4>Комментарии:</h4>

<?
$model = new \app\models\tables\Comments();
$dataProvider = new \yii\data\ActiveDataProvider([
    'query' => \app\models\tables\Comments::getByTaskQuery($taskId)
]);

echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function($model){
        return \app\widgets\CommentPreview::widget(['model' => $model]);
    },
    'summary' => false,
    'options' => [
        'class' => 'preview-container'
    ]
]);
?>

<?
$model = new \app\models\tables\Picture();
$dataProvider = new \yii\data\ActiveDataProvider([
        'query' => \app\models\tables\Picture::getByTaskQuery($taskId)
]);
echo \yii\widgets\ListView::widget([
'dataProvider' => $dataProvider,
'itemView' => function($model){
return \app\widgets\PicturePreview::widget(['model' => $model]);
},
'summary' => false,
'options' => [
'class' => 'preview-container'
]
]);
?>


<?php
$model = new \app\models\tables\Comments();
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$model->load(Yii::$app->request->post()) && $model->save();
/* @var $this yii\web\View */
/* @var $model app\models\tables\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comment_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'task_id')->textInput() ?>

    <?= $form->field($model, 'file')->fileInput()?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


