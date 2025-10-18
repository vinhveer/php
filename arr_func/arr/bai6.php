<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 6 - Sắp xếp mảng</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .title {
            background-color: #17a2b8;
            color: #ffffff;
        }

        td {
            background-color: #d1ecf1;
            color: #0c5460;
        }
    </style>
</head>

<?php
include("../lib.php");

if (checkPost("sapXep")) {
    $mang_input = getPostValue("mang", "Mảng", "isNumberArray");
    
    if (checkIsset($mang_input)) {
        $mang_goc = processNumberArray($mang_input);
        
        $mang_tang_dan = sortArrayAsc($mang_goc);
        $mang_tang_dan_str = arrayToString($mang_tang_dan);
        
        $mang_giam_dan = sortArrayDesc($mang_goc);
        $mang_giam_dan_str = arrayToString($mang_giam_dan);
    }
}
?>

<body>
    <form action="bai6.php" method="post">
        <table>
            <?php
            generateTitle("SẮP XẾP MẢNG");
            generateInput("Nhập mảng", "mang", "text", $mang_input, null, "(*)");
            generateSubmit("sapXep", "Sắp xếp tăng/giảm");
            
            if (isset($mang_tang_dan_str)) {
                echo "<tr><td colspan='2' style='font-weight: bold; color: red;'>Sau khi sắp xếp:</td></tr>";
                generateInput("Tăng dần", "tangDan", "text", $mang_tang_dan_str, "disabled");
                generateInput("Giảm dần", "giamDan", "text", $mang_giam_dan_str, "disabled");
            }
            
            generateTdColspan(2, "(*) Các số được nhập cách nhau bằng dấu ','");
            ?>
        </table>
    </form>
</body>
</html>
