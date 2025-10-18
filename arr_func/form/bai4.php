<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .title {
            background-color: #e25081;
            color: #FFFFFF;
        }

        td {
            background-color: #ffe8fa;
            color: #211e19ff;
        }
    </style>
</head>

<?php
include("../lib.php");

if (checkPost("tinh")) {
    $toan = getPostValue("toan", "Toán", "isGrade");
    $ly = getPostValue("ly", "Lý", "isGrade");
    $hoa = getPostValue("hoa", "Hoá", "isGrade");
    $diem_chuan = getPostValue("diem_chuan", "Điểm chuẩn", "isDiemChuan");

    if (checkIsset($toan, $ly, $hoa, $diem_chuan)) {
        $tong_diem = $toan + $ly + $hoa;
        if ($tong_diem >= $diem_chuan) {
            $ket_qua_thi = "Đậu";
        } else {
            $ket_qua_thi = "Rớt";
        }
    }
}
?>

<body>
    <form action="bai4.php" method="post">
        <table>
            <?php
            generateTitle("KẾT QUẢ THI ĐẠI HỌC");
            generateInput("Toán", "toan", "text", $toan);
            generateInput("Lý", "ly", "text", $ly);
            generateInput("Hoá", "hoa", "text", $hoa);
            generateInput("Điểm chuẩn", "diem_chuan", "text", $diem_chuan);
            generateInput("Tổng điểm", "tong_diem", "text", $tong_diem, "disabled");
            generateInput("Kết quả thi", "ket_qua_thi", "text", $ket_qua_thi, "disabled");
            generateSubmit("tinh", "Xem kết quả");
            ?>
        </table>
    </form>
</body>
</html>