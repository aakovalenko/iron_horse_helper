<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = Yii::t('app', 'Create User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs(
        <<<JS
$('a#toggleHorseForm').click(function(){
    $('#horse').toggleClass('hidden');
});
JS
);
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <a id="toggleHorseForm" class="btn btn-info" role="button" >Add horse</a>
    <div id="horse" class="hidden">
        <?=$this->render('@app/views/horse/_form', ['model' => $horse]);?>
    </div>


</div>
