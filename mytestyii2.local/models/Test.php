<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.10.2018
 * Time: 1:58
 */
namespace app\models;
use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;

class Test extends Model
{
    public $content;
    public $title;
    public $date;
    /**
     * @var UploadedFile
     */
    public $file;



    public function rules()
    {
        return [
            [['content', 'title'], 'required'],
            [['title'], 'myValidate'],
            [['date'], 'safe'],
            [['file'], 'file', 'extensions' => 'jpg']
        ];
    }

    public function uploadFile(){
        $fileName = $this->file->baseName . '.' . $this->file->extension;
        $path = '@uploads/' . $fileName;
        $this->file->saveAs(\Yii::getAlias($path));
        Image::thumbnail($path, 200, 100)
        ->save(\Yii::getAlias('@uploads/small/' . $fileName));
    }

    public function myValidate($attribute, $params)
    {
        if(strlen($this->$attribute) > 10){
            $this->addError($attribute,
                "Валидация не прошла!!!");
        }
    }

    /*public function fields()
    {
        return [
           'name' => 'title'
        ];
    }*/
}