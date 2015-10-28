<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'company_name',
            'contact_name',
            'your_task:ntext',
            // 'company_field:ntext',
            // 'country',
            // 'city',
            // 'address:ntext',
            // 'email:email',
            // 'website',
            // 'text:ntext',
            // 'password',
            // 'salt',
            // 'is_active',
            // 'created',
            // 'passwordText',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
