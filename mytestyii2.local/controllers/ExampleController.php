<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 30.10.2018
 * Time: 23:21
 */
namespace app\controllers;
use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\models\Test;
use yii\web\UploadedFile;

class ExampleController extends Controller
{
    public function  actionDays(){

        $task_date = Tasks::getTaskDate3DaysBefore();
        $email_array = array_column($task_date, 'email');

        $messages = [];
        foreach ($email_array as $email) {
            $messages[] = \Yii::$app->mailer->compose()
                ->setTo($email->email)
                ->setFrom('admin@example.com')
                ->setSubject('task_limit')
                ->setTextBody('You time is running out!');
        }
        \Yii::$app->mailer->sendMultiple($messages);
    }

    public function actionLang(){
        \Yii::$app->language = 'en_UK';
        echo \Yii::t('app', 'error', ['number' => 404]);
    }

    public function actionUpload(){
        $model = new Test();
        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->uploadFile();
        }
        return $this->render('upload', ['model' => $model]);
    }

    public function actionDb(){

        $id = 1;
       $res = \Yii::$app->db
            ->createCommand("SELECT * FROM test WHERE id = :id")
           ->bindParam(':id', $id)
            ->queryAll();

       var_dump($res);
       exit;
    }

    public function actionAr(){
        /*$user = new Users();
        $user->login = 'Vasya';
        $user->password = 'qwerty';
        $user->save();

        $user2 = new Users([
            'login' => 'Petya',
            'password'=>'qwerty',
        ]);
        $user2->save();*/

        /*$user = Users::findOne(1);*/
        /*var_dump(Users::find()->all());exit;*/

        /*$user = Users::findOne(['login' => 'Vasya']);
        $user->password = 'shfdajkjh';
        $user->save();*/

        //Users::deleteAll(['>', 'id', '2']);
        $user = Users::find()
            ->where(['id' => '1'])
            ->with('role')
            ->one();
        var_dump($user); exit;
    }

    public function actionRout($id){
        // --- ОТЛАДКА НАЧАЛО
        echo '<pre>';
        var_dump($id);
        echo'</pre>';
        die;
        // --- Отладка конец
        exit;
    }

}