<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\News;
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
     * @return string
     */
    public function actionNews()
    {
        $news = News::find()->all();

        return $this->render('/frontend/news/index', [
            'news' => $news
        ]);
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
