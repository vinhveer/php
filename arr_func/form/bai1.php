<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
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
    $chieuDai = getPostValue("chieuDai", "Chiều dài", "isNumber");
    $chieuRong = getPostValue("chieuRong", "Chiều rộng", "isNumber");
    if (checkIsset($chieuDai, $chieuRong)) {
        $dienTich = $chieuDai * $chieuRong;
    }
}
?>

<body>
    <form action="bai1.php" method="post">
        <table>
            <?php
            generateTitle("DIỆN TÍCH HÌNH CHỮ NHẬT");
            generateInput("Chiều dài", "chieuDai", "text", $chieuDai);
            generateInput("Chiều rộng", "chieuRong", "text", $chieuRong);
            generateInput("Diện tích", "dienTich", "text", $dienTich, "disabled");
            generateSubmit("tinh", "Tính");
            ?>
        </table>
    </form>    
</body>
</html>