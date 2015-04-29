<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ol
 * Date: 05.02.15
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */
// Создание коротких имён переменных
$tireqty        =   $_POST['tireqty'];
$oilqty         =   $_POST['oilqty'];
$sparkqty       =   $_POST['sparkqty'];
$find           =   $_POST['find'];
$DOCUMENT_ROOT  =   $_SERVER['DOCUMENT_ROOT'];
$date           =   date('H:i, jS F Y');
?>
<html>
<head>
    <title>Автозапчасти от Вована - Результаты заказа (head)</title>
</head>

<body>
<h1>Автозапчасти от Вована (h1)</h1>
<h2>Результаты заказа (h2)</h2>
<?php

    $totalamount = 0.00;

    define('TIREPRICE', 100);
    define('OILPRICE', 10);
    define('SPARKPRICE', 4);

    $totalamount    = $tireqty * TIREPRICE
                    + $oilqty * OILPRICE
                    + $sparkqty * SPARKPRICE;
    if ($totalamount>0){
        echo '<p>Заказ обработан в ';
        //echo date('H:i, jS F Y');
        echo $date;
        echo '</p>';
        #echo "<p> Заказ обработан в ".date('H:i, jS F Y')."</p>";

        echo '<p>Заказано: </p>';
        #echo $tireqty.' покрышек<br />';
        echo "$tireqty покрышек<br />";
        echo $oilqty.' бутылок масла<br />';
        echo $sparkqty.' свечей зажигания<br />';

        echo "<p>Как клиент нашёл нас?</p>";
        switch ($find){
            case "a":
                echo "<p>Я постоянный клиент</p>";
                break;
            case "b":
                echo "<p>В телевизионной рекламе</p>";
                break;
            case "c":
                echo "<p>В телефонном справочнике</p>";
                break;
            case "d":
                echo "<p>Устная рекомнедация</p>";
                break;
            defaul:
                echo "<p>Непонятно, как этот клиент нашёл нас.</p>";
                break;
        }

        $totalqty = 0;
        $totalqty = $tireqty + $oilqty + $sparkqty;
        echo "Заказано товаров: ".$totalqty."<br />";

        echo "Итого: $".number_format($totalamount,2)."<br />";
        $taxrate = 0.10; // местный налог с продаж 10%
        $totalamount_2 = $totalamount * (1 + $taxrate);
        echo "Всего, включая налог с продаж: $".number_format($totalamount_2,2)."<br />";
        echo "Налог: $".number_format($totalamount*$taxrate,2)."<br />";
    }
    else {
        echo '<p style='.'"color:red"'.'>';
        echo 'На предыдущей странице заказа не было!';
        echo '</p>';
    }

    if ($tireqty < 10){
        $discont = 0;
    } elseif (($tireqty >= 10) && ($tireqty < 50)) {
        $discont = 5;
    } elseif (($tireqty >= 50) && ($tireqty < 100)){
        $discont = 10;
    } elseif ($tireqty >=100){
        $discont = 15;
    }
    echo '$discont = '.$discont.'<br />';

    echo '<br />';
    echo '<br />';
    echo '---------------------------------------------------------------------<br />';

    echo 'DOCUMENT_ROOT: '.$DOCUMENT_ROOT.'<br />';
    //    echo "DOCUMENT_ROOT: ".$DOCUMENT_ROOT."<br />";
    //    echo "DOCUMENT_ROOT: $DOCUMENT_ROOT<br />";


    $outputstring = "Дата: ".$date.";\t".
                    "Покрышки (количество): ".$tireqty.";\t".
                    "Бутылок масла (количество): ".$oilqty.";\t".
                    "Свечей зажигания (количество): ".$sparkqty.";\t".
                    "Сумма: $".number_format($totalamount,2).";\n";

    //echo $outputstring.'<br />';

    @ $fp = fopen("$DOCUMENT_ROOT/orders/orders.txt",'ab');
    if (!$fp){
        echo"<p>В настоящий момент ваш запрос не может быть обработан. "
            ."Пожалуйста, попытайтесь позже.</p></body></html>";
    }else{
        flock($fp, LOCK_EX);
        fwrite($fp, $outputstring, strlen($outputstring));
        flock($fp, LOCK_UN);
        fclose($fp);
        echo "<p>Заказ записан.</p>";
    }

?>
</body>
</html>
