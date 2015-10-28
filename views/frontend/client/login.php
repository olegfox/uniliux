<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientRegForm */
/* @var $form ActiveForm */
?>

<div class="content">
    <div class="page">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div><!-- main-login -->
