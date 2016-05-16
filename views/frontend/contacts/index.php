<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = $page->title;
?>

<div class="contacts">
    <div class="block-left">
        <div class="map">
            <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=hG9giFQz15I5LlS_GF5AoYZBfFAdMzPw&width=100%&height=100%&lang=ru_RU&sourceType=constructor"></script>
        </div>
    </div>

    <div class="block-right">
        <div class="block-img">
            <img src="/frontend/images/contacts-image.jpg" alt=""/>
        </div>
        <div class="text">
            <?php echo $page->text; ?>
            <div class="social">
                <a href="https://www.facebook.com/uniliux/?ref=bookmarks" target="_blank"><img src="/frontend/images/fb.gif" alt=""/></a>
                <a href="https://vk.com/uniliux" target="_blank"><img src="/frontend/images/vk.gif" alt=""/></a>
            </div>
        </div>
    </div>
</div>