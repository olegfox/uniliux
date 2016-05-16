<?php
use yii\helpers\Url;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Пароль с сайта Uniliux</title>
</head>
<body style="margin: 0px; width: 700px; font-family: Arial;">
<div class="content">

    Для перехода в раздел каталогов перейдите по ссылке: <a href="<?php echo Yii::$app->request->hostInfo . Url::to(['/site/login/']); ?>" target="_blank"><?php echo Yii::$app->request->hostInfo . Url::to(['/site/catalogs/']); ?></a>
    <br/>
    <br/>
    Данные для входа: <br/>
    E-mail: <?php echo $client->email; ?><br/>
    Ваш пароль: <?php echo $client->passwordText; ?>

</div>
</body>
</html>

