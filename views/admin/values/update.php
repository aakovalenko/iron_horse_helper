<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Value */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Value',
]) . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'attribute_id' => $model->attribute_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
