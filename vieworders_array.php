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
?>
</body>
</html>