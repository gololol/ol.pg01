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
$email          = trim($_POST['email']);
$feedback       = trim($_POST['feedback']);

// постоянная информация
$toaddress      = "feedback@example.com";
$subject        = "отзыв с web-сайта";
$mailcontent    = "Имя клиента: ".$name."\n".
                    "E-mail клиента: ".$email."\n".
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

    $email_array = explode('@', $email);
    $count = count($email_array);
    echo '<br />';
    echo 'count of email_array: '.$count.'<br />';
    for ($i=0; $i<$count; $i++)
    {
        echo 'email_array['.$i.']: '.$email_array[$i].'<br />';
    }
    foreach($email_array as $line)
    {
        echo $line.'<br />';
    }
    if (strtolower($email_array[1])=="bigcustomer.com") {
        $toaddress = "bob@example.com";
    } else {
        $toaddress = "feedback@example.com";
    }
    echo "toaddress: ".$toaddress."<br />";

    // function implode()
    $new_address = implode('@', $email_array);
    echo 'new_address: '.$new_address.'<br />';
    ?>
</body>
</html>