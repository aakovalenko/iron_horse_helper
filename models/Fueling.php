<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fueling".
 *
 * @property integer $id
 * @property integer $iron_horse_id
 * @property integer $date
 * @property integer $fuel_type
 * @property string $price_per_liter
 * @property string $liters
 * @property string $mileage
 *
 * @property IronHorse $ironHorse
 */
class Fueling extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fueling';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iron_horse_id', 'date', 'fuel_type'], 'integer'],
            [['price_per_liter', 'liters', 'mileage'], 'string', 'max' => 11],
            [['iron_horse_id'], 'exist', 'skipOnError' => true, 'targetClass' => IronHorse::className(), 'targetAttribute' => ['iron_horse_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iron_horse_id' => 'Iron Horse ID',
            'date' => 'Date',
            'fuel_type' => 'Fuel Type',
            'price_per_liter' => 'Price Per Liter',
            'liters' => 'Liters',
            'mileage' => 'Mileage',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorse()
    {
        return $this->hasOne(IronHorse::className(), ['id' => 'iron_horse_id']);
    }
}
