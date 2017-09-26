<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */


$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
/* @var $blog \app\models\Blog */

?>

<h1><?=$blog->title?></h1>
<?=$blog->text;?>
