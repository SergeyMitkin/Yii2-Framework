<?php
use yii\helpers\Url;
/** @var $model \app\models\tables\Picture*/

?>
    <a href="<?=Yii::getAlias('@uploads'). '/' . $model->picture_source ?>"
        <img src="<?=Yii::getAlias('@uploads') . '/small/' . $model->picture_source?>"
             alt="<?=$model->picture_alt?>" tatle="<?=$model->picture_title?>">
<?=Yii::getAlias('@uploads') . '/small/' . $model->picture_source?>
    </a>

