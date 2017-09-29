<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%value}}".
 *
 * @property integer $product_id
 * @property integer $attribute_id
 * @property string $value
 *
 * @property Attribute $attribute
 * @property Product $product
 */
class Value extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%value}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'attribute_id', 'value'], 'required'],
            [['product_id', 'attribute_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['attribute_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attribute::className(), 'targetAttribute' => ['attribute_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'attribute_id' => Yii::t('app', 'Attribute ID'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttribute()
    {
        return $this->hasOne(Attribute::className(), ['id' => 'attribute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
