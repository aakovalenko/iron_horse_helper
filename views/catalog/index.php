<?php
/**
 * Created by PhpStorm.
 * User: andri
 * Date: 03.10.17
 * Time: 9:40
 */
use yii\helpers\Html;
use yii\widgets\ListView;



$this->title = 'Catalog';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="catalog-index">

    <h1><?= Html::encode($this->title)?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'itemView' => '_item',
]); ?>

</div>
