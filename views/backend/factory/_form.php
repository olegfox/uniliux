<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Factory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factory-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imgFile')->fileInput() ?>

        <?php if(count($model->getPhotos()) > 0){ ?>
            <table class="table">
                <thead>
                <th>Удалить</th>
                <th>Фото</th>
                </thead>
                <tbody>
                <?php foreach($model->getPhotos() as $photo) { ?>
                    <tr>
                        <td><input name="photos[]" type="checkbox" value="<?php echo $photo->id; ?>"/></td>
                        <td><a href="/uploads/factory/<?php echo $photo->link;  ?>" target="_blank"><img src="/uploads/factory/<?php echo $photo->link;  ?>" alt="/uploads/factory/<?php echo $photo->link;  ?>" width="50px" height="50px" /></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>

        <?= $form->field($model, 'photos[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
