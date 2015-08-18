<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Works;
use app\models\Service;

class SiteController extends Controller
{
    public $layout = '@app/views/frontend/layouts/main';

    public function actionIndex()
    {
        $works = Works::find()->all();
        $services = Service::find()->all();

        return $this->render('/frontend/site/index', [
            'works' => $works,
            'services' => $services
        ]);
    }
}
