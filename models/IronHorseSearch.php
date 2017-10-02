<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IronHorse;

/**
 * IronHorseSearch represents the model behind the search form about `app\models\IronHorse`.
 */
class IronHorseSearch extends IronHorse
{


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'year', 'engine', 'mileage', 'color', 'created_at', 'updated_at'], 'integer'],
            [['user_id', 'brand', 'model'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = IronHorse::find()->with(['user']);


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
        if (!Yii::$app->user->can('admin')){
            $query->andWhere(['user_id' => Yii::$app->user->id]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'user_id' => $this->id,
            'year' => $this->year,
            'engine' => $this->engine,
            'mileage' => $this->mileage,
            'color' => $this->color,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'model', $this->model]);

        return $dataProvider;
    }
}
