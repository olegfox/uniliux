<?php

use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
if(isset($factoryOne)) {
    if(strlen($factoryOne->meta_title) > 0){
        $this->title = $factoryOne->meta_title;
        $this->registerMetaTag(['property'=>'og:title', 'content'=>$factoryOne->meta_title], 'og:title');
    } else {
        $this->title = $factoryOne->title;
        $this->registerMetaTag(['property'=>'og:title', 'content'=>$factoryOne->title], 'og:title');
    }

    $this->registerMetaTag(['description' => $factoryOne->meta_description]);
    $this->registerMetaTag(['keywords' => $factoryOne->meta_keywords]);
    $this->registerMetaTag(['property'=>'og:description', 'content'=>$factoryOne->meta_description], 'og:description');
    if(strlen($factoryOne->img) > 0) {
        $this->registerMetaTag(['property' => 'og:image', 'content' => 'http://' . $_SERVER['HTTP_HOST'] . EasyThumbnailImage::thumbnailFileUrl('uploads/factory/' . $factoryOne->img, 300, 300, EasyThumbnailImage::THUMBNAIL_OUTBOUND)], 'og:image');
    } else {
        $this->registerMetaTag(['property' => 'og:image', 'content' => 'http://' . $_SERVER['HTTP_HOST'] . '/frontend/images/logo.png'], 'og:image');
    }
} else {
    $this->title = $page->title;
    $this->registerMetaTag(['description' => $page->meta_description]);
    $this->registerMetaTag(['keywords' => $page->meta_keywords]);
    $this->registerMetaTag(['property'=>'og:title', 'content'=>$page->title], 'og:title');
    $this->registerMetaTag(['property'=>'og:description', 'content'=>$page->meta_description], 'og:description');
    $this->registerMetaTag(['property' => 'og:image', 'content' => 'http://' . $_SERVER['HTTP_HOST'] . '/frontend/images/logo.png'], 'og:image');
}
?>

<div class="content">

    <div class="factory-list">
        <?php foreach ($factory as $item): ?>
            <div>
                <a class="inner" href="<?php echo Url::to(['/site/factory', 'slug' => $item->slug]); ?>" data-effect="st-effect-1" data-text="<?php echo urlencode(file_get_contents('http://' . $_SERVER['HTTP_HOST'] . Url::to(['/site/factorycontent', 'slug' => $item->slug]))); ?>">
                    <div class="block-img" style="background-image: url(/uploads/factory/<?php echo $item->img; ?>); background-size: cover;"></div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php
if(isset($factoryOne)){
    $script = <<< JS
    $(function(){
        $(".factory-list *[href='/site/factory?slug=" + getParameterByName('slug') + "']")[0].click();
    });
JS;

    $this->registerJs($script, yii\web\View::POS_READY);
}
?>