<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,td {
            border: 1px solid #000000;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table>
        <?php
        echo "<tr>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<td>";
            echo "<b> Chuong" . $i . "</b>";
            echo "</td>";
        }
        echo "</tr>";

        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 10; $j++) {
                if (($i * $j) % 2 == 0) {
                    echo '<td style="background-color: red;">' . $j . "x" . $i . "=" . $i * $j . "</td>";
                } else {
                    echo '<td style="background-color: blue;">' . $j . "x" . $i . "=" . $i * $j . "</td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>