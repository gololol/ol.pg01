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
    @ $fp = fopen("$DOCUMENT_ROOT/orders/orders.txt",'rb');
    if (!$fp){
        echo "<p><strong>Нет обработанных заказов. Загляните позже.</strong></p>";
        exit;
    }

    while (!feof($fp)){
        $order = fgets($fp, 999);
        echo $order."<br />";
    }
    fclose($fp);
?>
</body>
</html>