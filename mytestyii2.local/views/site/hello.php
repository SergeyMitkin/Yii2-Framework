<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 27.10.2018
 * Time: 16:40
 */

use yii\helpers\Html;
$this->title = 'Hello page';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class = "site-hello">
    <h1><?=Html::encode($this->title)?></h1>
    <p>Hello, World!</p>
</div>
