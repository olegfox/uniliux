<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Slider */

$this->title = 'Добавить новый слайдер';
$this->params['breadcrumbs'][] = ['label' => 'Список изображений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
