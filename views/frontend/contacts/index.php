<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = $page->title;
?>

<div class="contacts">
    <div class="block-left">
        <div class="map">
            <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=zwxIZbSFSwINRgHiFW8MIln3EPji-6x1&width=100%&height=100%&lang=ru_RU&sourceType=constructor"></script>
        </div>
    </div>

    <div class="block-right">
        <div class="block-img">
            <img src="/frontend/images/contacts-image.png" alt=""/>
        </div>
        <div class="text">
            <?php echo $page->text; ?>
        </div>
    </div>
</div>