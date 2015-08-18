<?php

namespace app\controllers;

use app\models\NewsPhoto;
use app\models\NewsVideo;
use Yii;
use app\models\News;
use app\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\controllers\VideoParser;

/**
 * NewsController implements the CRUD actions for Works model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['admin/login']);
        }

        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/backend/news/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('/backend/news/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->imgFile = UploadedFile::getInstance($model, 'imgFile');
            $model->upload();

            $model->photos = UploadedFile::getInstances($model, 'photos');
            $model->uploadPhotos();

//          Добавляеем видео
            if($model->videoUrl){

                $video = VideoParser::getVideo($model->videoUrl);

                $newsVideo = new NewsVideo();
                $newsVideo->title = $video->title;
                $newsVideo->link = $model->videoUrl;
                $newsVideo->preview_image_url = $video->thumbnail_url;
                $newsVideo->html = $video->html;
                $newsVideo->news_id = $model->id;

                $newsVideo->save();

            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('/backend/news/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $date = new \DateTime($model->date);
            $model->date = date_format($date, 'Y-m-d H:i:s');
            $model->save();
            $model->imgFile = UploadedFile::getInstance($model, 'imgFile');
            $model->upload();

            $model->photos = UploadedFile::getInstances($model, 'photos');
            $model->uploadPhotos();

//          Редактируем видео

//          Если строка с видео не пустая

            if ($model->videoUrl) {

                $flag = 0;

//              Если у поста уже есть видео
                if (is_object($model->getVideo())) {
//                  Если добавляется то же видео
                    if ($model->videoUrl == $model->getVideo()->link) {
                        $flag = 1;
                    }
                }

                if ($flag == 0) {
                    $video = VideoParser::getVideo($model->videoUrl);

                    $newsVideo = new NewsVideo();

                    if (is_object($model->getVideo())) {
                        $newsVideo = $model->getVideo();
                    }

                    $newsVideo->title = $video->title;
                    $newsVideo->link = $model->videoUrl;
                    $newsVideo->preview_image_url = $video->thumbnail_url;
                    $newsVideo->html = $video->html;
                    $newsVideo->news_id = $model->id;

                    $newsVideo->save();
                }

//          Если строка с видео пустая, то удаляем видео, если оно существует
            } else {

                if (is_object($model->getVideo())) {

                    $model->getVideo()->delete();

                }

            }

//          Удаляем фотографии из новости, отмеченные на удаление
            if (isset($_POST['photos'])) {
                foreach ($_POST['photos'] as $photo) {
                    $photoObject = NewsPhoto::find()->where(['id' => $photo])->one();

                    if (is_object($photoObject)) {
                        $photoObject->delete();
                    }
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('/backend/news/update', ['model' => $model,]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public
    function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Works model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
