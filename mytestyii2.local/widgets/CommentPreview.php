<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 10.11.2018
 * Time: 5:19
 */

namespace app\widgets;


use app\models\tables\Comments;
use app\models\tables\Tasks;
use yii\base\Widget;

class CommentPreview extends Widget
{
    /** @var  Comments */

    public $model;

    public function run()
    {
        if (is_a($this->model, Comments::class)) {
            //var_dump($model);
            return $this->render('comment_preview', ['model' => $this->model]);
        }
        throw new \Exception("Невозможно отобразить модель!");
    }
}