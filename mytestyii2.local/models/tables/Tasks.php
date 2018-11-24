<?php

namespace app\models\tables;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\imagine\Image;
use yii\web\UploadedFile;
use app\models\tables\Comments;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $task_name
 * @property string $description
 * @property string $dead_line
 * @property int $id_user_manager
 * @property int $id_user_accountable
 *
 * @property Users $userAccountable
 * @property Users $userManager
 */
class Tasks extends \yii\db\ActiveRecord
{
    public $userName;
    public $comment;
    /**
     * @var UploadedFile
     */
    public $file;

    /**
     * {@inheritdoc}
     */
    const EVENT_FOO_START = 'foo_start';

    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['dead_line'], 'safe'],
            [['id_user_manager', 'id_user_accountable'], 'integer'],
            [['task_name'], 'string', 'max' => 50],
            [['id_user_accountable'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_user_accountable' => 'id']],
            [['id_user_manager'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_user_manager' => 'id']],
            [['file'], 'file']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_name' => 'Task Name',
            'description' => 'Description',
            'dead_line' => 'Dead Line',
            'id_user_manager' => 'Manager',
            'id_user_accountable' => 'Accountable',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAccountable()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user_accountable']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserManager()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user_manager']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()')
            ],
        ];
    }

    public function getChangeMonth(){
        $month =
            [1 => "January",
                2=>"February",
                3=>"March",
                4=>"April",
                5=>"May",
                6=>"June",
                7=>"July",
                8=>"August",
                9=>"September",
                10=>"October",
                11=>"November",
                12=>"December"];
        return $month;
    }

    public static function getComments($id){
        return Comments::find()
            ->where(['task_id' => $id]);
    }

    public static function getByMonthQuery($month){
        return static::find()
            ->with('userAccountable')
            ->with('userManager')
            ->where(['MONTH(dead_line)' => $month]);
    }

    public function uploadFile(){
        $fileName = $this->file->baseName . '.' . $this->file->extension;
        $path = '@uploads/' . $fileName;
        $this->file->saveAs(\Yii::getAlias($path));
        Image::thumbnail($path, 200, 100)
            ->save(\Yii::getAlias('@uploads/small/' . $fileName));
    }

}
