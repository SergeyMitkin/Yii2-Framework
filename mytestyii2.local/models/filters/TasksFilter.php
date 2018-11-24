<?php

namespace app\models\filters;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Tasks;

/**
 * TasksFilter represents the model behind the search form of `app\models\tables\Tasks`.
 */
class TasksFilter extends Tasks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user_manager', 'id_user_accountable'], 'integer'],
            [['task_name', 'description', 'dead_line'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        if (Yii::$app->user->isGuest){
            $query = Tasks::find();

       }else {
                 $query = Tasks::find()
                 ->with('userAccountable')
                 ->where(['id_user_accountable' => Yii::$app->user->identity->id]);
             }
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dead_line' => $this->dead_line,
            'id_user_manager' => $this->id_user_manager,
            'id_user_accountable' => $this->id_user_accountable,
        ]);

        $query->andFilterWhere(['like', 'task_name', $this->task_name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
