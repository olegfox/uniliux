<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\News;
use app\models\Factory;
use app\models\Slider;
use app\models\Menu;
use app\models\Catalog;
use app\models\ContactForm;
use app\models\ClientLoginForm;
use app\models\ClientRegForm;
use app\models\Client;

class SiteController extends Controller
{
    public $layout = '@app/views/frontend/layouts/main';

    /**
     * Главная страница
     *
     * @return string
     */
    public function actionIndex()
    {
        $sliders = Slider::find()->all();
        $news = News::find()->orderBy(['date' => SORT_DESC])->limit(3)->all();
        $factories = Factory::find()->orderBy(['id' => SORT_DESC])->all();

        return $this->render('/frontend/site/index', [
            'sliders' => $sliders,
            'news' => $news,
            'factories' => $factories
        ]);
    }

    /**
     * Страница новостей
     *
     * @param null $slug
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionNews($slug = null)
    {
        $page = Menu::findOne(['slug' => 'novosti']);
        $news = News::find()->all();

        $params = [
            'news' => $news,
            'page' => $page
        ];

        if(!is_null($slug)){
            $newsOne = News::findOne(['slug' => $slug]);

            if(is_null($newsOne)){
                throw new \yii\web\NotFoundHttpException;
            }

            $params = array_merge($params, [
                'newsOne' => $newsOne
            ]);
        }

        return $this->render('/frontend/news/index', $params);
    }

    /**
     * Контент одной новости
     *
     * @param null $slug
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionNewscontent($slug = null)
    {
        $newsOne = News::findOne(['slug' => $slug]);

        if(is_null($newsOne)){
            throw new \yii\web\NotFoundHttpException;
        }

        $params = [
            'newsOne' => $newsOne
        ];

        return $this->renderPartial('/frontend/news/one', $params);
    }

    /**
     * Страница фабрик
     *
     * @param null $slug
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionFactory($slug = null)
    {
        $page = Menu::findOne(['slug' => 'fabriki']);
        $factory = Factory::find()->all();

        $params = [
            'factory' => $factory,
            'page' => $page
        ];

        if(!is_null($slug)){
            $factoryOne = Factory::findOne(['slug' => $slug]);

            if(is_null($factoryOne)){
                throw new \yii\web\NotFoundHttpException;
            }

            $params = array_merge($params, [
                'factoryOne' => $factoryOne
            ]);
        }

        return $this->render('/frontend/factory/index', $params);
    }

    /**
     * Контент одной новости
     *
     * @param null $slug
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionFactorycontent($slug = null)
    {
        $factoryOne = Factory::findOne(['slug' => $slug]);

        if(is_null($factoryOne)){
            throw new \yii\web\NotFoundHttpException;
        }

        $params = [
            'factoryOne' => $factoryOne
        ];

        return $this->renderPartial('/frontend/factory/one', $params);
    }

    /**
     * Страница контактов
     *
     * @return string
     */
    public function actionContacts()
    {
        $model = new ContactForm();
        $page = Menu::findOne(['slug' => 'kontakty']);
        $message = '';
        
        if(count(Yii::$app->request->post())>0){

            $model->load(Yii::$app->request->post());
            $model->attributes=$_POST['ContactForm'];

            if ($model->validate()) {

                $model->phone = $_POST['ContactForm']['phone'];
                
                $body = '<b>Имя</b>: '.$model->name;
                $body .= '<br/><b>Email</b>: '.$model->email;
                if(!empty($model->phone)){
                    $body .= '<br/><b>Телефон</b>: '.$model->phone;
                }
                $body .= '<br/><b>Сообщение</b>: <br/>';
                $body .= $model->message;
                
                $model->body = $body;
                

                if($model->contact(Yii::$app->params['emailto'])) {
                    $message = 'Спасибо! Ваше сообщение отправлено.';
                    $model = new ContactForm();
                }else{
                    $message = 'Ошибка! Ваше сообщение не отправлено.';
                }

            }else{
                $message = $model->errors;
                //print_r($message);
                //exit;
            }
        }

        return $this->render('/frontend/contacts/index', [
            'page' => $page,
            'model'=>$model,
            'message' => $message,
            'post' => Yii::$app->request->post()
        ]);
    }

    /**
     * Страница каталогов
     *
     * @return string
     */
    public function actionCatalogs()
    {
        $page = Menu::findOne(['slug' => 'katalogi']);

        $params = [
            'page' => $page
        ];

        if (!Yii::$app->user->isGuest){
            $catalogs = Catalog::find()->all();
            $catalogsBrand = [];
            foreach ($catalogs as $key => $value) {
                $catalogsBrand[$value['brand']][] = $value;
            }
            $params = array_merge($params, [
                'catalogs' => $catalogsBrand
            ]);
        }

        return $this->render('/frontend/catalog/index', $params);
    }

    /**
     * Регистрация пользователя в каталоге
     *
     * @return string|\yii\web\Response
     */
    public function actionReg()
    {
        if(Yii::$app->user->isGuest){
            $request = Yii::$app->request;

            $model = new ClientRegForm();

            if($request->isPost) {
                $model->setAttributes(Yii::$app->request->post()['ClientRegForm'], false);

                if ($model->validate()):
                    if ($user = $model->reg()):
                        Yii::$app->session->setFlash('success', 'Поздравляем регистрация прошла успешно! После проверки, вам будет разрешен доступ в каталог.');
                        $model = new ClientRegForm();
                    else:
                        Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации.');
                        Yii::error('Ошибка при регистрации');
//                return $this->refresh();
                    endif;
                endif;
            }

            return $this->render(
                '/frontend/client/reg',
                [
                    'model' => $model
                ]
            );
        }

        return $this->redirect('/site/catalogs/');
    }

    /**
     * Аутентификация пользователя
     *
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        if(Yii::$app->user->isGuest){
            $model = new ClientLoginForm();

            if ($model->load(Yii::$app->request->post()) && $model->login()):
                return $this->redirect('/site/catalogs/');
            endif;

            $params = [
                'model' => $model
            ];

            return $this->render(
                '/frontend/client/login',
                $params
            );
        }

        return $this->redirect('/site/catalogs/');
    }

    /**
     * Logout пользователя
     *
     * @return string|\yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/site/catalogs/');
    }

    /**
     * Страница о компании
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionAbout()
    {
        $page = Menu::findOne(['slug' => 'o-kompanii']);

        $params = [
            'page' => $page
        ];

        return $this->render('/frontend/page/index', $params);
    }

}
