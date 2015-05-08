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
    @ $fp = fopen($f,'rb');
    if (!$fp){
        echo "<p><strong>Нет обработанных заказов. Загляните позже.</strong></p>";
        exit;
    }
    while (!feof($fp)){
        $order = fgets($fp, 999);
        echo $order."<br />";
    }
    echo "<p> \$DOCUMENT_ROOT: $DOCUMENT_ROOT</p>";
    echo "<p> \$DOCUMENT_ROOT: ".$DOCUMENT_ROOT."</p>";
    fclose($fp);
    //
    // использовать функцию fgetc();
    echo "<p>использовать функцию fgetc()</p>";
    echo "<br />";
    @ $fp = fopen($f,'rb');
    while (!feof($fp)) {
        $char = fgetc($fp);
        if (!feof($fp)) {
            if($char=="\n"or$char=="\t"){if($char=="\n"){echo "<br /><br />";}else{echo "<br />";}}else{echo $char;}
        }
    }
    echo "Конечная позиция в указателе файла: ".(ftell($fp));
    echo "<br />";
    rewind($fp);
    echo "Позиция после вызова функции rewind(): ".(ftell($fp));
    echo '<br />';

    fclose($fp);


    echo "<p>использовать функцию fopen(), nl2br(), fread()</p>";
    echo "<br />";
    @ $fp = fopen($f, 'rb');
    echo nl2br(fread($fp, filesize($f)));
    fclose($fp);
?>
</body>
</html>