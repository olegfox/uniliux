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

<div class="pace  pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
</div>

<!-- Header -->
<header class="fixed-header" style="top: 1569px;">
    <div class="header-shadow">
        <div></div>
    </div>
    <div class="inner">
        <a class="logo" href="/"></a>
        <div class="search">
            <a class="search" href="#"></a>
        </div>
        <div class="menu">
            <?php foreach (Menu::getItems() as $item): ?>
                <a href="<?php echo Url::to(['/']); ?>"><?php echo $item['title']; ?></a>
            <?php endforeach; ?>
            <a href="#">EN</a>
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
<div class="main">

<?php $this->beginBody() ?>

    <?= $content ?>

<?php $this->endBody() ?>
</div>
<!-- end Main -->

<!-- Footer -->
<footer>
    <div class="content">
        <article class="footer_1 shown">
            <div class="inner">
                <h1>О нас</h1>

                <p>ArtManagement предоставляет услуги в области PR-сопровождения культурных проектов с 2009 года.<br>За
                    шесть лет работы мы накопили опыт в осуществлении крупных международных и российских проектов,
                    которым были посвящены сотни публикаций в СМИ.<br>Агентство выполняет полный цикл работ — от
                    разработки PR-стратегии мероприятия до формирования итогового пресс-отчета. Среди наших услуг также
                    проведение пресс-конференций, организация пресс-туров, работа с новыми медиа.</p>
            </div>
        </article>

        <article class="footer_2 shown">
            <div class="inner">
                <p>105120, Россия, Москва,<br>Нижняя Сыромятническая ул., 10 стр. 4, этаж 4, офис 410<br>+7
                    (499) 753-02-81<br><a href="mailto:pr@artmanagement.ru">pr@artmanagement.ru</a></p>
            </div>
        </article>

        <article class="footer_3 shown">
            <div class="inner">
                <a class="soc facebook" href="https://www.facebook.com/pages/%D0%9A%D0%BE%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D1%8F-Artmanagement/111570985528105" target="_blank"></a><a class="soc vkontakte" href="http://vk.com/artguideru" target="_blank"></a>
            </div>
        </article>

        <article class="footer_4 shown">
            <div class="inner">
                <p>@ 2009—2015 ArtManagement.<br>Сделано в <a href="http://charmerstudio.com/" target="_blank">Charmer</a></p>
            </div>
        </article>

    </div>

</footer>
<!-- end Footer -->

</body>
</html>
<?php $this->endPage() ?>
