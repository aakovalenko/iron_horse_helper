<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "iron_horse".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $brand
 * @property string $model
 * @property integer $year
 * @property integer $engine
 * @property integer $mileage
 * @property integer $color
 * @property integer $created_at
 * @property integer $updated_at
 */
class IronHorse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'iron_horse';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand', 'model', 'year', 'engine', 'mileage',], 'required'],
            [['year', 'engine', 'mileage', 'color'], 'integer'],
            [['user_id'], 'string', 'max' => 11],
            [['brand', 'model'], 'string', 'max' => 50],

        ];
    }

    public function behaviors()
    {
        return [

            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at']
                ]
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
    ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'brand' => Yii::t('app', 'Brand'),
            'model' => Yii::t('app', 'Model'),
            'year' => Yii::t('app', 'Year'),
            'engine' => Yii::t('app', 'Engine'),
            'mileage' => Yii::t('app', 'Mileage'),
            'color' => Yii::t('app', 'Color'),

        ];
    }
}
