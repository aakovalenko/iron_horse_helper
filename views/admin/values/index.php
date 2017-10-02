<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Attribute;
use app\models\Value;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\search\ValuesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Values');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="value-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Value'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'product_id',
                //'filter' => Attribute::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => function (Value $e)
                {
                    return $e->product->name;
                }
            ],


            [
               'attribute' => 'attribute_id',
               'filter' => Attribute::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => function (Value $e)
                {
                   return $e->productAttribute->name;
                }

                //'value' => 'productAttribute.name   Можно так
            ],

            'value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
