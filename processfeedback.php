<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gol
 * Date: 21.05.15
 * Time: 15:24
 * To change this template use File | Settings | File Templates.
 */
// создание коротких переменных
$name           = trim($_POST['name']);
$emale          = trim($_POST['email']);
$feedback       = trim($_POST['feedback']);

// постоянная информация
$toaddress      = "feedback@example.com";
$subject        = "отзыв с web-сайта";
$mailcontent    = "Имя клиента: ".$name."\n".
                    "E-mail клиента: ".$emale."\n".
                    "Коментарий клиента: ".$feedback."\n";
$fromaddress    = "From: webserver@example.com";

?>

<html>
<head>
    <title>Автозапчасти - Отзыв отправлен</title>
</head>
<body>
    <h1>Отзыв отправлен</h1>
    <?php
    // отправка почтового сообщения с помощью функции mail()
    $send_mail = mail($toaddress, $subject, $mailcontent, $fromaddress);
    if ($send_mail) {
        echo '<p>'.'Ваш отзыв (приведённый ниже) отправлен.'.'</p>';
        echo '<p>'.nl2br($mailcontent).'</p>';
    } else {
        echo '<p>'.'Ваш отзыв не отправлен.'.'</p>';
    }

    ?>
</body>
</html>