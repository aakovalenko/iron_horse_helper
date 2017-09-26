<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */
/* @var $blogs app\models\Blog */


/*$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="blog-one">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
    <?php foreach ($blogs as $blog):?>

        <div class="col-lg-12">
            <h2><?=$blog->title?></h2>

    <p><?=$blog->text?></p>

    <?= \yii\bootstrap\Html::a('more info', ['one/one', 'url' => $blog->url], ['class' => 'btn btn-success']) ?>


</div>
    <?php endforeach;?>