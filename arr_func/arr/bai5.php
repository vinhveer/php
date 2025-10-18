<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5 - Thay thế</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .title {
            background-color: #8e44ad;
            color: #ffffff;
        }

        td {
            background-color: #f4e6ff;
            color: #6c3483;
        }
    </style>
</head>

<?php
include("../lib.php");

if (checkPost("thayThe")) {
    $mang_input = getPostValue("mang", "Mảng", "isNumberArray");
    $gia_tri_can_thay_the = getPostValue("giaTriCanThayThe", "Giá trị cần thay thế", "isNumber");
    $gia_tri_thay_the = getPostValue("giaTriThayThe", "Giá trị thay thế", "isNumber");
    
    if (checkIsset($mang_input, $gia_tri_can_thay_the, $gia_tri_thay_the)) {
        $mang_cu = processNumberArray($mang_input);
        $mang_cu_str = arrayToString($mang_cu);
        
        $mang_moi = replaceInArray($mang_cu, $gia_tri_can_thay_the, $gia_tri_thay_the);
        $mang_sau_khi_thay_the_str = arrayToString($mang_moi);
    }
}
?>

<body>
    <form action="bai5.php" method="post">
        <table>
            <?php
            generateTitle("THAY THẾ");
            generateInput("Nhập các phần tử", "mang", "text", $mang_input);
            generateInput("Giá trị cần thay thế", "giaTriCanThayThe", "number", $gia_tri_can_thay_the);
            generateInput("Giá trị thay thế", "giaTriThayThe", "number", $gia_tri_thay_the);
            generateSubmit("thayThe", "Thay thế");
            
            if (isset($mang_cu_str)) {
                generateInput("Mảng cũ", "mangCu", "text", $mang_cu_str, "disabled");
                generateInput("Mảng sau khi thay thế", "mangSauKhiThayThe", "text", $mang_sau_khi_thay_the_str, "disabled");
            }
            
            generateTdColspan(2, "(Ghi chú: Các phần tử trong mảng sẽ cách nhau bằng dấu ',')");
            ?>
        </table>
    </form>
</body>
</html>
