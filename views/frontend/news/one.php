<?php

use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;

?>

<?php if(count($newsOne->getPhotos()) > 0) { ?>
<div class="close"></div>
<div class="slider">
    <?php foreach ($newsOne->getPhotos() as $photo): ?>
    <div class="wrap-slider">
        <div class="slider" style="background: url(/uploads/news/<?php echo $photo->link ?>) center center no-repeat; background-size: cover;">
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="wrap-head">
    <div class="head">
        <h2><?php echo $newsOne->title; ?></h2>
    </div>
</div>
<?php } else { ?>
<div class="close close-black"></div>
<h2><?php echo $newsOne->title; ?></h2>
<?php } ?>
<?php echo $newsOne->text; ?>
<div id="social-block" class="clearfix">
    <h4>Рассказать друзьям</h4>
    <div class="social-likes" data-title="<?php if (strlen($newsOne->meta_title) > 0) { echo $newsOne->meta_title; } else { echo $newsOne->title; } ?>" data-url="http://<?php echo  $_SERVER['HTTP_HOST'] . Url::to(['/site/news', 'slug' => $newsOne->slug]); ?>" data-media="<?php if(strlen($newsOne->img) > 0) {?>http://<?php echo  $_SERVER['HTTP_HOST'] . EasyThumbnailImage::thumbnailFileUrl('uploads/news/' . $newsOne->img, 300, 300, EasyThumbnailImage::THUMBNAIL_OUTBOUND); } ?>">
        <div class="facebook" title="Поделиться ссылкой на Фейсбуке">Facebook</div>
        <div class="vkontakte" title="Поделиться ссылкой во Вконтакте">Вконтакте</div>
        <div class="twitter" title="Поделиться ссылкой в Твиттере">Twitter</div>
    </div>
</div>