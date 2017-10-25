<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Blog */

$this->title = Yii::t('app', 'Create Blog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-create">

    <h1><?= Html::encode($this->title . ' author- ' .$model->user->username) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
