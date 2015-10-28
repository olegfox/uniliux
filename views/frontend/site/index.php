<?php

use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
$this->title = 'Uniliux';
?>

<div class="feature" id="feature">
    <div class="slider">
        <?php foreach ($sliders as $slider): ?>
            <div style="background: url('/uploads/slider/<?php echo $slider->img; ?>') center center no-repeat; background-size: cover;"></div>
        <?php endforeach; ?>
    </div>
</div>

<div class="content">

    <div class="factory-list factory-list-main">
        <h1>Фабрики</h1>
        <?php foreach ($factories as $factory): ?>
            <div>
                <a class="inner" href="<?php echo Url::to(['/site/factory', 'slug' => $factory->slug]); ?>">
                    <div class="block-img" style="background-image: url(/uploads/factory/<?php echo $factory->img; ?>); background-size: cover;"></div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="news-list news-list-main">
        <h1>Новости</h1>
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

<?php $this->registerJsFile('frontend/scripts/pace.min.js'); ?>