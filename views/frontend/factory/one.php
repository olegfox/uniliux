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
    <div class="social">
        <?php if(!empty($factoryOne->link)): ?>
            <a href="<?= $factoryOne->link ?>" class="link" target="_blank"><?= rtrim(str_replace('http://', '', $factoryOne->link), '/') ?></a>
        <?php endif; ?>
        <?php if(!empty($factoryOne->link_fb)): ?>
            <a href="<?= $factoryOne->link_fb ?>" target="_blank"><i class="facebook fa fa-facebook"></i></a>
        <?php endif; ?>
        <?php if(!empty($factoryOne->link_vk)): ?>
            <a href="<?= $factoryOne->link_vk ?>" target="_blank"><i class="vkontakte fa fa-vk"></i></a>
        <?php endif; ?>
        <?php if(!empty($factoryOne->link_inst)): ?>
            <a href="<?= $factoryOne->link_inst ?>" target="_blank"><i class="instagram fa fa-instagram"></i></a>
        <?php endif; ?>
        <?php if(!empty($factoryOne->link_youtube)): ?>
            <a href="<?= $factoryOne->link_youtube ?>" target="_blank"><i class="youtube fa fa-youtube"></i></a>
        <?php endif; ?>
    </div>
</div>