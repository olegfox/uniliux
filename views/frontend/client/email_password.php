<?php
use yii\helpers\Url;
?>

<html>
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<body>
	<p>Уважаемый Клиент,</p>

<p>&nbsp;</p>

<p>Благодарим Вас за то, что вы зарегистрировались на нашем сайте Uniliux!</p>

<p>Здесь вы будете иметь доступ ко всем каталогам наших фабрик.</p>

<p>&nbsp;</p>

<p>Для перехода в раздел каталогов перейдите по ссылке:<a href="<?php echo Yii::$app->request->hostInfo . Url::to(['/site/catalogs/']); ?>"><?php echo Yii::$app->request->hostInfo . Url::to(['/site/catalogs/']); ?></a></p>

<p>&nbsp;</p>

<p>Данные для входа:</p>

<p>E-mail: <?php echo $client->email; ?></p>

<p>Ваш пароль: <?php echo $client->passwordText; ?></p>

<p>&nbsp;</p>

<p>Нажав на каталог мышкой, вы можете скачать его в формате pdf либо просмотреть его on-line, щелкнув правой кнопкой мыши.</p>

<p>&nbsp;</p>

<p>По любым вопросам касательно печатных каталогов, прайсов, условий работы и т.д., вы можете связаться с нами по электронной почте:&nbsp;<a href="mailto:info@uniliux.ru">info@uniliux.ru</a>.</p>

<p>Мы будем рады предоставить вам всю необходимую информацию!</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>До скорого,</p>

<p>Команда Uniliux</p>

<p>&nbsp;</p>

<p>UNILIUX BY FREZZA ARREDAMENTI - MOSCOW</p>

<p>Ломоносовский проспект, 29 к.2 - 119192 - Москва</p>

<p>tel. &nbsp;+7 (495) 225-70-30&nbsp;</p>

<p><a href="https://www.google.com/url?q=https://youtu.be/V_QZuaKIawU&amp;sa=D&amp;ust=1472768695752000&amp;usg=AFQjCNE33qZTB3FQ2vTcw46_kNnxagnJxg">где мы находимся</a></p>

<p><a href="https://www.google.com/url?q=http://www.uniliux.ru/&amp;sa=D&amp;ust=1472768695753000&amp;usg=AFQjCNGTDg_2EiJcALE217cHaDcCWTqZvQ">www.uniliux.ru</a></p>

<p>СЛЕДУЙТЕ ЗА НАМИ!</p>

<p>
<a href="https://www.facebook.com/uniliux/?ref=bookmarks"><img src="<?= $message->embed($image1); ?>" style="height:37px; width:37px" /></a>&nbsp;<a href="https://www.instagram.com/uniliux_byfrezza/"><img src="<?= $message->embed($image3); ?>" style="height:37px; width:37px" /></a>&nbsp;<a href="https://www.youtube.com/channel/UCjs30SoitT-6h986qLNMpUg"><img src="<?= $message->embed($image2); ?>" style="height:42px; width:42px" /></a>
</p>

</body>
</html>