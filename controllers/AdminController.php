<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\ClientLoginForm;
use app\models\ContactForm;
use app\models\Client;

class AdminController extends Controller
{
    public $layout = '@app/views/backend/layouts/main';

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

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['admin/login']);
        }

        return $this->render('/backend/admin/index');
    }

    public function actionLogin()
    {
        $model = new ClientLoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $client = Client::find()->where(['email' => $model->email])->one();
            if($client){
                if($client->role == 1){
                    if($model->login()){
                        return $this->redirect(['admin/index']);
                    }
                }
            }

            return $this->redirect(['admin/login']);
        } else {
            return $this->render('/backend/admin/login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['admin/index']);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
