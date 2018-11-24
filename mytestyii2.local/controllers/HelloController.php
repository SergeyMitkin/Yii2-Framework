<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 27.10.2018
 * Time: 17:40
 */

namespace app\controllers;
use yii\web\Controller;

class HelloController extends Controller
{
    public function actionIndex(){
        return $this->render('index',[
            'title' => 'Hello',
            'content' => 'Hello, world!!!'
        ]);
    }
}