<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\News;
use app\models\Factory;
use app\models\Slider;
use app\models\Menu;

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

        return $this->render('/frontend/site/index', [
            'sliders' => $sliders
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
        $page = Menu::findOne(['slug' => 'kontakty']);

        return $this->render('/frontend/contacts/index', [
            'page' => $page
        ]);
    }
}
