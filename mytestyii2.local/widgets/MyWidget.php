<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 10.11.2018
 * Time: 3:36
 */

namespace app\widgets;


use yii\base\Widget;

class MyWidget extends Widget
{
    public $buttonValue = 'Нажми меня';
    public $title = 'Мой виджет';

    public function run()
    {
        return $this->render('my', [
            'title' => $this->title,
            'buttonValue' => $this->buttonValue
            ]
        );
    }
}