<?php

use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
$this->title = $page->title;
    //echo $message;
    //echo '<br/>';
    //exit;
?>

<div class="contacts">
    <div class="block-left">
        <div class="map">
            <script type="text/javascript" charset="utf-8" 
            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=hG9giFQz15I5LlS_GF5AoYZBfFAdMzPw&width=100%&height=100%&lang=ru_RU&sourceType=constructor"></script>
        </div>
        
        <!-- Contact form -->
        <div class="contact-form">
             <?php if(!empty($message)): ?><div class="message"><?=$message;?></div><?php endif; ?>
             <?php 
                 $form = ActiveForm::begin([
                    'id' => 'contact-form',
                    'options' => [
                        'validateOnSubmit'=>false,
                    ],
                    // 'enableAjaxValidation'=>true,
                    'enableAjaxValidation'=>false,
                    'fieldConfig' => [
                        'template' => '{label}<div class="over-field">{input} {error}</div>',
                        'labelOptions' => ['class' => 'col-sm-2 control-label'],
                    ],
                 ]); 
             ?>
             
             <?php
                /*
                echo $form->field($model, 'name')->begin();
                    echo Html::activeLabel($model, 'name');
                    echo '<div class="over-field">';
                        echo Html::activeTextInput($model, 'name', ['class' => 'form-control', 'maxlength' => 255]);
                        echo Html::error($model, 'name', ['class' => 'help-block help-block-error']); 
                    echo '</div>';
                echo $form->field($model, 'name')->end();*/
                echo $form->field($model, 'name');
            
                echo $form->field($model, 'email');
                echo $form->field($model, 'phone');
                echo $form->field($model, 'message')->textArea(['rows' => 6]);
                
                echo '<div class="form-group field-contactform-submit"><label>&nbsp;</label><div class="over-field">';
                echo Html::submitButton('Отправить',['class' => 'btn', 'name' => 'signup-button']);
                echo '</div></div>';
            ?>
             
            <?php ActiveForm::end(); ?>
        </div>
        <!-- END Contact form -->
        
        <p class="clear"></p>
    </div>

    <div class="block-right">
        <div class="block-img">
            <img src="/frontend/video/UNILIUX BY FREZZA ARREDAMENTI.jpg" alt=""/>
        </div>
        <div class="text">
            <?php echo $page->text; ?>
            <div class="social">
                <a rel="nofollow" href="https://www.facebook.com/uniliux/?ref=bookmarks" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <!--<a rel="nofollow" href="https://vk.com/uniliux" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a>-->
                <a rel="nofollow" href="https://www.instagram.com/uniliux_byfrezza/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a rel="nofollow" target="_blank" href="https://www.youtube.com/channel/UCjs30SoitT-6h986qLNMpUg">
                    <span><i class="fa fa-youtube" aria-hidden="true"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>

<?php $this->registerJsFile('/frontend/scripts/jquery.vide.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>
<?php $this->registerJsFile('/frontend/scripts/init.vide.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>