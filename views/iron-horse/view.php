<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\IronHorse */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Iron Horses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iron-horse-view">

    <h1><?= Html::encode($this->title) ?>

    <h2 style="color: #2cff20">User ID: <?= $model->user_id;?>(<?=(Yii::$app->user->identity->username)?>)</h2>





    <p>
        <?php if (\Yii::$app->user->can('update')): ?>


        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>


        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php endif;?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'user_id',
                'value' => ArrayHelper::getValue($model,'user_id')
            ],

            'brand',
            'model',
            'year',
            'engine',
            'mileage',
            'color',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
