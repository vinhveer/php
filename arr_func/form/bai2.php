<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .title {
            background-color: #ffd77e;
            color: #975311;
        }

        td {
            background-color: #fffada;
            color: #8d8479;
        }
    </style>
</head>

<?php
include("../lib.php");

if (checkPost("tinh")) {
    $banKinh = getPostValue("banKinh", "Bán kính", "isNumber");
    if (checkIsset($banKinh)) {
        $dienTich = pi() * $banKinh * $banKinh;
        $chuVi = 2 * pi() * $banKinh;
    }
}
?>

<body>
    <form action="bai2.php" method="post">
        <table>
            <?php
            generateTitle("DIỆN TÍCH HÌNH TRÒN");
            generateInput("Bán kính", "banKinh", "text", $banKinh);
            generateInput("Diện tích", "dienTich", "text", $dienTich, "disabled");
            generateInput("Chu vi", "chuVi", "text", $chuVi, "disabled");
            generateSubmit("tinh", "Tính");
            ?>
        </table>
    </form>
</body>

</html>