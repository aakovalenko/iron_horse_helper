<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horse".
 *
 * @property integer $id
 * @property string $brand
 * @property string $model
 * @property string $year
 * @property integer $color
 * @property string $engine
 * @property integer $mileage
 */
class Horse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand', 'model', 'year', 'color', 'mileage'], 'required'],
            [['year'], 'safe'],
            [['color', 'mileage'], 'integer'],
            [['engine'], 'number'],
            [['brand', 'model'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'brand' => Yii::t('app', 'Brand'),
            'model' => Yii::t('app', 'Model'),
            'year' => Yii::t('app', 'Year'),
            'color' => Yii::t('app', 'Color'),
            'engine' => Yii::t('app', 'Engine'),
            'mileage' => Yii::t('app', 'Mileage'),
        ];
    }
}
