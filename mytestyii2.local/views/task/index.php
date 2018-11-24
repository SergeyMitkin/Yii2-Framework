<?php /** @var \yii\data\ActiveDataProvider $dataProvider */
use yii\widgets\ActiveForm;
$model = new \app\models\tables\Tasks();
?>

<?php $form = ActiveForm::begin();?>
<?php
$monthId = $_POST['Tasks']['changeMonth'];

$prompt = $model->getChangeMonth()[$monthId];
$params = [
    'prompt' => $prompt
];
?>

<?= $form->field($model, 'changeMonth')->dropDownList($model->getChangeMonth(), $params) ?>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Выбрать', ['class' => 'btn btn-success']) ?>
    </div>

<?ActiveForm::end(); ?>

<?=\yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function($model){
        return \app\widgets\TaskPreview::widget(['model' => $model]);
    },
    'summary' => false,
    'options' => [
    'class' => 'preview-container'
    ]
]);
?>
