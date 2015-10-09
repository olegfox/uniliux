<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Uniliux';
?>

<?php if(count($news) > 0) { ?>
    <div class="feature feature-news" id="feature" style="background-image: url(/uploads/news/<?php echo $news[0]->img; ?>); background-repeat: no-repeat; background-size: cover;">
        <div class="wrap">
            <div class="inner">
                <div class="block-dates">
                    <nobr><?php echo date('d/m/Y', strtotime($news[0]->date)); ?></nobr>
                </div>
                <h1><?php echo $news[0]->title; ?></h1>
            </div>
        </div>
    </div>
<?php } ?>

<div class="content">

    <div class="news-list">
        <?php foreach ($news as $item): ?>
            <div>
                <a class="inner" href="<?php echo Url::to(['/']); ?>">
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