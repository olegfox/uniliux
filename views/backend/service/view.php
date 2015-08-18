<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $model app\models\Service */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
                    'uploads/service/' . $model->img,
                    50,
                    50,
                    EasyThumbnailImage::THUMBNAIL_OUTBOUND
                )
            ),
            'title',
            'description',
            'meta_title',
            'meta_keywords',
            'meta_description',
            'text:ntext',
        ],
    ]) ?>

</div>
