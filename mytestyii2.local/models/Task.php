<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 27.10.2018
 * Time: 20:12
 */
namespace app\models;
use yii\base\Model;
use app\components\validators\MyValidator;


class Task extends Model
{
    public $taskNumber;
    public $taskName;
    public $taskDescription;
    public $idEmployee;
    public $taskTime;

    public function rules()
    {
        return [
            [['taskNumber', 'taskName', 'taskDescription',
                'idEmployee', 'taskTime'], 'required'],
            [['taskDescription'], 'myValidate'],
            [['idEmployee'], MyValidator::class]
            ];
    }

    public function myValidate($attribute, $params)
    {
        if(strlen($this->$attribute) < 10){
            $this->addError($attribute,
                "Валидацияне прошла! Опишите задачу подробнее!");
        }
    }
}