<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                    'attribute' => 'category_id',
                    'filter' => Category::find()->select(['name','id'])->indexBy('id')->column(),
                    'value' => function (Product $product)
                    {
                        return $product->category->name;
                    }

            ],

            'name',
            'content:ntext',
            'price',
            [
                'attribute' => 'active',
                'filter' => [0 => 'No', 1 => 'Yes'],
                'format' => 'boolean'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
