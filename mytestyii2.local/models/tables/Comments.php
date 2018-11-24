<?php

namespace app\models\tables;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $comment_text
 * @property int $user_id
 * @property int $task_id
 *
 * @property Tasks $task
 * @property Users $user
 */
class Comments extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment_text'], 'string'],
            [['user_id', 'task_id'], 'integer'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment_text' => 'Comment Text',
            'user_id' => 'User ID',
            'task_id' => 'Task ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::className(), ['id' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public static function getByTaskQuery($id){
        /*return static::findAll([
            'task_id'=>$id
        ])*/
        /**
         * в ListView: $dataProvider = new ActiveDataProvider([
        'query' => Comments::getByTaskQuery($task_id)
        ])
         */

        return static::find()
           ->with('user')
            ->where(['task_id' => $id]);
    }

    public function uploadFile(){
        $fileName = $this->file->baseName . '.' . $this->file->extension;
        $path = '@uploads/' . $fileName;
        $this->file->saveAs(\Yii::getAlias($path));
        Image::thumbnail($path, 200, 100)
            ->save(\Yii::getAlias('@uploads/small/' . $fileName));
    }

}
