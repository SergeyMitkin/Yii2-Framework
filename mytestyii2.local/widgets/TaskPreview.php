<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 10.11.2018
 * Time: 5:19
 */

namespace app\widgets;


use app\models\tables\Tasks;
use yii\base\Widget;

class TaskPreview extends Widget
{
    /** @var  Tasks */
    public $model;

    public function run()
    {
        if (is_a($this->model, Tasks::class)) {
            return $this->render('task_preview', ['model' => $this->model]);
        }
        throw new \Exception("Невозможно отобразить модель!");
    }
}