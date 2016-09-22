<?php

use yii\helpers\Html;
use yii\grid\GridView;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список изображений';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить изображение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            array(
                'label' => 'Img',
                'format' => 'raw',
                'value'=> function($model){
                    return EasyThumbnailImage::thumbnailImg(
                        'uploads/slider/' . $model->img,
                        50,
                        50,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND
                    );
                }
            ),
            
            array(
                'label' => 'Logo',
                'format' => 'raw',
                'value'=> function($model){
                    return EasyThumbnailImage::thumbnailImg(
                        'uploads/slider/' . $model->logo,
                        50,
                        50,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND
                    );
                }
            ),
            
            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>

</div>
