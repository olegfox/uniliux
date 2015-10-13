<?php

use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
if(isset($newsOne)) {
    if(strlen($newsOne->meta_title) > 0){
        $this->title = $factoryOne->meta_title;
        $this->registerMetaTag(['property'=>'og:title', 'content'=>$newsOne->meta_title], 'og:title');
    } else {
        $this->title = $newsOne->title;
        $this->registerMetaTag(['property'=>'og:title', 'content'=>$newsOne->title], 'og:title');
    }

    $this->registerMetaTag(['description' => $newsOne->meta_description]);
    $this->registerMetaTag(['keywords' => $newsOne->meta_keywords]);
    $this->registerMetaTag(['property'=>'og:description', 'content'=>$newsOne->meta_description], 'og:description');
    if(strlen($newsOne->img) > 0) {
        $this->registerMetaTag(['property' => 'og:image', 'content' => 'http://' . $_SERVER['HTTP_HOST'] . EasyThumbnailImage::thumbnailFileUrl('uploads/factory/' . $newsOne->img, 300, 300, EasyThumbnailImage::THUMBNAIL_OUTBOUND)], 'og:image');
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

<?php if(count($news) > 0) { ?>
    <div class="feature feature-news" id="feature" style="background-image: url(/uploads/news/<?php echo $news[0]->img; ?>); background-repeat: no-repeat; background-size: cover;">
        <a href="<?php echo Url::to(['/site/news', 'slug' => $news[0]->slug]); ?>" class="wrap" data-effect="st-effect-1" data-text="<?php echo urlencode(file_get_contents('http://' . $_SERVER['HTTP_HOST'] . Url::to(['/site/newscontent', 'slug' => $news[0]->slug]))); ?>">
            <div class="inner">
                <div class="block-dates">
                    <nobr><?php echo date('d/m/Y', strtotime($news[0]->date)); ?></nobr>
                </div>
                <h1><?php echo $news[0]->title; ?></h1>
            </div>
        </a>
    </div>
<?php } ?>

<div class="content">

    <div class="news-list">
        <?php foreach ($news as $item): ?>
            <div>
                <a class="inner" href="<?php echo Url::to(['/site/news', 'slug' => $item->slug]); ?>" data-effect="st-effect-1" data-text="<?php echo urlencode(file_get_contents('http://' . $_SERVER['HTTP_HOST'] . Url::to(['/site/newscontent', 'slug' => $item->slug]))); ?>">
                    <div class="block-img" style="background-image: url(/uploads/news/<?php echo $item->img; ?>); background-size: cover;"></div>
                    <div class="block-cont">
                        <div class="block-dates">
                            <nobr><?php echo date('d/m/Y', strtotime($item->date)); ?></nobr>
                        </div>
                        <div class="block-title"><?php echo $item->title; ?></div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php
if(isset($newsOne)){
    $script = <<< JS
    $(function(){
        $(".news-list *[href='/site/news?slug=" + getParameterByName('slug') + "']")[0].click();
    });
JS;

    $this->registerJs($script, yii\web\View::POS_READY);
}
?>