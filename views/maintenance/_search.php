<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaintenanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maintenance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'iron_horse_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'mileage') ?>

    <?= $form->field($model, 'oil') ?>

    <?php // echo $form->field($model, 'gearbox_oil') ?>

    <?php // echo $form->field($model, 'hydraulic_oil') ?>

    <?php // echo $form->field($model, 'oil_filter') ?>

    <?php // echo $form->field($model, 'air_filter') ?>

    <?php // echo $form->field($model, 'brake_fluid') ?>

    <?php // echo $form->field($model, 'coolant') ?>

    <?php // echo $form->field($model, 'bulbs') ?>

    <?php // echo $form->field($model, 'brake_pads') ?>

    <?php // echo $form->field($model, 'brake_discs') ?>

    <?php // echo $form->field($model, 'generator_belt') ?>

    <?php // echo $form->field($model, 'camshaft_belt') ?>

    <?php // echo $form->field($model, 'wheel_rotation') ?>

    <?php // echo $form->field($model, 'tire_pressure') ?>

    <?php // echo $form->field($model, 'alignment') ?>

    <?php // echo $form->field($model, 'battery') ?>

    <?php // echo $form->field($model, 'spark_plug') ?>

    <?php // echo $form->field($model, 'spark_plug_wire') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
