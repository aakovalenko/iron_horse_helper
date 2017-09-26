<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IronHorseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Iron Horses');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="iron-horse-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

        <?= Html::a(Yii::t('app', 'Create Iron Horse'), ['create'], ['class' => 'btn btn-success']) ?>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'id',
            'user_id',
            'brand',
            'model',
            'year',
            // 'engine',
            // 'mileage',
            // 'color',
             'created_at:datetime',
             'updated_at:datetime',

            [   'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete} {update} {maintenance} {fueling} {test}',
                'buttons' => [
                        'maintenance' => function ($url, $model, $key)
                        {
                            return Html::a('<span class="glyphicon glyphicon-wrench"></span>', $url , [
                                    'title' => 'go to maintenance',
                                    'data-pjax' => '0',

                            ]);
                        },
                        'fueling' => function($url, $model,$key)
                    {
                            return Html::a('<span class="glyphicons glyphicon-tint"></span>', $url , [
                                'title' => 'go to fueling',
                                'data-pjax' => '0',
                                'id' => 'fueling'

                            ]);
                        },
                            'test' => function($url, $model,$key)
    {
        return Html::a('<span class="glyphicon glyphicon-retweet"></span>', $url , [
            'title' => 'go to fueling',
            'id' => 'fueling'

        ]);
    }
                ]
            ],
        ],
    ]); ?>
</div>

<p>

    <?= Html::a(Yii::t('app', 'Go to maintenance'), ['maintenance'], ['class' => 'btn btn-danger']) ?>

</p>

<h4>User id: <?= \Yii::$app->user->identity->id?></h4>


<?php
$link = \yii\helpers\Url::to('/iron-horse/test');
$js = <<<JS
   $('#fueling').on('click', function(){
       
       var car_id = $(this).data('id');
       
       $.ajax({
       type: 'POST',
       url: '/iron-horse/test',
       data: {'id': car_id},
        contentType: "application/json; charset=utf-8",
            dataType: "json",
            
             success: function (data) {
               //do something
                console.log(fileid);
               alert("working");
            },
            error: function (errormessage) {

                //do something else
                alert("not working");

            }
       
       })
     })
     
     

       
        
       
           /* $('a#fueling').click(function(){
                var data = $(this).serialize();
                $.ajax({
                url: 'iron-horse/fueling',
                type: 'POST',
                data: data,
                
                success: function(res){
                console.log(res);
            },
            
            error: function() {
              alert('Error!');
            }
                });
                return false;
            });*/
JS;

$this->registerJs($js);
?>