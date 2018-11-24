<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 14.11.2018
 * Time: 19:28
 */

namespace app\components;
use app\models\tables\Tasks;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;

class Bootstrap extends Component implements BootstrapInterface
{
    public function bootstrap($app)
    {
        Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT,function ($event){

            $users = $event->sender->userAccountable;
            $email = $users->email;
            $userName = $users->login;
            if(isset($email)){
                \Yii::$app->mailer->compose()
                    ->setTo($email)
                    ->setFrom('admin@example.com')
                    ->setSubject('new task')
                    ->setTextBody('Dear ' . $userName . ', you have a new task!')
                    ->send();
            }
        });
    }
}