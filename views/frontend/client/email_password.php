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

<p>Для Вашего удобства, в приложении этого письма, Вы найдете список всех фабрик, которые мы представляем. &nbsp;</p>

<p>Кроме того, в приложении Вы найдете брошюру о шоу &ndash; руме Bertolotto Porte в Москве, это уникальное место, которое создано специально для Вас.</p>

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

<p><img src="<?= $message->embed($image1); ?>" style="height:37px; width:37px" />&nbsp;<img src="<?= $message->embed($image3); ?>" style="height:37px; width:37px" />&nbsp;<img src="<?= $message->embed($image2); ?>" style="height:42px; width:42px" /></p>

<p>Мы ждем вас в шоуруме BERTOLOTTO PORTE</p>

<p>по адресу: 119192,&nbsp;Москва, Ломоносовский проспект, 29 корпус 1</p>

<p><a href="https://www.google.com/url?q=https://drive.google.com/folderview?id%3D0B_S8XTluw9F6ZUlfN1hTYTdiYjA%26usp%3Dsharing&amp;sa=D&amp;ust=1472768695757000&amp;usg=AFQjCNGypCeVvUXQzQ2_Icz052j74Mg4qg">ПОСМОТРИТЕ ФОТОГРАФИИ ШОУРУМА</a></p>

<p><a href="https://www.google.com/url?q=http://www.bertolotto.com/%25C2%25A0&amp;sa=D&amp;ust=1472768695758000&amp;usg=AFQjCNGM6ZNDxFDg40qYLSwuZPpnuSXpHA">www.bertolotto.com</a></p>
</body>
</html>