<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <title>title</title>
</head>
<body>
<table border="0" cellpadding="3">
    <tr>
        <td bgcolor="#cccccc" align="center">Расстояние</td>
        <td bgcolor="#cccccc" align="center">Стоимость</td>
    </tr>
    <?php
        $distance = 50;
        while($distance<=250){
            /*
            echo "<tr><td align=\"right\">".$distance."</td><td align=\"right\">".($distance/10)."</td></tr>";
            */

            echo "<tr>
                <td align=\"right\">".$distance."</td>
                <td align=\"right\">".($distance/10)."</td>
            </tr>\n";
            $distance += 50;
        }
    ?>
</table>
</body>
</html>
