<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $text
 * @property string $url
 * @property integer $status_id
 * @property integer $sort
 * @property integer $date_create
 * @property integer $date_update
 *
 * @property User $user
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status_id', 'sort', 'date_create', 'date_update'], 'integer'],
            [['text'], 'string'],
            [['title', 'url'], 'string', 'max' => 150],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
            'url' => Yii::t('app', 'Url'),
            'status_id' => Yii::t('app', 'Status ID'),
            'sort' => Yii::t('app', 'Sort'),
            'date_create' => Yii::t('app', 'Date Create'),
            'date_update' => Yii::t('app', 'Date Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
