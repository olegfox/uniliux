<?php

use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;

?>

<?php if(count($factoryOne->getPhotos()) > 0) { ?>
    <div class="close"></div>
    <div class="slider">
        <?php foreach ($factoryOne->getPhotos() as $photo): ?>
            <div class="wrap-slider">
                <div class="slider" style="background: url(http://<?php echo  $_SERVER['HTTP_HOST'] . EasyThumbnailImage::thumbnailFileUrl('uploads/factory/' . $photo->link, 1920, 1080, EasyThumbnailImage::THUMBNAIL_OUTBOUND); ?>); center center no-repeat; background-size: cover;">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php } else { ?>
    <div class="close close-black"></div>
    <h2><?php echo $factoryOne->title; ?></h2>
<?php } ?>
<div class="logotip">
    <img src="/uploads/factory/<?php echo $factoryOne->img; ?>" alt="" width="370px"/>
</div>
<?php echo $factoryOne->text; ?>
<div id="social-block" class="clearfix">
    <div class="social-likes" data-title="<?php if (strlen($factoryOne->meta_title) > 0) { echo $factoryOne->meta_title; } else { echo $factoryOne->title; } ?>" data-url="http://<?php echo  $_SERVER['HTTP_HOST'] . Url::to(['/site/factory', 'slug' => $factoryOne->slug]); ?>" data-media="<?php if(strlen($factoryOne->img) > 0) {?>http://<?php echo  $_SERVER['HTTP_HOST'] . EasyThumbnailImage::thumbnailFileUrl('uploads/factory/' . $factoryOne->img, 300, 300, EasyThumbnailImage::THUMBNAIL_OUTBOUND); } ?>">
        <div class="facebook" title="Поделиться ссылкой на Фейсбуке">Facebook</div>
        <div class="vkontakte" title="Поделиться ссылкой во Вконтакте">Вконтакте</div>
    </div>
</div>