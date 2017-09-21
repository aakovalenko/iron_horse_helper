<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Maintenance;

/**
 * MaintenanceSearch represents the model behind the search form about `app\models\Maintenance`.
 */
class MaintenanceSearch extends Maintenance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'iron_horse_id', 'date', 'mileage'], 'integer'],
            [['oil', 'gearbox_oil', 'hydraulic_oil', 'oil_filter', 'air_filter', 'brake_fluid', 'coolant', 'bulbs', 'brake_pads', 'brake_discs', 'generator_belt', 'camshaft_belt', 'wheel_rotation', 'tire_pressure', 'alignment', 'battery', 'spark_plug', 'spark_plug_wire'], 'safe'],
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
        $query = Maintenance::find();

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
            'iron_horse_id' => $this->iron_horse_id,
            'date' => $this->date,
            'mileage' => $this->mileage,
        ]);

        $query->andFilterWhere(['like', 'oil', $this->oil])
            ->andFilterWhere(['like', 'gearbox_oil', $this->gearbox_oil])
            ->andFilterWhere(['like', 'hydraulic_oil', $this->hydraulic_oil])
            ->andFilterWhere(['like', 'oil_filter', $this->oil_filter])
            ->andFilterWhere(['like', 'air_filter', $this->air_filter])
            ->andFilterWhere(['like', 'brake_fluid', $this->brake_fluid])
            ->andFilterWhere(['like', 'coolant', $this->coolant])
            ->andFilterWhere(['like', 'bulbs', $this->bulbs])
            ->andFilterWhere(['like', 'brake_pads', $this->brake_pads])
            ->andFilterWhere(['like', 'brake_discs', $this->brake_discs])
            ->andFilterWhere(['like', 'generator_belt', $this->generator_belt])
            ->andFilterWhere(['like', 'camshaft_belt', $this->camshaft_belt])
            ->andFilterWhere(['like', 'wheel_rotation', $this->wheel_rotation])
            ->andFilterWhere(['like', 'tire_pressure', $this->tire_pressure])
            ->andFilterWhere(['like', 'alignment', $this->alignment])
            ->andFilterWhere(['like', 'battery', $this->battery])
            ->andFilterWhere(['like', 'spark_plug', $this->spark_plug])
            ->andFilterWhere(['like', 'spark_plug_wire', $this->spark_plug_wire]);

        return $dataProvider;
    }
}
