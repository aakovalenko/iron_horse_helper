<?php

namespace app\controllers;

use app\models\Blog;
use app\rules\AuthorRule;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $blogs = Blog::find()->andWhere(['status_id' => 1])->all();
        return $this->render('index', ['blogs' => $blogs]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();git
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRole()
    {

        //auth_item

        /*$admin = Yii::$app->authManager->createRole('admin');
        $admin->description = 'Admin';
        Yii::$app->authManager->add($admin);

        $user = Yii::$app->authManager->createRole('user');
        $user->description = 'User';
        Yii::$app->authManager->add($user);

        $manager = Yii::$app->authManager->createRole('manager');
        $manager->description = 'Manager';
        Yii::$app->authManager->add($manager);*/


        //auth_item permission
        /*$permit = Yii::$app->authManager->createPermission('updateOwnHorse');
        $permit->description = 'Update Own Horse';
        Yii::$app->authManager->add($permit);*/




        /*$permit = Yii::$app->authManager->createPermission('delete');
        $permit->description = 'Delete';
        Yii::$app->authManager->add($permit);*/

        //auth_item_child
       /* $roleA = Yii::$app->authManager->getRole('user');
        $roleC = Yii::$app->authManager->getRole('manager');
        $permit = Yii::$app->authManager->getPermission('delete');
        Yii::$app->authManager->addChild($roleA, $permit);
        Yii::$app->authManager->addChild($roleC, $permit);*/

       //auth_assignment
       /*$userRole = Yii::$app->authManager->getRole('user');
       Yii::$app->authManager->assign($userRole, Yii::$app->user->getId(5));*/


       //Создания правила
      /* $auth = Yii::$app->authManager;
       $rule = new AuthorRule();
       $auth->add($rule);

        $updateOwnHorse = $auth->createPermission('updateOwnHorse');
        $updateOwnHorse->description = 'Редактировать посты';
        $updateOwnHorse->ruleName = $rule->name;
        $auth->add($updateOwnHorse);*/

      //создаем Rule
      /*$auth = Yii::$app->authManager;
      $rule = new AuthorRule();
      $auth->add($rule);*/

      //var_dump($auth);

/*      $updateOwnHorse = $auth->createPermission('updateOwnHorse');
        $updateOwnHorse->description = 'Редактировать свои посты';
        $updateOwnHorse->ruleName = $rule->name;
        $auth->add($updateOwnHorse);*/



        return 12345;
    }
}
