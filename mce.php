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
    switch ($p1) {
        case "mage 01":
            define('DS', '\\');
            define('PS', ';');
            define('BP', 'D:\pro\ol.mce');

            $paths[] = BP . DS . 'app' . DS . 'code' . DS . 'local';
            $paths[] = BP . DS . 'app' . DS . 'code' . DS . 'community';
            $paths[] = BP . DS . 'app' . DS . 'code' . DS . 'core';
            $paths[] = BP . DS . 'lib';

            $appPath = implode(PS, $paths);
            echo 'appPath = '.$appPath.'<br />';

            $include_path = get_include_path();
            echo 'include_path = '.$include_path.'<br />';
            if (isset($include_path)) {
                echo 'include_path: '.'определена'.'<br />';
            } else {
                echo 'include_path: '.'не определена'.'<br />';
            }

            set_include_path($appPath . PS .$include_path);
            echo "set_include_path(appPath . PS .include_path): ".get_include_path()."<br />";
            echo "<br />";
            echo "include_once \"Mage/Core/functions.php\" включат и выполняет указанный файл"."<br />";
            echo "Для примера в файле functions.php есть функция uc_words и now"."<br />";
            echo "Включаем этот файл и выполняем, это означает, чт если вызвать ф-ю uc_words(\"It is a string\")"."<br />";
            echo "получим резльтат"."<br />";
            include_once "Mage/Core/functions.php";
            echo "uc_words: ".uc_words("It is a string.")."<br />";
            echo "now(): ".now()."<br />";
            break;
        default: // введённое значепние неопределено
            echo "p1: ".$p1;
    }
    echo '<br />';

    ?>
</body>
</html>