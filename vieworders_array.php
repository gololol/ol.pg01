<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gol
 * Date: 16.04.15
 * Time: 18:22
 * To change this template use File | Settings | File Templates.
 */
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
    <title>Автозапчасти от Вована - Заказы от клиентов</title>
</head>
<body>
    <h1>Просмотр заказов от клиентов</h1>
    <h2>Просмотр заказов от клиентов</h2>

<?php
    $f = $DOCUMENT_ROOT."/ord/orders.txt";
    $orders = file($f);

    $number_of_orders = count($orders);
    if ($number_of_orders == 0) {
        echo "<p><strong>Нет необработанных заказов. Загляните позже.</strong></p>";
    } else {
        for ($i = 0; $i < $number_of_orders; $i++) {
            echo $orders[$i]."<br />";
        }
    }

    // подсчёт количества заказов, хранящихся в массиве
    $number_of_orders = count($orders);
    if ($number_of_orders == 0) {
        echo "<p><strong>Нет необработанных заказов</strong></p>";
    }

    echo "<table border=\"1\">\n";
    echo "<tr>".
        "<th bgcolor = \"#ccccff\">Дата</th>".
        "<th bgcolor = \"#ccccff\">Покрышки</th>".
        "<th bgcolor = \"#ccccff\">Бутылок</th>".
        "<th bgcolor = \"#ccccff\">Свечи зажигания</th>".
        "<th bgcolor = \"#ccccff\">Адрес</th>".
        "<th bgcolor = \"#ccccff\">Сумма</th>".
        "</tr>";

    for ($i=0; $i<$number_of_orders; $i++) {
        // Разбиение строк
        $line = explode("\t", $orders[$i]);

        // Сохранение только количества заказанных товаров
        $line[1] = intval($line[1]);
        $line[2] = intval($line[2]);
        $line[3] = intval($line[3]);

        // Вывод заказов
        echo "<tr>".
            "<td>".$line[0]."</td>".
            "<td align=\"right\">".$line[1]."</td>".
            "<td align=\"right\">".$line[2]."</td>".
            "<td align=\"right\">".$line[3]."</td>".
            "<td align=\"right\">".$line[4]."</td>".
            "<td>".$line[5]."</td>";
    }

    echo "</table>";

?>
</body>
</html>