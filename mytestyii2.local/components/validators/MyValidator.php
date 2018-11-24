<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 28.10.2018
 * Time: 15:10
 */
namespace app\components\validators;
use yii\validators\Validator;
class MyValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        if(!in_array($model->$attribute, ['1', '5'])){
            $this->addError($model, $attribute, 'Валидацция
            не прошла! Id сотрудника должен быть 1 или 5!');
        }
    }
}