<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientRegForm */
/* @var $form ActiveForm */
?>
<div class="content">
    <div class="page">
        <?php if (Yii::$app->session->getFlash('success') != "") { ?>
            <div class="flash flash-success">
                <?= Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php } ?>
        <?php if (Yii::$app->session->getFlash('error') != "") { ?>
            <div class="flash flash-error">
                <?= Yii::$app->session->getFlash('error'); ?>
            </div>
        <?php } ?>

        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'type')->dropDownList([
                'Компания' => 'Компания',
                'Частное лицо' => 'Частное лицо'
            ]) ?>
            <?= $form->field($model, 'company_name') ?>
            <?= $form->field($model, 'contact_name') ?>
            <?= $form->field($model, 'your_task') ?>
            <?= $form->field($model, 'country') ?>
            <?= $form->field($model, 'city') ?>
            <?= $form->field($model, 'address') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'website') ?>
            <?= $form->field($model, 'text')->textarea() ?>

            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div><!-- frontend-client-form -->
