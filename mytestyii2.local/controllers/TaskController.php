<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 25.10.2018
 * Time: 20:41
 */
namespace app\controllers;

use app\models\filters\TasksFilter;
use app\models\tables\Comments;
use app\models\tables\Picture;
use app\models\tables\Tasks;
use app\models\Task;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\UploadedFile;

class TaskController extends Controller
{
   public function actionIndex()
   {
       if($_POST['Tasks']['changeMonth'] == NULL) {
           $searchModel = new TasksFilter();
           $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

           return $this->render('index', [
               'searchModel' => $searchModel,
               'dataProvider' => $dataProvider,
           ]);
       }else{
           $dataProvider = new ActiveDataProvider([
               'query' => Tasks::getByMonthQuery($_POST['Tasks']['changeMonth'])
           ]);
           return $this->render('index', [
               'dataProvider' => $dataProvider,
           ]);
       }
   }

    public function actionOne($id, $login)
    {
        $taskData = Tasks::findOne($id);
        $taskName = $taskData->task_name;
        $taskDescription = $taskData->description;
        $userName = $login;
        $date = $taskData->dead_line;
        $taskId = $taskData->id;


        $model = new Comments();

        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->uploadFile();
        }

        return $this->render('task_item', [
            'taskName' => $taskName,
            'taskDescription' => $taskDescription,
            'userName' => $userName,
            'date' => $date,
            'taskId' => $taskId
        ]);
    }

    public function actionUpload(){
        $model = new Tasks();
        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->uploadFile();
        }
        return $this->render('upload', ['model' => $model]);

    }

}