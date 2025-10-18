<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3</title>
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

$donGia = 2000;

if (checkPost("tinh")) {
    $tenChuHo = getPostValue("tenChuHo", "Tên chủ hộ");
    $donGia = getPostValue("donGia", "Đơn giá", "isNumber");
    $chiSoCu = getPostValue("chiSoCu", "Chỉ số cũ", "isNumber");
    $chiSoMoi = getPostValue("chiSoMoi", "Chỉ số mới", "isNumber");

    if (checkIsset($chiSoCu, $chiSoMoi, $donGia)) {
        if ($chiSoMoi >= $chiSoCu) {
            $soTien = ($chiSoMoi - $chiSoCu) * $donGia;
        } else {
            echo "Chỉ số mới phải lớn hơn chỉ số cũ và Đơn giá phải là số.";
        }
    }
}
?>

<body>
    <form action="bai3.php" method="post">
        <table>
            <?php
            generateTitle("THANH TOÁN TIỀN ĐIỆN");
            generateInput("Tên chủ hộ", "tenChuHo", "text", $tenChuHo);
            generateInput("Chỉ số cũ", "chiSoCu", "text", $chiSoCu, null, "(Kw)");
            generateInput("Chỉ số mới", "chiSoMoi", "text", $chiSoMoi, null, "(Kw)");
            generateInput("Đơn giá", "donGia", "text", $donGia, null, "(VNĐ)");
            generateInput("Số tiền thanh toán", "soTien", "text", $soTien, "disabled", "(VNĐ)");
            generateSubmit("tinh", "Tính");
            ?>
        </table>
    </form>
</body>

</html>

