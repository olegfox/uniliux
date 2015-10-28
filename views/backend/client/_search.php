<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'contact_name') ?>

    <?= $form->field($model, 'your_task') ?>

    <?php // echo $form->field($model, 'company_field') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'salt') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'passwordText') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
