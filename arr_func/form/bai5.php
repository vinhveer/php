<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .title {
            background-color: #018b8e;
            color: #FFFFFF;
        }

        td {
            background-color: #08b0b4;
            color: #211e19ff;
        }
    </style>
</head>

<?php
include("../lib.php");

if (checkPost("tinh")) {
    $gio_bat_dau = getPostValue("gio_bat_dau", "Giờ bắt đầu", "isValidTime");
    $gio_ket_thuc = getPostValue("gio_ket_thuc", "Giờ kết thúc", "isValidTime");

    if (checkIsset($gio_bat_dau, $gio_ket_thuc)) {
        $mang_gio_bat_dau = getTimeArray($gio_bat_dau);
        $mang_gio_ket_thuc = getTimeArray($gio_ket_thuc);

        $thoi_gian_bat_dau = $mang_gio_bat_dau['hour'] * 3600 + $mang_gio_bat_dau['minute'] * 60;
        $thoi_gian_ket_thuc = $mang_gio_ket_thuc['hour'] * 3600 + $mang_gio_ket_thuc['minute'] * 60;

        if ($thoi_gian_ket_thuc > $thoi_gian_bat_dau) {
            $tong_thoi_gian = $thoi_gian_ket_thuc - $thoi_gian_bat_dau;
            $thoi_gian_lam_tron = ceil($tong_thoi_gian / 3600);
            if ($thoi_gian_lam_tron <= 3) {
                $tien_thanh_toan = $thoi_gian_lam_tron * 30000;
            } else {
                $tien_thanh_toan = 3 * 30000 + ($thoi_gian_lam_tron - 3) * 20000;
            }
        } else {
            echo "Giờ kết thúc phải lớn hơn giờ bắt đầu.";
        }
    }
}

?>

<body>
    <form action="bai5.php" method="post">
        <table>
            <?php
            generateTitle("TÍNH TIỀN KARAOKE");
            generateInput("Giờ bắt đầu", "gio_bat_dau", "time", $gio_bat_dau, null, "(hh:mm)");
            generateInput("Giờ kết thúc", "gio_ket_thuc", "time", $gio_ket_thuc, null, "(hh:mm)");
            generateInput("Tiền thanh toán", "tien_thanh_toan", "text", $tien_thanh_toan, "disabled", "(VNĐ)");
            generateSubmit("tinh", "Tính");
            ?>
        </table>
    </form>
</body>
</html>