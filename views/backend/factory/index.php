<?php

use yii\helpers\Html;
use yii\grid\GridView;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FactorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Фабрики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factory-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить фабрику', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            array(
                'label' => 'Изображение',
                'format' => 'raw',
                'value'=> function($model){
                    return EasyThumbnailImage::thumbnailImg(
                        'uploads/factory/' . $model->img,
                        50,
                        50,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND
                    );
                }
            ),
            'meta_title',
             'meta_description',
             'meta_keywords',
            // 'text:ntext',
             'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
