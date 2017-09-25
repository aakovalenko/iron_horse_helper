<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FuelingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fueling-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'iron_horse_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'fuel_type') ?>

    <?= $form->field($model, 'price_per_liter') ?>

    <?php // echo $form->field($model, 'liters') ?>

    <?php // echo $form->field($model, 'mileage') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
