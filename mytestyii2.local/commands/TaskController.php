<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.11.2018
 * Time: 1:11
 */

namespace app\commands;

use app\models\tables\Tasks;
use yii\console\Controller;
use yii\helpers\Console;

class TaskController extends Controller
{

    /**
     * test application
     */

    public $message = 'hello';

    public function actionTest($id){
        if($task = Tasks::findOne($id)) {
            $message = $this->message . ' ' . $task->task_name;
            $this->stdout($message, Console::BG_GREEN);
            return static::EXIT_CODE_NORMAL;
        }
        return static::EXIT_CODE_ERROR;
    }

    public function actionRun(){
        
    }

    public function options($actionID)
    {
        return [
            'message'
        ];
    }

    public function optionAliases()
    {
        return [
            'm' => 'message'
        ];
    }

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

}