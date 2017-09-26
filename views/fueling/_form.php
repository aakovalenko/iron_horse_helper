<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fueling */
/* @var $form yii\widgets\ActiveForm */
//$a = $_GET['id'];
?>

<div class="fueling-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iron_horse_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'fuel_type')->textInput() ?>

    <?= $form->field($model, 'price_per_liter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'liters')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mileage')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
