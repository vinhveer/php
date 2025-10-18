<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3 - Phát sinh mảng và tính toán</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .title {
            background-color: #9b59b6;
            color: #ffffff;
        }

        td {
            background-color: #f8e6ff;
            color: #8e44ad;
        }
    </style>
</head>

<?php
include("../lib.php");

if (checkPost("phatSinhVaTinhToan")) {
    $so_phan_tu = getPostValue("soPhanTu", "Số phần tử", "isArraySize");
    
    if (checkIsset($so_phan_tu)) {
        $mang = generateRandomArray($so_phan_tu);
        $mang_str = arrayToString($mang);
        $gtln = findMaxInArray($mang);
        $gtnn = findMinInArray($mang);
        $tong_mang = sumArray($mang);
    }
}
?>

<body>
    <form action="bai3.php" method="post">
        <table>
            <?php
            generateTitle("PHÁT SINH MẢNG VÀ TÍNH TOÁN");
            generateInput("Nhập số phần tử", "soPhanTu", "number", $so_phan_tu);
            generateSubmit("phatSinhVaTinhToan", "Phát sinh và tính toán");
            
            if (isset($mang_str)) {
                generateInput("Mảng", "mang", "text", $mang_str, "disabled");
                generateInput("GTLN (MAX) trong mảng", "gtln", "text", $gtln, "disabled");
                generateInput("GTNN (MIN) trong mảng", "gtnn", "text", $gtnn, "disabled");
                generateInput("Tổng mảng", "tongMang", "text", $tong_mang, "disabled");
            }
            
            generateTdColspan(2, "(Ghi chú: Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)");
            ?>
        </table>
    </form>
</body>
</html>
