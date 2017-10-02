<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                    'attribute' => 'category_id',
                    'value' => \yii\helpers\ArrayHelper::getValue($model,'category.name'),
            ],
            'name',
            'content:ntext',
            'price',
            'active:boolean',
            [
                'label' => 'Tags',
                'value' => implode(', ', ArrayHelper::map($model->tags, 'id', 'name')),

            ],

        ],
    ]) ?>

<p>
    <?= Html::a('Добавить значение',['admin/values/create', 'product_id' => $model->id], ['class' => 'btn btn-success']);?>
</p>


    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getValues()->with('productAttribute')]),

        'columns' => [

            [
                'attribute' => 'attribute_id',
                'value' => 'productAttribute.name',
            ],

            'value',

            [
                    'class' => 'yii\grid\ActionColumn',
                    'controller' => 'admin/values',
            ],
        ],
    ]); ?>

</div>
