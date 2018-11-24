<?php /** @var \yii\data\ActiveDataProvider $dataProvider */?>

<?
echo\yii\widgets\ListView::widget([
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
