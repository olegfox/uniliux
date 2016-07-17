<?php

use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View */
$this->title = 'Uniliux';
?>

<div class="feature" id="feature">
    <div class="slider">
        <?php foreach ($sliders as $slider): ?>
            <div style="background: url('/uploads/slider/<?php echo $slider->img; ?>') center center no-repeat; background-size: cover;">
                <?php if($slider->logo): ?>
                <div class="logoSlid"><img alt="" src="/uploads/slider/<?php echo $slider->logo; ?>"/></div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="content">

    <div class="factory-list factory-list-main">
        <h1>Фабрики</h1>
        <?php foreach ($factories as $factory): ?>
            <div>
                <a class="inner" href="<?php echo Url::to(['/site/factory', 'slug' => $factory->slug]); ?>" data-effect="st-effect-1" data-url="" data-text="<?php echo urlencode(file_get_contents('http://' . $_SERVER['HTTP_HOST'] . Url::to(['/site/factorycontent', 'slug' => $factory->slug]))); ?>">
                <!--<a class="inner" href="<?php //echo Url::to(['/site/factory', 'slug' => $item->slug]); ?>" data-effect="st-effect-1" data-url="<?php //echo Url::to(['/site/factorycontent', 'slug' => $item->slug]); ?>"> -->
                    <div class="block-img" style="position: relative; background-color: #fff;"><div style="<?php if (file_exists( 'uploads/factory/' . $factory->img) && !empty($factory->img)) { ?>background: #fff url(/uploads/factory/<?php echo $factory->img; ?>) center center no-repeat; background-size: contain; position: absolute; width: 230px; height: 130px; top: 0; bottom: 0; left: 0; right: 0; margin: auto;<?php } else { ?> background-color: #fff; <?php } ?>"></div></div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php $this->registerJsFile('frontend/scripts/pace.min.js'); ?>