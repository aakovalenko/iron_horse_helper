<?php
/**
 * Created by PhpStorm.
 * User: andri
 * Date: 26.09.17
 * Time: 15:15
 */

namespace app\controllers;


use yii\web\Controller;
use app\models\Blog;
use yii\web\NotFoundHttpException;


class OneController extends Controller
{
    public function actionAll()
    {
        $blogs = Blog::find()->andWhere(['status_id' => 1])->orderBy('sort')->all();

        return $this->render('all', [
            'blogs' => $blogs,]);
    }

    public function actionOne($url)
    {
        if ($blog = Blog::find()->andWhere(['url' => $url])->one()) {
            return $this->render('one', ['blog' => $blog,]);
        } else {
            throw new NotFoundHttpException('Нет такого блока');
        }
    }
}