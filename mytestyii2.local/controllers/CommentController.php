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
use app\models\tables\Tasks;
use app\models\Task;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;

class CommentController extends Controller{
   public function actionIndex()
   {
       $model = new Comments();
       $task_id = $model->task_id;

       $dataProvider = new ActiveDataProvider([
          'query' => Comments::getByTaskQuery($task_id)
       ]);

       return $this->render(
           'index', [
               'dataProvider' => $dataProvider,
           ]);
   }

    public function actionOne($id)
    {
        var_dump(Comments::findOne($id));
        exit;
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