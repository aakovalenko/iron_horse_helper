<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Horse */

$this->title = Yii::t('app', 'Create Horse');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Horses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
