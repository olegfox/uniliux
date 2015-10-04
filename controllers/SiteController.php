<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Works;
use app\models\Service;
use app\models\Slider;

class SiteController extends Controller
{
    public $layout = '@app/views/frontend/layouts/main';

    public function actionIndex()
    {
        $works = Works::find()->all();
        $services = Service::find()->all();
        $sliders = Slider::find()->all();

        return $this->render('/frontend/site/index', [
            'works' => $works,
            'services' => $services,
            'sliders' => $sliders
        ]);
    }
}
