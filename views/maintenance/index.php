<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\IronHorse;
use app\models\Maintenance;


/* @var $this yii\web\View */
/* @var $searchModel app\models\MaintenanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Maintenances');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintenance-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Maintenance'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                    'attribute' => 'iron_horse_id',
                'filter' => IronHorse::find()->select(['brand','id'])->column(),
                /*'value' => function(Maintenance $me)
                {
                    return $me->ironHorse->model;
                }*/


            ],

            'date',
            'mileage',
            'oil',
            // 'gearbox_oil',
            // 'hydraulic_oil',
            // 'oil_filter',
            // 'air_filter',
            // 'brake_fluid',
            // 'coolant',
            // 'bulbs',
            // 'brake_pads',
            // 'brake_discs',
            // 'generator_belt',
            // 'camshaft_belt',
            // 'wheel_rotation',
            // 'tire_pressure',
            // 'alignment',
            // 'battery',
            // 'spark_plug',
            // 'spark_plug_wire',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>


