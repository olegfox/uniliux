<?php

use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;

?>

<?php if(strlen($newsOne->img) > 0) { ?>
<div class="close"></div>
<div class="slider">
<!--    --><?php //foreach ($newsOne->getPhotos() as $photo): ?>
    <div class="wrap-slider">
        <div class="slider" style="background: url(http://<?php echo  $_SERVER['HTTP_HOST'] . EasyThumbnailImage::thumbnailFileUrl('uploads/news/' . $newsOne->img, 1920, 1080, EasyThumbnailImage::THUMBNAIL_OUTBOUND); ?>) center center no-repeat; background-size: cover;">
        </div>
    </div>
<!--    --><?php //endforeach; ?>
</div>
<div class="wrap-head">
    <div class="head">
        <span class="date"><?php echo date('d/m/Y', strtotime($newsOne->date)); ?></span>
        <h2><?php echo $newsOne->title; ?></h2>
    </div>
</div>
<?php } else { ?>
<div class="close close-black"></div>
<span class="date"><?php echo date('d/m/Y', strtotime($newsOne->date)); ?></span>
<h2><?php echo $newsOne->title; ?></h2>
<?php } ?>
<?php echo $newsOne->text; ?>
<div id="social-block" class="clearfix">
    <div class="social-likes" data-title="<?php if (strlen($newsOne->meta_title) > 0) { echo $newsOne->meta_title; } else { echo $newsOne->title; } ?>" data-url="http://<?php echo  $_SERVER['HTTP_HOST'] . Url::to(['/site/news', 'slug' => $newsOne->slug]); ?>" data-media="<?php if(strlen($newsOne->img) > 0) {?>http://<?php echo  $_SERVER['HTTP_HOST'] . EasyThumbnailImage::thumbnailFileUrl('uploads/news/' . $newsOne->img, 300, 300, EasyThumbnailImage::THUMBNAIL_OUTBOUND); } ?>">
        <i class="facebook fa fa-facebook-square" title="Поделиться ссылкой на Фейсбуке"></i>
        <i class="vkontakte fa fa-vk" title="Поделиться ссылкой во Вконтакте"></i>
    </div>
</div>