<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gol
 * Date: 08.05.15
 * Time: 13:27
 * To change this template use File | Settings | File Templates.
 */
    $p1             = $_POST['P1'];
    $p2             = $_POST['P2'];
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
    <title>Action</title>
</head>
<body>
    <h1>Action</h1>
    <?php
    switch ($p2) {
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
            $f = $document_root."/".$p1;
            if (file_exists($f)){ echo "Файл: ".$f." существует"; } else {echo "Файл: ".$f." не существует";}
            break;
        case "implode":
            $ar = array('path01','path02','path03');
            $apath = implode("_", $ar);
            echo "apath: ".$apath."<br />";
            break;
        case "intval":
            $value = intval($p1);
            echo "intval(".$p1."): ".$value."<br />";
            break;
        case "preg_replace":
            $str = $p1;
            $str = preg_replace("/[^0-9]/", '', $str);
            echo "str: ".$str."<br />";
            echo $str." = preg_replace(\"/[^0-9]/\", '',".$p1.");"."<br />";
            break;
        case "array_prev":
            $ar = array('el01');
            array_push($ar, 'el02');
            array_push($ar, 'el03', 'el04');
            $value = end($ar);
            while($value){
                echo $p1.": ".$value."<br />";
                $value = prev($ar);
            }
            break;
        case "array_walk":
            $ar = array('el01', 'el02', 'el03', 'el04', 'el05');
            array_walk($ar, 'my_print');
            break;
        case "array_walk_param":
            if (is_null($p1)) {
                $p1 = 0;
                echo "\$p1: is null <br />";
            } else {
                echo "\$p1: is not null <br />";
                echo "\$p1: ".$p1."<br />";
                echo "\$p1.sizeof(): ".sizeof($p1)."<br />";
            }

            $ar = array(1,2,3,4,5);
            array_walk($ar, 'my_print');
            // умножить каждый элемент массива на два
            array_walk($ar, 'my_multiply', $p1);
            echo "<br />";
            echo "Каждый элемент массива умножен на коэф-т: ".$p1."<br />";
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
            array_walk($ac, 'echo_key_value', $p1);
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
        default: // введённое значепние неопределено
            echo "p2: ".$p2;
    }
    echo '<br />';

    ?>
</body>
</html>