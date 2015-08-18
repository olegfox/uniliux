<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = 'Добавление новости';
$this->params['breadcrumbs'][] = ['label' => 'Новость', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
