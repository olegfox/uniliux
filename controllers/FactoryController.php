<?php

namespace app\controllers;

use Yii;
use app\models\Factory;
use app\models\FactoryPhoto;
use app\models\FactorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * FactoryController implements the CRUD actions for Works model.
 */
class FactoryController extends Controller
{
    public $layout = '@app/views/backend/layouts/main';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Factory models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role == 0) {
            return $this->redirect(['admin/login']);
        }

        $searchModel = new FactorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/backend/factory/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Factory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('/backend/factory/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Factory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Factory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->imgFile = UploadedFile::getInstance($model, 'imgFile');
            $model->upload();

            $model->photos = UploadedFile::getInstances($model, 'photos');
            $model->uploadPhotos();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('/backend/factory/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Factory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->imgFile = UploadedFile::getInstance($model, 'imgFile');
            $model->upload();

            $model->photos = UploadedFile::getInstances($model, 'photos');
            $model->uploadPhotos();

//          Удаляем фотографии из фабрики, отмеченные на удаление
            if (isset($_POST['photos'])) {
                foreach ($_POST['photos'] as $photo) {
                    $photoObject = FactoryPhoto::find()->where(['id' => $photo])->one();

                    if (is_object($photoObject)) {
                        $photoObject->delete();
                    }
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('/backend/factory/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Factory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Works model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Factory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Factory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
