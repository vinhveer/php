<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1 - Mảng</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .title {
            background-color: #4a90e2;
            color: #ffffff;
        }

        td {
            background-color: #e8f4fd;
            color: #2c3e50;
        }
    </style>
</head>

<?php
include("../lib.php");

if (checkPost("thucHien")) {
    $n = getPostValue("n", "Số n", "isPositiveInteger");
    
    if (checkIsset($n)) {
        // Tạo mảng ngẫu nhiên
        $mang = [];
        for ($i = 0; $i < $n; $i++) {
            $mang[] = rand(-100, 200);
        }
        
        // Hiển thị mảng
        $mang_str = "[" . implode(", ", $mang) . "]";
        
        // a. Đếm số phần tử chẵn
        $so_chan = 0;
        foreach ($mang as $phan_tu) {
            if ($phan_tu % 2 == 0) {
                $so_chan++;
            }
        }
        
        // b. Đếm số phần tử < 100
        $so_nho_hon_100 = 0;
        foreach ($mang as $phan_tu) {
            if ($phan_tu < 100) {
                $so_nho_hon_100++;
            }
        }
        
        // c. Tính tổng các phần tử âm
        $tong_am = 0;
        foreach ($mang as $phan_tu) {
            if ($phan_tu < 0) {
                $tong_am += $phan_tu;
            }
        }
        
        // d. Tìm vị trí các phần tử = 0
        $vi_tri_0 = [];
        foreach ($mang as $index => $phan_tu) {
            if ($phan_tu == 0) {
                $vi_tri_0[] = $index;
            }
        }
        $vi_tri_0_str = empty($vi_tri_0) ? "Không có" : implode(", ", $vi_tri_0);
        
        // e. Sắp xếp tăng dần
        $mang_sap_xep = $mang;
        sort($mang_sap_xep);
        $mang_sap_xep_str = "[" . implode(", ", $mang_sap_xep) . "]";
    }
}
?>

<body>
    <form action="bai1.php" method="post">
        <table>
            <?php
            generateTitle("XỬ LÝ MẢNG NGẪU NHIÊN");
            generateInput("Nhập n", "n", "number", $n);
            generateSubmit("thucHien", "Thực hiện");
            
            if (isset($mang_str)) {
                generateTd("Mảng phát sinh", $mang_str);
                generateTd("Số phần tử chẵn", $so_chan);
                generateTd("Số phần tử < 100", $so_nho_hon_100);
                generateTd("Tổng các số âm", $tong_am);
                generateTd("Vị trí phần tử = 0", $vi_tri_0_str);
                generateTd("Mảng sắp xếp tăng dần", $mang_sap_xep_str);
            }
            ?>
        </table>
    </form>
</body>
</html>
