<?php
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

    <article class="medium-height shown">
        <a class="inner" href="#" style="background-color: #39bfa9">
            <div class="block-content">
                <div class="block-title" style="color: #39bfa9">Выставка</div>
                <div class="block-dates">Ледокол «Ленин», D.E.V.E. Gallery<br>
                    <nobr>сентябрь 2013</nobr>
                    <span class="long-line"></span>
                    <nobr>январь 2014</nobr>
                </div>
                <div class="block-name">Ленин: Ледокол</div>
            </div>
            <div class="block-image" style="background-image: url(/frontend/images/regular_preview_picture1.jpg)"></div>
        </a>
    </article>

    <article class="small-height shown">
        <a class="inner" href="#" style="background-color: #f23d88">
            <div class="block-content">
                <div class="block-title" style="color: #f23d88">Биеннале</div>
                <div class="block-dates">Здание типографии «Уральский рабочий»<br>
                    <nobr>сентябрь 2010</nobr>
                    <span class="long-line"></span>
                    <nobr>октябрь 2010</nobr>
                </div>
                <div class="block-name">1-я Уральская индустриальная биеннале современного искусства</div>
            </div>
            <div class="block-image" style="background-image: url(/frontend/images/regular_preview_picture2.jpg)"></div>
        </a>
    </article>

    <article class="medium-height shown">
        <a class="inner" href="#" style="background-color: #39bfa9">
            <div class="block-content">
                <div class="block-title" style="color: #39bfa9">Выставка</div>
                <div class="block-dates">Центр современного искусства «Винзавод»<br>
                    <nobr>ноябрь 2013</nobr>
                    <span class="long-line"></span>
                    <nobr>январь 2014</nobr>
                </div>
                <div class="block-name">Вне поля зрения</div>
            </div>
            <div class="block-image" style="background-image: url(/frontend/images/regular_preview_picture3.jpg)"></div>
        </a>
    </article>

    <article class="small-height shown">
        <a class="inner" href="#" style="background-color: #39bfa9">
            <div class="block-content">
                <div class="block-title" style="color: #39bfa9">Выставка</div>
                <div class="block-dates">Дом на набережной<br>
                    <nobr>март 2015</nobr>
                    <span class="long-line"></span>
                    <nobr>апрель 2015</nobr>
                </div>
                <div class="block-name"><span>Льонель Фавре</span><br>Донецк. Не только дым</div>
            </div>
            <div class="block-image" style="background-image: url(/frontend/images/regular_preview_picture4.jpg)"></div>
        </a>
    </article>

    <article class="small-height shown">
        <a class="inner" href="#" style="background-color: #39bfa9">
            <div class="block-content">
                <div class="block-title" style="color: #39bfa9">Выставка</div>
                <div class="block-dates">Московский музей современного искусства<br>
                    <nobr>май 2012</nobr>
                    <span class="long-line"></span>
                    <nobr>июнь 2012</nobr>
                </div>
                <div class="block-name"><span>Виталий Пушницкий</span><br>Механизмы времени</div>
            </div>
            <div class="block-image" style="background-image: url(/frontend/images/regular_preview_picture5.jpg)"></div>
        </a>
    </article>

    <article class="full-height shown">
        <a class="inner" href="#" style="background-color: #806aed">
            <div class="block-content">
                <div class="block-title" style="color: #806aed">Открытие</div>
                <div class="block-dates">Новый музей<br>
                    <nobr>июнь 2010</nobr>
                </div>
                <div class="block-name">Открытие Нового музея в Санкт-Петербурге</div>
            </div>
            <div class="block-image" style="background-image: url(/frontend/images/vertical_preview_picture1.jpg)"></div>
        </a>
    </article>

    <article class="full-height shown">
        <a class="inner" href="#" style="background-color: #39bfa9">
            <div class="block-content">
                <div class="block-title" style="color: #39bfa9">Выставка</div>
                <div class="block-dates">Дом на набережной<br>
                    <nobr>июль 2014</nobr>
                    <span class="long-line"></span>
                    <nobr>август 2014</nobr>
                </div>
                <div class="block-name">Художественное изобретение себя и чистое удовольствие от жизни и любви</div>
            </div>
            <div class="block-image" style="background-image: url(/frontend/images/vertical_preview_picture2.jpg)"></div>
        </a>
    </article>

    <article class="small-height shown">
        <a class="inner" href="#" style="background-color: #b3bf30">
            <div class="block-content">
                <div class="block-title" style="color: #b3bf30">Фестиваль</div>
                <div class="block-dates">Московская государственная консерватория имени П.И.Чайковского,
                    Театрально-культурный центр имени Вс. Мейерхольда, Центр творческих индустрий «Фабрика»<br>
                    <nobr>апрель 2014</nobr>
                    <span class="long-line"></span>
                    <nobr>май 2014</nobr>
                </div>
                <div class="block-name">Ожидание</div>
            </div>
            <div class="block-image" style="background-image: url(/frontend/images/regular_preview_picture.png)"></div>
        </a>
    </article>

</div>

<?php $this->registerJsFile('frontend/scripts/pace.min.js'); ?>