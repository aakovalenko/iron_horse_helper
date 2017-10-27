<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Fueling;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FuelingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fuelings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fueling-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fueling', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

           // 'id',
            //'iron_horse_id',
            [
                'attribute' => 'iron_horse_id',
               // 'filter' => \app\models\IronHorse::find()->select(['brand','id'])->column(),

                'value'=> function (Fueling $us)
                {
                    return $us->horse->brand.' '. $us->horse->model;
                }
            ],
            'date',
            [
                'attribute' => 'fuel_type',
                'filter' => [0 => 'gas', 2 => 'diesel', 1 => 'petrol']
            ],
            'price_per_liter',
            'liters',
            'mileage',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
