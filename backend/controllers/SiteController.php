<?php

namespace backend\controllers;

use common\models\Language;
use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\Session;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
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
//        $session = new Session;
//        $session->open();
//        $value1 = $session['urlCreated'];  // get session variable 'name1'
//            $session['urlCreated'] = 'Đã hiển thị thành công toàn bộ actions';  // set session variable 'name3'
        $model = new Language();
       $this->layout = 'main';
        if (Yii::$app->request->isPost && Yii::$app->request->post("language")) {
            Yii::$app->session->setFlash("language",  Yii::$app->request->post("language"));
            $model->load(Yii::$app->request->post("language"));
            Yii::$app->language = $model->language;
       }
        return $this->render('index');
    }

// Cach nay bi sai
//    public function actionLanguage($lang = 'en-US')
//    {
//        // Validate the input language (optional)
//        $availableLanguages = ['en-US', 'vi']; // Add supported languages
//        if (!in_array($lang, $availableLanguages)) {
//            $lang = 'en-US'; // Fallback to default language
//        }
//
//        // Set the application language
//        Yii::$app->language = $lang;
//
//        // Optionally store the language in a session or cookie
//        Yii::$app->session->set('language', $lang); // Save to session
//        Yii::$app->response->cookies->add(new \yii\web\Cookie([
//            'name' => 'language',
//            'value' => $lang,
//            'expire' => time() + 3600 * 24 * 30, // 30 days
//        ]));
//
//        // Redirect back to the referring page or a default page
//        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
//    }
//
//    public function beforeAction($action)
//    {
//        // Retrieve language from session or cookie and set it
//        $lang = Yii::$app->session->get('language', Yii::$app->request->cookies->getValue('language', 'en-US'));
//        Yii::$app->language = $lang;
//
//        return parent::beforeAction($action);
//    }


    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'base';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

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
}
