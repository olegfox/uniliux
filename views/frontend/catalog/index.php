<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = $page->title;
?>

<div class="content">
    <div class="page">
        <?php if (Yii::$app->user->isGuest) { ?>
            <p>
                Для того, чтобы получить доступ к нашему каталогу продукции, вам необходимо зарегистрироваться.<br><br>
                Регистрация абсолютно бесплатна!<br><br>
            </p>
            <a class="btn" href="<?php echo Url::to(['/site/reg/']); ?>">Регистрация</a>
            <a class="btn" href="<?php echo Url::to(['/site/login/']); ?>">Вход</a>
        <?php } else { ?>
            <div class="catalogs-list">
                <?php foreach ($catalogs as $catalog): ?>
                <div>
                    <a class="inner" href="/uploads/catalog/<?php echo $catalog->file; ?>" download="<?php echo $catalog->getFileNameForDownload(); ?>">
                        <img src="/uploads/catalog/<?php echo $catalog->img; ?>" alt=""/>
                        <div class="block-cont">
                            <div class="block-title"><?php echo $catalog->title; ?></div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        <?php } ?>
    </div>
</div>
