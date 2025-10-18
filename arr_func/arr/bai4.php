<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4 - Tìm kiếm</title>
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

function formatSearchResult($positions, $value) {
    if (empty($positions)) {
        return "Không tìm thấy....trong mảng";
    } else {
        return "Đã tìm thấy $value tại vị trí thứ " . implode(", ", $positions) . " của mảng";
    }
}

if (checkPost("timKiem")) {
    $mang_input = getPostValue("mang", "Mảng", "isNumberArray");
    $so_can_tim = getPostValue("soCanTim", "Số cần tìm", "isNumber");
    
    if (checkIsset($mang_input, $so_can_tim)) {
        $mang = processNumberArray($mang_input);
        $mang_str = arrayToString($mang);
        
        $positions = searchInArray($mang, $so_can_tim);
        $ket_qua_tim_kiem = formatSearchResult($positions, $so_can_tim);
    }
}
?>

<body>
    <form action="bai4.php" method="post">
        <table>
            <?php
            generateTitle("TÌM KIẾM");
            generateInput("Nhập mảng", "mang", "text", $mang_input);
            generateInput("Nhập số cần tìm", "soCanTim", "number", $so_can_tim);
            generateSubmit("timKiem", "Tìm kiếm");
            
            if (isset($mang_str)) {
                generateInput("Mảng", "mangHienThi", "text", $mang_str, "disabled");
                generateInput("Kết quả tìm kiếm", "ketQuaTimKiem", "text", $ket_qua_tim_kiem, "disabled");
            }
            
            generateTdColspan(2, "(Các phần tử trong mảng sẽ cách nhau bằng dấu ',')");
            ?>
        </table>
    </form>
</body>
</html>
