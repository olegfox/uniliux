<?php

use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;

?>

<div class="close"></div>
<div class="slider">
    <div class="wrap-slider">
        <div class="slider" style="background: url(/uploads/factory/<?php echo $factoryOne->img ?>) center center no-repeat; background-size: cover;">
        </div>
    </div>
</div>
<div class="wrap-head">
    <div class="head">
        <h2><?php echo $factoryOne->title; ?></h2>
    </div>
</div>

<?php echo $factoryOne->text; ?>
<div id="social-block" class="clearfix">
    <h4>Рассказать друзьям</h4>
    <div class="social-likes" data-title="<?php if (strlen($factoryOne->meta_title) > 0) { echo $factoryOne->meta_title; } else { echo $factoryOne->title; } ?>" data-url="http://<?php echo  $_SERVER['HTTP_HOST'] . Url::to(['/site/factory', 'slug' => $factoryOne->slug]); ?>" data-media="<?php if(strlen($factoryOne->img) > 0) {?>http://<?php echo  $_SERVER['HTTP_HOST'] . EasyThumbnailImage::thumbnailFileUrl('uploads/factory/' . $factoryOne->img, 300, 300, EasyThumbnailImage::THUMBNAIL_OUTBOUND); } ?>">
        <div class="facebook" title="Поделиться ссылкой на Фейсбуке">Facebook</div>
        <div class="vkontakte" title="Поделиться ссылкой во Вконтакте">Вконтакте</div>
        <div class="twitter" title="Поделиться ссылкой в Твиттере">Twitter</div>
    </div>
</div>