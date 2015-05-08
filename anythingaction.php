<?php
/**
 * Created by JetBrains PhpStorm.
 * User: gol
 * Date: 08.05.15
 * Time: 13:27
 * To change this template use File | Settings | File Templates.
 */
    $fn             = $_POST['fn'];
    $document_root  = $_SERVER['DOCUMENT_ROOT'];
?>

<html>
<head>
    <title>Action</title>
</head>
<body>
    <h1>Action</h1>
    <?php
    $f = $document_root."/".$fn;
    if (file_exists($f)){ echo "Файл: ".$f." существует"; } else {echo "Файл: ".$f." не существует";}
    ?>
</body>
</html>