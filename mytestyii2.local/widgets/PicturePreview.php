<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 10.11.2018
 * Time: 5:19
 */

namespace app\widgets;


use app\models\tables\Comments;
use app\models\tables\Picture;
use app\models\tables\Tasks;
use yii\base\Widget;

class PicturePreview extends Widget
{
    /** @var  Picture */

    public $model;

    public function run()
    {
        if (is_a($this->model, Picture::class)) {
            //var_dump($this->model);
            return $this->render('picture_preview', ['model' => $this->model]);
        }
        throw new \Exception("Невозможно отобразить модель!");
    }
}