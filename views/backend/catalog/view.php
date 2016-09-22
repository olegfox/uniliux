<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
/* @var $model app\models\Catalog */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Catalog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'brand',
            array(
                'label' => 'Изображение',
                'format' => 'raw',
                'value'=>EasyThumbnailImage::thumbnailImg(
                    'uploads/catalog/' . $model->img,
                    50,
                    50,
                    EasyThumbnailImage::THUMBNAIL_OUTBOUND
                )
            ),
            'file',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'text:ntext',
            'position',
        ],
    ]) ?>

</div>
