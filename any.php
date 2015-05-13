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
        default: // введённое значепние неопределено
            echo "p2: ".$p2;
    }
    echo '<br />';

    ?>
</body>
</html>