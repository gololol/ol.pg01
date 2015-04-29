<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ol
 * Date: 05.02.15
 * Time: 10:36
 * To change this template use File | Settings | File Templates.
 */
// Создание коротких имён переменных
$tireqty    =   $_POST['tireqty'];
$oilqty     =   $_POST['oilqty'];
$sparkqty   =   $_POST['sparkqty'];
$find       =   $_POST['find'];
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
        echo date('H:i, jS F Y');
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
<<<<<<< HEAD
<<<<<<< HEAD
        exit;
=======
>>>>>>> 2cb326c616dcdf11ad51797659bc1a0227879e22
=======
>>>>>>> 2cb326c616dcdf11ad51797659bc1a0227879e22
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
<<<<<<< HEAD
<<<<<<< HEAD
    echo 'circle while';
    $field1 = "Расстояние";
    $field2 = "Стоимость";
    echo "<table border=\"0\" cellpadding=\"3\"><tr><td bgcolor=\"#cccccc\" align=\"center\">Расстояние</td>
    <td bgcolor=\"#cccccc\" align=\"center\">".$field2."</td> </tr>";
    $distance = 50;
    while ($distance <= 250){
        echo "<tr><td align=\"right\">".$distance."</td><td align=\"right\">".($distance/10)."</td></tr>\n";
        $distance += 50;
    }
    echo "</table>";

    echo '<br />'; echo '<br />';
    echo '---------------------------------------------------------------------<br />';
    echo 'circle for';
    $field1 = "Расстояние"; $field2 = "Стоимость";
    echo "<table border=\"0\" cellpadding=\"3\"><tr><td bgcolor=\"#cccccc\" align=\"center\">".$field1."</td>
    <td bgcolor=\"#cccccc\" align=\"center\">".$field2."</td> </tr>";
    for ($distance=50; $distance<=250; $distance+=50 ) {
        echo "<tr><td align=\"right\">".$distance."</td><td align=\"right\">".($distance/10)."</td></tr>\n";
    }
    echo "</table>";

    echo '<br />'; echo '<br />';echo '---------------------------------------------------------------------<br />';echo 'circle do..while';
    $field1 = "Расстояние"; $field2 = "Стоимость";
    echo "<table border=\"0\" cellpadding=\"3\"><tr><td bgcolor=\"#cccccc\" align=\"center\">".$field1."</td>
    <td bgcolor=\"#cccccc\" align=\"center\">".$field2."</td> </tr>";
    $distance=50;
    do{
        echo "<tr><td align=\"right\">".$distance."</td><td align=\"right\">".($distance/10)."</td></tr>\n";
        $distance+=50;
    } while ($distance<=250);
    echo "</table>";

    echo '<br />';
    echo '<br />';
    echo '---------------------------------------------------------------------<br />';
=======
>>>>>>> 2cb326c616dcdf11ad51797659bc1a0227879e22
=======
>>>>>>> 2cb326c616dcdf11ad51797659bc1a0227879e22

    echo 'isset($tireqty): '.isset($tireqty).'<br />';
    echo 'isset($nothere): '.isset($nothere).'<br />';
    echo 'empty($tireqty): '.empty($tireqty).'<br />';
    echo 'empty($nothere): '.empty($nothere).' если 1, это значит, что переменная не существует или если существует, то пустая'.'<br />';
    echo 'intval($tireqty): '.intval($tireqty).'<br />';
    echo 'floatval($tireqty): '.floatval($tireqty).'<br />';
    echo 'strval($tireqty): '.strval($tireqty).'<br />';
    echo '---------------------------------------------------------------------<br />';

    $a = 1;
    echo '$a = 1;'.'<br />';
    echo '$a is type of: '.gettype($a).'<br />';
    $b = 1.25;
    echo '$b = 1.25;'.'<br />';
    echo '$b is type of: '.gettype($b).'<br />';
    echo 'is_null($b): '.is_null($b).'<br />';
    if (is_null($b) == true) {
        echo 'is_null('.$b.') = '.'true'.'<br />';
    }
    else {
        echo 'is_null('.$b.') = '.'false'.'<br />';
    }

    $b = null;
    echo '$b = null'.'<br />';
    echo 'is_null($b): '.is_null($b).'<br />';
    if (is_null($b) == true) {
        echo 'is_null(null) = '.'true'.'<br />';
    }
    else {
        echo 'is_null('.$b.') = '.'false'.'<br />';
    }


?>
</body>
</html>
