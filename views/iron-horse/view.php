<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\IronHorse;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\IronHorse */

$this->title = $model->brand . '_'. Yii::$app->user->identity->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Iron Horses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iron-horse-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
                'filter' => User::find()->select(['username','id'])->column(),

                'value'=> function (IronHorse $us)
                {
                    return $us->user->username;
                }

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
