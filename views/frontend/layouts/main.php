<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\Menu;
use yii\widgets\Breadcrumbs;
use app\assets\FrontendAsset;

/* @var $this \yii\web\View */
/* @var $content string */

FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="pace-done">
<?php $this->beginBody() ?>
<div class="pace  pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
</div>

<div id="st-container" class="st-container">
    <nav class="st-menu st-menu-news st-effect-1" id="st-menu-news"></nav>
    <div class="st-pusher">
        <div class="wrap-container-box">
            <!-- Header -->
            <header class="fixed-header" style="top: 1569px;">
                <div class="header-shadow">
                    <div></div>
                </div>
                <div class="inner">
                    <a class="logo" href="/"></a>
                    <div class="socials">
                        <a href="#"><img src="/frontend/images/fb.jpg" alt="" width="80px" height="80px"/></a>
                    </div>
                    <div class="menu">
                        <?php foreach (Menu::getItems() as $item): ?>
                            <?php if($item['title'] == 'Новости') { ?>
                                <a href="<?php echo Url::to(['/site/news/']); ?>"><?php echo $item['title']; ?></a>
                            <?php } elseif($item['title'] == 'Фабрики') { ?>
                                <a href="<?php echo Url::to(['/site/factory/']); ?>"><?php echo $item['title']; ?></a>
                            <?php } elseif($item['title'] == 'Каталоги') { ?>
                                <a href="<?php echo Url::to(['/site/catalogs/']); ?>"><?php echo $item['title']; ?></a>
                            <?php } elseif($item['title'] == 'Контакты') { ?>
                                <a href="<?php echo Url::to(['/site/contacts/']); ?>"><?php echo $item['title']; ?></a>
                            <?php } else { ?>
                                <a href="<?php echo Url::to(['/']); ?>"><?php echo $item['title']; ?></a>
                            <?php } ?>
                        <?php endforeach; ?>
<!--                        <a href="#">EN</a>-->
                    </div>
                </div>
            </header>
            <!-- end Header -->

            <!-- Search -->
            <div class="search-container">
                <div class="inner">
                    <form action="" method="GET">
                        <div class="wrap">
                            <input name="q" type="text" value="">
                            <input style="display: none" type="submit" value="">
                        </div>
                    </form>
                </div>
            </div>
            <!-- end Search -->

            <!-- Main -->
            <div class="wrap-content"></div>
            <div class="main">
                <?= $content ?>
            </div>
            <!-- end Main -->

            <!-- Footer -->
            <footer>
                <div class="content">
                    <p>Адрес представительства в Москве: Ломоносовский проспект, 29 корпус 2, 119 192 - Москва - Россия</p>
                    <p>Телефон: +7 (495) 225-70-30&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Электронная почта:
                        <a href="mailto:russia@uniliux.ru">russia@uniliux.ru</a></p>
                </div>
            </footer>
            <!-- end Footer -->
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
