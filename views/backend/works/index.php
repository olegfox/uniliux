<?php

use yii\helpers\Html;
use yii\grid\GridView;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Works';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="works-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Works', ['create'], ['class' => 'btn btn-success']) ?>
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
                        'uploads/works/' . $model->img,
                        50,
                        50,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND
                    );
                }
            ),
            'title',
            'description',
            'meta_title',
            // 'meta_description',
            // 'meta_keywords',
            // 'text:ntext',
            // 'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
