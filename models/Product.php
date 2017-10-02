<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $content
 * @property integer $price
 * @property integer $active
 *
 * @property Category $category
 * @property ProductTag[] $productTags
 * @property Tag[] $tags
 * @property Value[] $values
 * @property Attribute[] $attributes
 */
class Product extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'price', 'active'], 'integer'],
            [['name', 'price'], 'required'],
            [['content'], 'string'],
            [['tagsArray'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category'),
            'name' => Yii::t('app', 'Name'),
            'content' => Yii::t('app', 'Content'),
            'price' => Yii::t('app', 'Price'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTags()
    {
        return $this->hasMany(ProductTag::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('{{%product_tag}}', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValues()
    {
        return $this->hasMany(Value::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributes()
    {
        return $this->hasMany(Attribute::className(), ['id' => 'attribute_id'])->viaTable('{{%value}}', ['product_id' => 'id']);
    }

    private $_tagsArray;

    public function getTagsArray()
    {
        if ($this->_tagsArray === null){
            $this->_tagsArray = $this->getTags()->select('id')->column();
        }
        return $this->_tagsArray;
    }

    public function setTagsArray($value)
    {
        return $this->_tagsArray = (array)$value;
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->updateTags();
        parent::afterSave($insert, $changedAttributes);
    }

    public function updateTags()
    {
        $currentTagIds = $this->getTags()->select('id')->column();
        $newTagIds = $this->getTagsArray();

        foreach (array_filter(array_diff($newTagIds, $currentTagIds)) as $tagId){

            if ($tag = Tag::findOne($tagId)) {
                $this->link('tags', $tag);
            }
        }

        foreach (array_filter(array_diff($currentTagIds, $newTagIds)) as $tagId){

            if ($tag = Tag::findOne($tagId)) {
                $this->unlink('tags',$tag, true);
            }
        }
    }

    /**
     * @inheritdoc
     * @return \app\models\query\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ProductQuery(get_called_class());
    }


}
