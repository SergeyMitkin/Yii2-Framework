<?php
namespace app\assets;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class MyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/my.js'
    ];

    public $depends = [
        JqueryAsset::class
    ];

}