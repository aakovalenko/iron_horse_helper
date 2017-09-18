<?php
/**
 * Created by PhpStorm.
 * User: andri
 * Date: 11.09.17
 * Time: 9:30
 */

namespace app\controllers;


use yii\web\Controller;
use Yii;
use app\models\LoginForm;
use app\models\User;

use yii\web\Response;



class AuthController extends Controller
{

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }




   /* public function actionTest()
    {
        $user = User::findOne(6);

        Yii::$app->user->login($user);
        //Yii::$app->user->logout();

        if (Yii::$app->user->isGuest)
        {
            echo "Пользователь Гость";
        }
        else
            {

                echo "Пользователь авторизован";
        }
    }*/



}