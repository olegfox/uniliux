<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Список изображений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить изображение?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            array(
                'label' => 'Img',
                'format' => 'raw',
                'value'=>EasyThumbnailImage::thumbnailImg(
                    'uploads/slider/' . $model->img,
                    50,
                    50,
                    EasyThumbnailImage::THUMBNAIL_OUTBOUND
                )
            ),
            array(
                'label' => 'Logo',
                'format' => 'raw',
                'value'=>EasyThumbnailImage::thumbnailImg(
                    'uploads/slider/' . $model->logo,
                    50,
                    50,
                    EasyThumbnailImage::THUMBNAIL_OUTBOUND
                )
            )
            
        ],
    ]) ?>

</div>
