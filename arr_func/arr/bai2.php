<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2 - Nhập và tính trên dãy số</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .title {
            background-color: #2ecc71;
            color: #ffffff;
        }

        td {
            background-color: #d5f4e6;
            color: #27ae60;
        }
    </style>
</head>

<?php
include("../lib.php");

if (checkPost("tongDaySo")) {
    $day_so = getPostValue("daySo", "Dãy số", "isNumberArray");
    
    if (checkIsset($day_so)) {
        $mang_hop_le = processNumberArray($day_so);
        $tong_day_so = array_sum($mang_hop_le);
    }
}
?>

<body>
    <form action="bai2.php" method="post">
        <table>
            <?php
            generateTitle("NHẬP VÀ TÍNH TRÊN DÃY SỐ");
            generateInput("Nhập dãy số", "daySo", "text", $day_so, null, "(*)");
            generateSubmit("tongDaySo", "Tổng dãy số");
            
            if (isset($tong_day_so)) {
                generateInput("Tổng dãy số", "tongDaySo", "text", $tong_day_so, "disabled");
            }
            generateTdColspan(2, "(*) Các số được nhập cách nhau bằng dấu ','");
            ?>
        </table>
    </form>
</body>
</html>
