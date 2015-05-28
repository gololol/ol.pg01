<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gol
 * Date: 08.05.15
 * Time: 13:27
 * To change this template use File | Settings | File Templates.
 */
    $p1             = trim($_POST['P1']);
    $p2             = trim($_POST['P2']);
    $document_root  = $_SERVER['DOCUMENT_ROOT'];

// ---------------------------------------------------------------------------------------------------------------
// This is place for function ol (s)------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------
function my_print($value) {
    echo "$value<br />";
}
function my_multiply(&$value, $key, $factor) {
    $value *= $factor;
}
function echo_key_value($value, $key, $factor) {
    echo "\$key: ".$key."; \$value: ".$value."<br />";
}
// ---------------------------------------------------------------------------------------------------------------
// This is place for function ol (f)------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------

?>

<html>
<head>
    <!--<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />-->
    <title>Action</title>
</head>
<body>
    <h1>Action</h1>
    <?php
    echo "Parameter p1 (from any.html). This parameter is name function: ".$p1."<br />";
    echo "Parameter p2 (from any.html). This parameter is parameter function: ".$p2."<br />"."<br />";
    switch ($p1) {
        case "a": // "a" работа с массивами
            $products = array(array('TIR','Покрышки',100),
                array('OIL','Масло',10),
                array('SPK','Свечи зажигания',4)
            );
            for ($row=0;$row<3;$row++){
                for ($column=0;$column<3;$column++){
                    echo '|'.$products[$row][$column];
                }
                echo '|<br />';
            }
            echo '<br />';

            $products = array(
                array('Code'=>'TIP','Description'=>'Покрышки','Price'=>100),
                array('Code'=>'OIL','Description'=>'Масло','Price'=>10),
                array('Code'=>'SPK','Description'=>'Свечи зажигания','Price'=>4),
            );

            for ($row=0; $row<3; $row++){
                echo '|'.$products[$row]['Code'].'|'.$products[$row]['Description'].'|'.$products[$row]['Price'].'<br />';
            }
            echo '<br />';

            for ($row=0; $row<3; $row++){
                while(list($key, $value) = each($products[$row])){ echo "|".$value; } echo "<br />";
            }
            echo '<br />';
            break;
        case "a3":
            $categories = array(
                                    array(
                                        array('CAR_TIR','Покрышки',100),
                                        array('CAR_OIL','Масло',10),
                                        array('CAR_SPK','Свечи зажигания',4)
                                        ),
                                    array(
                                        array('VAN_TIR','Покрышки',120),
                                        array('VAN_OIL','Масло',12),
                                        array('VAN_SPK','Свечи зажигания',5)
                                        ),
                                    array(
                                        array('CAR_TIR','Покрышки',150),
                                        array('CAR_OIL','Масло',15),
                                        array('CAR_SPK','Свечи зажигания',6)
                                        )
                                );
            for ($layer=0; $layer<3; $layer++){
                echo "layer $layer<br />";
                for ($row=0; $row<3; $row++){
                    for ($column=0; $column<3; $column++){
                        echo '|'.$categories[$layer][$row][$column];
                    }
                    echo '<br />';
                }
            }
            break;
        case "b": // "b" работа с файлами
            $f = $document_root."/".$p2;
            if (file_exists($f)){ echo "Файл: ".$f." существует"; } else {echo "Файл: ".$f." не существует";}
            break;
        case "implode":
            $ar = array('path01','path02','path03');
            $apath = implode("_", $ar);
            echo "apath: ".$apath."<br />";
            break;
        case "intval":
            $value = intval($p2);
            echo "intval(".$p2."): ".$value."<br />";
            break;
        case "preg_replace":
            $str = $p2;
            $str = preg_replace("/[^0-9]/", '', $str);
            echo "str: ".$str."<br />";
            echo $str." = preg_replace(\"/[^0-9]/\", '',".$p2.");"."<br />";
            break;
        case "array_prev":
            $ar = array('el01');
            array_push($ar, 'el02');
            array_push($ar, 'el03', 'el04');
            $value = end($ar);
            while($value){
                echo $p2.": ".$value."<br />";
                $value = prev($ar);
            }
            break;
        case "array_walk":
            $ar = array('el01', 'el02', 'el03', 'el04', 'el05');
            array_walk($ar, 'my_print');
            break;
        case "array_walk_param":
            if (is_null($p2)) {
                $p2 = 0;
                echo "\$p2: is null <br />";
            } else {
                echo "\$p2: is not null <br />";
                echo "\$p2: ".$p2."<br />";
                echo "\$p2.sizeof(): ".sizeof($p2)."<br />";
            }

            $ar = array(1,2,3,4,5);
            array_walk($ar, 'my_print');
            // умножить каждый элемент массива на два
            array_walk($ar, 'my_multiply', $p2);
            echo "<br />";
            echo "Каждый элемент массива умножен на коэф-т: ".$p2."<br />";
            array_walk($ar, 'my_print');
            break;
        case "array_count_values":
            // массив содержащий различные, в том чилсе и повторяемые, значения
            $array = array(4,5,1,2,3,1,2,1);
            echo "Вывод простого массива<br />";
            array_walk($array, 'my_print');

            echo "<br />";
            echo "Вывод количества повторений массива<br />";
            // массив показывающий повторения
            $ac = array_count_values($array);
            array_walk($ac, 'echo_key_value', $p2);
            break;
        case "extract":
            $array = array('key1'=>'value1', 'key2'=>'value2', 'key3'=>'value3');
            extract($array);
            echo "$key1 $key2 $key3";
            echo "<br />";
            extract($array, EXTR_PREFIX_ALL, 'prefix');
            echo "$prefix_key1 $prefix_key2 $prefix_key3";
            echo "<br />";
            break;
        case "printf":
            $param = trim($p2);
            if (is_null($param)) {
                echo 'param is null'.'<br />';
                $total = 0;
                $total_shipping = 0;
            } else {
                $total = $param;
                $total_shipping = $param*0.1;
            }
            printf("Общая сумма заказа: %.2f (доставка %.2f %%10 процентов)",$total, $total_shipping);
            printf("<br />");
            printf("Общая сумма заказа: %.2b (доставка %.2b %%10 процентов)",$total, $total_shipping);
            printf("<br />");
            printf("Общая сумма заказа: %.2c (доставка %.2c %%10 процентов)",$total, $total_shipping);
            printf("<br />");
            printf("Общая сумма заказа: %.2d (доставка %.2d %%10 процентов)",$total, $total_shipping);
            printf("<br />");
            printf("Общая сумма заказа: %.2o (доставка %.2o %%10 процентов)",$total, $total_shipping);
            printf("<br />");
            printf("Общая сумма заказа: %o (доставка %o %%10 процентов)",$total, $total_shipping);
            printf("<br />");
            printf("Общая сумма заказа: %s (доставка %s %%10 процентов)",$total, $total_shipping);
            printf("<br />");
            printf("Общая сумма заказа: %x (доставка %x %%10 процентов)",$total, $total_shipping);
            printf("<br />");
            printf("Общая сумма заказа: %X (доставка %X %%10 процентов)",$total, $total_shipping);
            printf("<br />");

            printf("Общая сумма заказа: %1\$.2f (доставка %2\$.2f %%10 процентов)",$total, $total_shipping);
            printf("<br />");
            printf("(доставка %2\$.2f %%10 процентов). Общая сумма заказа: %1\$.2f ",$total, $total_shipping);
            printf("<br />");

            break;
        case "get_magic_quotes_gpc":
            $tf = get_magic_quotes_gpc();
            if ($tf){echo "get_magic_quotes_gpc() = true";} else {echo "get_magic_quotes_gpc() = false";}
            echo "<br />";
            $c1 = "Отзыв клиента до вызова addslashes";
            $c2 = "Отзыв клиента после вызова addslashes";
            $s  = 'Ответств-й за раб. с кли-ми говорит: "Никаких гарантий". Что это за обслуживание?';
            echo $c1."<br />";
            echo $s."<br /";
            echo $c2."<br />";
            $after = addslashes(trim($s));
            echo $after."<br />";
            echo "<br />";
            $after2 = stripslashes(trim($s));
            echo $after2."<br />";
            break;
        case "strtok":
            if (empty($p2)) {
                echo "Параметр p2 пустой"."<br />";
            } else {
                $token = strtok($p2, " ");
                echo "token: ".$token."<br />";
                echo "p2: ".$p2."<br />";
                while ($token != "") {
                    $token = strtok(" ");
                    if ($token != "") {
                        echo "while token: ".$token."<br />";
                    }
                }
            }
            break;
        case "substr":
            if (empty($p2)) { echo "Параметр p2 пустой"."<br />"; } else {
                echo "результат (если текст кирилицей, то вывод искажён): "."<br />";
                echo "p2: ".substr($p2, 0, 2)."<br />";
                echo "p2: ".substr($p2, 3, -9)."<br />";
            }
            break;
        case "strstr":
            $feedback = $p2;
            $toaddress = 'feedback@example.com';
            // Изменить значение переменной $toaddress при наличии определённого слова
            if (strstr($feedback,'магазин'))
                $toaddress = 'reail@example.com';
            else if (strstr($feedback, 'доставк'))
                $toaddress = 'filfillment@example.com';
            else if (strstr($feedback, 'счёт'))
                $toaddress = 'accounts@example.com';
            echo "\$toaddress: ".$toaddress."<br />";
            break;
        case "strpos":
            $test1 = "Приветствуем на нашем сайте!";
            $test2 = "Privetstvuem na nasem sajte!";
            $test  = $test2;
            $neeld = "t";
            echo "\$test: ".$test."<br />";
            echo "Нати в строке \$test позицию слова \"".$neeld."\""."<br />";
            $result = strpos($test, $neeld);
            if ($result === false) {
                echo "Не найдено"."<br />";
            } else {
                echo "Найдено в позиции: ".$result."<br />";
            }
            echo "<br />"."<br />";
            echo "Если значение строковой перемной содержит латиницу, то используется ascii "."<br />";
            echo "Если значение строковой перемной содержит кирилицу, то используется unicode "."<br />";
            echo "<br />"."<br />";
            echo "Пример"."<br />";
            echo "<br />";
            echo "\$test1: ".$test1."<br />";
            echo "(unicode) длина переменной: ".strlen($test1)."<br />";
            echo "<br />";
            echo "\$test2: ".$test2."<br />";
            echo "(ascii) длина переменной: ".strlen($test2)."<br />";
            break;
        default: // введённое значепние неопределено
            if (empty($p1)) {
                echo "Параметр p1 пустой "."<br />";
            } else {
                echo "p1: ".$p1." ничего нет для этого значения"."<br />";
            }

    }
    echo '<br />';

    ?>
</body>
</html>