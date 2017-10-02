<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\search\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                    'attribute' => 'parent_id',
                    'filter' => Category::find()->select(['name', 'id'])->indexBy('id')->column(),
                    'value' => 'parent.name', //тоже самое что и ниже
                   /* 'value' => function (Category $category) {
                        return ArrayHelper::getValue($category, 'parent.name');
                    }*/
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
