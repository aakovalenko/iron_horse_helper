<?php
/**
 * Created by PhpStorm.
 * User: andri
 * Date: 03.10.17
 * Time: 9:25
 */

namespace app\controllers;

use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;


class CatalogController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->active(),
        ]);
            return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionCategory()
    {

    }

    public function actionTag()
    {

    }

    public function actionView()
    {

    }
}