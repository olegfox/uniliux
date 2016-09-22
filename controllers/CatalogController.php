<?php

namespace app\controllers;

use Yii;
use app\models\Catalog;
use app\models\CatalogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * CatalogController implements the CRUD actions for Works model.
 */
class CatalogController extends Controller
{
    public $layout = '@app/views/backend/layouts/main';
    //public $post;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ]
        ];
    }

    /**
     * Lists all Catalog models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role == 0) {
            return $this->redirect(['admin/login']);
        }

        $searchModel = new CatalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/backend/catalog/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Catalog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('/backend/catalog/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Catalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Catalog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->imgFile = UploadedFile::getInstance($model, 'imgFile');
            $model->upload();

            $model->fileObject = UploadedFile::getInstance($model, 'fileObject');
            $model->uploadFile();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('/backend/catalog/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Catalog model.
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

            $model->fileObject = UploadedFile::getInstance($model, 'fileObject');
            $model->uploadFile();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            
            return $this->render('/backend/catalog/update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Catalog model.
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
     * @return Catalog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Catalog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
