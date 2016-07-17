<?php

use yii\helpers\Html;
use yii\grid\GridView;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatalogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталоги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить каталог', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            
            [
                'label' => 'Изображение',
                'format' => 'raw',
                'value'=> function($model){
                    return EasyThumbnailImage::thumbnailImg(
                        'uploads/catalog/' . $model->img,
                        50,
                        50,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND
                    );
                }
            ],
            
            
            [
                'label'=>'Файл',
                'format' => 'raw',
                'value'=>function ($model) {
                    return Html::a($model->file, 'uploads/catalog/' . $model->file);
                },
            ],
            'meta_title',
             'meta_description',
             'meta_keywords',
            // 'text:ntext',
             'position',
            
            'brand',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
